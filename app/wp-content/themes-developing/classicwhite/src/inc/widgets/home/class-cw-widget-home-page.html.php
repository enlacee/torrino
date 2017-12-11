<?php
$queried_object = get_queried_object();
$posts = false;

if ( $queried_object ) {
	$post_id = $queried_object->ID;

	$idProducts = get_post_meta( $post_id, HomeAction::KEY_META_PAGE .'_input1', true );
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
			'post_type'	=> 'page',
			'orderby'	=> 'none'
		);

		$posts = get_posts($params);
	}
}
?>
<?php if (is_array($posts) && count($posts) > 0):  ?>
	<section class="section-home-pages">
		<div class="container ">
			<div class="d-flex justify-content-center">
				<div class="w-75 text-center mt-4 mb-5">
					<?php echo $title; ?>
				</div>
			</div>
			<div class="row justify-content-center mt-4">
				<div class="col-12 col-sm-12 col-md-10 d-flex justify-content-left flex-wrap">
					<?php foreach ($posts as $post) : ?>
						<div>
							<a class="card-page text-center" href="<?php echo get_permalink($post->ID); ?>">
								<div class="d-flex align-items-center card-page-image">
									<?php if (has_post_thumbnail($post)) : ?>
										<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
									<?php else : ?>
										<img src="http://placehold.it/240x240?text=<?php echo $post->ID; ?>" />
									<?php endif; ?>
								</div>
	<!-- 							<img src="http://placehold.it/240x240?text=2" alt="" class="img-fluid_" /> -->
								<h3 class="mt-3 text-uppercase"><?php echo $post->post_title; ?></h3>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
