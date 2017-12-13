<?php
/**
 * Template Name: Nuestros Productos
 */
?>
<?php get_header(); ?>
<div class="wrapper-container">
	<div class="container our-products">
		<div class="row">
			<?php get_template_part( 'template-parts/header-page' ); ?>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="content-box text-center">
					<?php
					$taxonomy = Product_Custom_Post::TAXONOMY_TAG_NAME;
					$terms = get_terms($taxonomy, array('orderby' => 'ID', 'order' => 'ASC'));

					$params = array(
						'post_type'		=> Product_Custom_Post::POST_TYPE_NAME,
						'orderby'		=> 'none',
						'posts_per_page'=> 50
					);

					$posts = get_posts($params);
					?>
					<?php foreach ($terms as $thekey => $term) : ?>
						<button type="button" class="btn btn-secondary text-uppercase"
							data-id="<?php echo $term->term_id ?>"><?php echo $term->name ?></button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<div class="content-box">
					<?php if (is_array($posts) && count($posts) > 0) :  ?>
							<?php foreach ($posts as $key => $post) : ?>
							<?php
								$terms = get_the_terms($post->ID, Product_Custom_Post::TAXONOMY_TAG_NAME);
								if ($terms && !is_wp_error($terms)) {
									$draught_links = array();
									foreach ($terms as $term) {
										$draught_links[] = $term->term_id;
									}
									$on_draught = join( " ", $draught_links );
								}
							?>
							<a href="<?php echo get_permalink($post->ID); ?>" class="card-product-store <?php echo $on_draught ?>"
								style="display: none">
								<div class="d-flex align-items-center">
									<?php if (has_post_thumbnail($post)) : ?>
										<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
									<?php else : ?>
										<img src="http://placehold.it/380x380?text=<?php echo $post->ID; ?>" />
									<?php endif; ?>
								</div>
							</a>
						<?php endforeach; ?>
					<?php else : ?>
						<p><?php _e('No se encontrarón resultados', 'classicwhite-theme') ?>.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div><!-- End.wrapper-container-->
<script type="text/javascript">
	jQuery( document ).ready( function() {

		if ( jQuery( '.our-products' ).length >= 1 ) {

			var $productLinks = jQuery( '.our-products .content-box a.card-product-store' );
			var $buttonsLinks = jQuery( '.content-box button' );

			$buttonsLinks.on( 'click', function(e){
				e.preventDefault();
				var $el = jQuery( this );
				var selectorClass = '';

				$buttonsLinks.removeClass( 'active' );
				$el.addClass( 'active' );
				$productLinks.hide();

				// check id
				if ( $el.attr( 'data-id' ).length > 0 ) {
					selectorClass = $el.attr( 'data-id' );
					// show items
					jQuery.each( $productLinks, function() {
						if ( jQuery( this ).hasClass( selectorClass ) === true ) {
							jQuery( this ).show();
						}
					});
				}
			});

			// active first button (once time)
			$buttonsLinks.first().click();
		}
	});
</script>
<?php get_footer(); ?>
