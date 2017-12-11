<?php
$theThumbnail = '';
$theExcerpt = '';
if (has_post_thumbnail($post)) {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size');
	$theThumbnail = "background-image:url('" . $thumb_url[0] . "')";
}

$theExcerpt = get_the_excerpt($post->ID);
?>
<div class="col-12 d-flex justify-content-center align-items-center mb-4 subtitle-bg">
	<div class="layer-image" style="<?php echo $theThumbnail; ?>"></div>
	<div class="layer-apha"></div>
	<div class="d-block title">
		<h1 class="text-uppercase"><?php the_title(); ?><span class="line"></span></h1>
		<?php if (!empty($theExcerpt)) : ?>
			<p class="d-block mx-3"><?php echo $theExcerpt; ?></p>
		<?php endif; ?>
	</div>
</div>
