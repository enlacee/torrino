<?php

class MyWidget {

	public function __construct()
	{
		add_action( 'widgets_init', [$this, 'unregister_default_widgets'] );
		add_action( 'widgets_init', [$this, 'addSideBarHome'] );
	}

	/**
	 * Remove or Unregister all widgets
	 */
	public function unregister_default_widgets() {
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Custom_HTML');
		unregister_widget('WP_Widget_Media_Image');
		unregister_widget('WP_Widget_Media_Audio');
		unregister_widget('WP_Widget_Media_Video');
		unregister_widget('WP_Widget_Media_Gallery');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');

		unregister_widget('RevSliderWidget');
	}

	/**
	 * Add sidebar only home
	 */
	public function addSideBarHome() {

		if (function_exists('register_sidebar')) {

			register_sidebar(array(
				'name' => __('Classicwhite Home Area', 'classicwhite-theme'),
				'id'   =>  'classicwhite-sidebar-home-area',
				// 'description'   => __('Seleccione los productos a mostrar maximo 9', 'classicwhite-theme'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>'
			));

			// Add Widgets (!important include file)
			register_widget( 'CW_Widget_Home_Page' );
			register_widget( 'CW_Widget_Home_Product' );
		}
	}
}
