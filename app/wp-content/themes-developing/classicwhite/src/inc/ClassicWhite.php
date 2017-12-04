<?php

class ClassicWhite
{

//	private $navHeadAction;

	public function __construct()
	{
		$this->init();
		$this->postTypes();
		$this->actions();
		$this->hideAdminBar();
		$this->addImagesSizes();

		$this->customExtraFieldsToPage();
	}

	public function init()
	{
		add_action('init', [$this, 'themeRegisterMenus']);
		add_action('widgets_init', [$this, 'themeLoadSidebars']);
		add_action('widgets_init', [$this, 'themeLoadWidgets']);
		add_filter('upload_mimes', [$this, 'setMimeTypes']);

		add_action('admin_menu', [$this, 'removeMetaBoxes']);
		add_action('do_meta_boxes', [$this, 'removeRevolutionSliderMetaBoxes']);
	}

	/**
	 * Create Custom Posts
	 */
	public function postTypes()
	{
//        $this->custom_post_type = new MyCustomPost();
	}

	/**
	 * Create actions
	 */
	public function actions()
	{
//        $this->navHeadAction = new NavHeadAction();
	}

	/**
	 * Register Menus
	 */
	public function themeRegisterMenus()
	{
		register_nav_menus(
			array(
				'menu-primary' => __('Menú Principal', 'classicwhite-theme'),
				// 'menu-footer'  => __('Menú Footer', 'classicwhite-theme')
			)
		);
	}

	/**
	 * Hide admin bar in front
	 */
	public function hideAdminBar() {
		show_admin_bar(false);
	}

	public function addImagesSizes() {

		add_image_size( 'thumbnail_380', 380 );
		add_image_size( 'thumbnail_480', 480 );

	}

	public function customExtraFieldsToPage() {
		add_post_type_support( 'page', 'excerpt' );
		add_theme_support( 'post-thumbnails' );
	}

	/**
	 * Remove metabox fields for all users
	 */
	public function removeMetaBoxes() {
		// post
		remove_meta_box( 'postcustom', 'post', 'normal' );
		remove_meta_box( 'postexcerpt', 'post', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'post', 'normal' );

		// page
		remove_meta_box( 'postcustom', 'page', 'normal' );
		remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
		remove_meta_box( 'commentsdiv', 'page', 'normal' );
		remove_meta_box( 'revisionsdiv', 'page', 'normal' );
		remove_meta_box( 'authordiv' , 'page' , 'normal' );
	}

	public function removeRevolutionSliderMetaBoxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
	}

	/**
	 * Register Widgets
	 */
	public function themeLoadSidebars()
	{
//        register_sidebar(array(
//            'name'          => __('Catálogos de Marcas', 'lbel'),
//            'id'            => 'lbel-catalog-brands',
//            'description'   => __('', 'lbel'),
//            'before_widget' => '',
//            'after_widget'  => '',
//            'before_title'  => '<h3 class="promoapp-title upper">',
//            'after_title'   => '</h3>',
//        ));
	}

	public function themeLoadWidgets() {
//        register_widget( 'LbelBrandsCatalogWidget' );
	}

	/**
	 * Add support format svg upload image
	 * @param $mimes
	 * @return Array
	 */
	public function setMimeTypes($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	/**
	 * @return mixed
	 */
	public function getMenuTypeMetaBox()
	{
//		return $this->navHeadAction;
	}

	/**
	 * @return mixed
	 */
	public function getMyCustomPosts()
	{
//        return $this->custom_post_type;
	}
}
