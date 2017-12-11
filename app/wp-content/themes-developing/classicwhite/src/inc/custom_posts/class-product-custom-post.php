<?php

class Product_Custom_Post {

	const POST_TYPE_NAME = 'producto';
	const TAXONOMY_TAG_NAME = 'etiqueta';

	/**
	* construct
	*/
	public function __construct() {

		add_action('init', [$this, 'create_post_type']);
		add_action('init', [$this, 'create_tag']);

		// add_post_type_support(Product_Custom_Post::POST_TYPE_NAME, 'excerpt');
	}

	/**
	* Create custom post
	*/
	public function create_post_type() {
		// Etiquetas para el Post Type
		$labels = array(
			'name'                => _x('Productos', 'Post Type General Name', 'classicwhite-theme'),
			'singular_name'       => _x('Producto', 'Post Type Singular Name', 'classicwhite-theme'),
			'menu_name'           => __('Productos', 'classicwhite-theme'),
			'parent_item_colon'   => __('Producto Padre', 'classicwhite-theme'),
			'all_items'           => __('Todos los Productos', 'classicwhite-theme'),
			'view_item'           => __('Ver Producto', 'classicwhite-theme'),
			'add_new_item'        => __('Nuevo Producto', 'classicwhite-theme'),
			'add_new'             => __('Agregar Producto', 'classicwhite-theme'),
			'edit_item'           => __('Agregar Producto', 'classicwhite-theme'),
			'update_item'         => __('Actualizar Producto', 'classicwhite-theme'),
			'search_items'        => __('Buscar Producto', 'classicwhite-theme'),
			'not_found'           => __('No Encontrado', 'classicwhite-theme'),
			'not_found_in_trash'  => __('No Encontrado en trash', 'classicwhite-theme'),
		);

		// Otras opciones para el post type
		$args = array(
			'label'               => __('Productos', 'classicwhite-theme'),
			'description'         => __('Productos campos basicos', 'classicwhite-theme'),
			'labels'              => $labels,
			// Todo lo que soporta este post type
			'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
			/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
			* Uno sin hierarchical es como los posts
			*/
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-post',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);

		// Por ultimo registramos el post type
		register_post_type(self::POST_TYPE_NAME, $args);
	}

	/*
	* Add taxonomy Tag new
	*/
	public function create_tag() {
		register_taxonomy(
			self::TAXONOMY_TAG_NAME,
			self::POST_TYPE_NAME,
			array(
				'label'			=> __('Etiquetas', 'classicwhite-theme'),
				'rewrite'		=> array('slug' => self::TAXONOMY_TAG_NAME),
				'hierarchical'	=> false,
			)
		);
	}

}
