<?php
$queried_object = get_queried_object();
$posts = false;

if ( $queried_object ) {
	$post_id = $queried_object->ID;

	$idProducts = get_post_meta( $post_id, HomeAction::KEY_META_PRODUCT .'_input1', true );
	$ids = preg_split('#,#', $idProducts);
	$arrayPostId = array();
	foreach ($ids as $key => $value) {
		if (!empty($value)) {
			array_push($arrayPostId, $value);
		}
	}

	// list post
	if (count($arrayPostId) > 0) {
		$params = array(
			'post__in'	=> $arrayPostId,
			'post_type'	=> Product_Custom_Post::POST_TYPE_NAME,
			'orderby'	=> 'none'
		);

		$posts = get_posts($params);
	}
}
?>
<?php if (is_array($posts) && count($posts) > 0):  ?>
	<section class="section-home-products">
		<div class="container">
			<div class="d-flex justify-content-center mt-4 mb-2">
				<div class="w-75 text-center mt-4 mb-5">
					<?php echo $title; ?>
				</div>
			</div>

			<div class="row justify-content-center mt-4">
				<div class="col-12 col-sm-12 col-md-10">
					<section class="regular slider-product">
						<?php foreach ($posts as $post) : ?>
							<div>
								<a class="card-product" href="<?php echo get_permalink($post->ID); ?>">
									<div class="d-flex align-items-center card-product-image">
										<?php if (has_post_thumbnail($post)) : ?>
											<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
										<?php else : ?>
											<img src="http://placehold.it/380x380?text=<?php echo $post->ID; ?>" />
										<?php endif; ?>
									</div>
									<h3 class="my-2 text-capitalize"><?php echo $post->post_title; ?></h3>
									<?php if (!empty($post->post_content)) : ?>
										<p><?php echo limit_string($post->post_content, 50); ?></p>
									<?php endif; ?>
								</a>
							</div>
						<?php endforeach; ?>
					</section>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
