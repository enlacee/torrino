<?php

class HomeAction {

	const KEY_META_PAGE = '_classicwhite-metabox_pageids';
	const KEY_META_PRODUCT = '_classicwhite-metabox_productids';

	public function __construct()
	{
		// Metabox page
		add_action( 'add_meta_boxes', [$this, 'addMetaBoxPageList'] );
		add_action( 'save_post', [$this, 'saveMetaBoxPageList'] );

		// Metabox products
		add_action( 'add_meta_boxes', [$this, 'addMetaBoxProductList'] );
		add_action( 'save_post', [$this, 'saveMetaBoxProductList'] );
	}

	/**
	 * Add Metabox Page
	 */
	public function addMetaBoxPageList() {
		global $post;

		if ( !empty( $post ) ) {
			$pageTemplate = get_post_meta( $post->ID, '_wp_page_template', true );

			if ( $pageTemplate === 'page-templates/page-home.php' ) {

				$screens = array( 'page' );
				foreach ( $screens as $screen ) {

					add_meta_box(
						self::KEY_META_PAGE,
						__( 'Páginas a mostrar', 'classicwhite-theme' ),
						[$this, 'metaBoxPageHTML'],
						$screen
					);
				}
			}
		}
	}

	/**
	 * Prints the box content.
	 *
	 * @param WP_Post $post The object for the current post/page.
	 */
	public function metaBoxPageHTML( $post ) {
		$keymetaNonce = self::KEY_META_PAGE . '_nonce';
		$keymetaInput1 = self::KEY_META_PAGE . '_input1';

		// Add an nonce field so we can check for it later.
		wp_nonce_field( self::KEY_META_PAGE, $keymetaNonce );

		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$value = get_post_meta( $post->ID, $keymetaInput1, true );

		echo '<label for="' . $keymetaInput1 .'">';
		_e( 'Agregar Ids:', 'classicwhite-theme' );
		echo '</label> ';
		echo '<input type="text" id="' . $keymetaInput1 . '" name="' . $keymetaInput1 . '" value="' . esc_attr( $value ) . '" size="100" placeholder="424, 523, 1523" />';
	}

	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function saveMetaBoxPageList( $post_id ) {

		$keymetaNonce = self::KEY_META_PAGE . '_nonce';
		$keymetaInput1 = self::KEY_META_PAGE . '_input1';
		/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST[$keymetaNonce] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST[$keymetaNonce], self::KEY_META_PAGE ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		/* OK, it's safe for us to save the data now. */

		// Make sure that it is set.
		if ( ! isset( $_POST[$keymetaInput1] ) ) {
			return;
		}

		// Sanitize user input.
		$my_data = sanitize_text_field( $_POST[$keymetaInput1] );

		// Update the meta field in the database.
		update_post_meta( $post_id, $keymetaInput1, $my_data );
	}

	/**
	 * Add Metabox Product
	 */
	public function addMetaBoxProductList() {
		global $post;

		if ( !empty( $post ) ) {
			$pageTemplate = get_post_meta( $post->ID, '_wp_page_template', true );

			if ( $pageTemplate === 'page-templates/page-home.php' ) {

				$screens = array( 'page' );
				foreach ( $screens as $screen ) {

					add_meta_box(
						self::KEY_META_PRODUCT,
						__( 'Productos a mostrar', 'classicwhite-theme' ),
						[$this, 'metaBoxProductsHTML'],
						$screen
					);
				}
			}
		}
	}

	/**
	 * Prints the box content.
	 *
	 * @param WP_Post $post The object for the current post/page.
	 */
	public function metaBoxProductsHTML( $post ) {
		$keymetaNonce = self::KEY_META_PRODUCT . '_nonce';
		$keymetaInput1 = self::KEY_META_PRODUCT . '_input1';

		// Add an nonce field so we can check for it later.
		wp_nonce_field( self::KEY_META_PRODUCT, $keymetaNonce );

		/*
		 * Use get_post_meta() to retrieve an existing value
		 * from the database and use the value for the form.
		 */
		$value = get_post_meta( $post->ID, $keymetaInput1, true );

		echo '<label for="' . $keymetaInput1 .'">';
		_e( 'Agregar Ids:', 'classicwhite-theme' );
		echo '</label> ';
		echo '<input type="text" id="' . $keymetaInput1 . '" name="' . $keymetaInput1 . '" value="' . esc_attr( $value ) . '" size="100" placeholder="424, 523, 1523" />';
	}

	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function saveMetaBoxProductList( $post_id ) {

		$keymetaNonce = self::KEY_META_PRODUCT . '_nonce';
		$keymetaInput1 = self::KEY_META_PRODUCT . '_input1';
		/*
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST[$keymetaNonce] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST[$keymetaNonce], self::KEY_META_PRODUCT ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		/* OK, it's safe for us to save the data now. */

		// Make sure that it is set.
		if ( ! isset( $_POST[$keymetaInput1] ) ) {
			return;
		}

		// Sanitize user input.
		$my_data = sanitize_text_field( $_POST[$keymetaInput1] );

		// Update the meta field in the database.
		update_post_meta( $post_id, $keymetaInput1, $my_data );
	}


}
