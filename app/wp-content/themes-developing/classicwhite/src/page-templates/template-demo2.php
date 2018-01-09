<?php
/**
 * Template Name: Blog
 */

$mypage = (get_query_var('paged')) ? get_query_var('paged') : 0;
/***/
$limit = 4;
$count = count(get_posts(array('post_status' => 'publish', 'posts_per_page' => -1)));

if ($count > 0) {
	$total_pages = ceil($count/$limit);
} else {
   $total_pages = 1;
}
if ($mypage > $total_pages) { $mypage = $total_pages; }// $mypage = 0
if ($mypage < 1) { $mypage = 1; }

$start = $limit * $mypage - $limit;

$posts = get_posts(array('offset' => $start,'posts_per_page'=> $limit, 'post_status'=>'publish'));

?>
<?php

get_header(); ?>

<div class="wrapper-container">
	<div class="container">
		<div class="row">
			<?php get_template_part( 'template-parts/header-page' ); ?>
		</div>
		<?php if (is_array($posts) && count($posts) > 0) : ?>
			<div class="row no-gutters">
				<div class="col-4 text-center no-gutters sidebar-left">
					<h2 class="h3 m-3"><?php _e('POST RECIENTES', 'classicwhite-theme'); ?></h2>
					<?php $slicePost = array_slice($posts, 1, 5); ?>
					<?php foreach($slicePost as $post) : ?>
						<div class="row no-gutters">
							<div class="col-12 sidebar-left-container">
								<div class="sidebar-left-container-img">
									<a href="<?php echo get_the_permalink($post); ?>">
										<?php if (has_post_thumbnail($post)) : ?>
											<?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
										<?php else : ?>
											<img src="http://placehold.it/300x159?text=<?php echo $post->ID; ?>" />
										<?php endif; ?>
									</a>
								</div>
								<div class="sidebar-left-container-date">
									<p><?php echo get_the_date( 'd/m/Y', $post); ?></p>
								</div>
							</div>

							<div class="col-12 sidebar-left-container-title mt-3 mb-3">
								<h2><a href="<?php echo get_the_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h2>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="col-8 no-gutters main-content">
					<div class="frame-padding-box border-black">
						<?php $post = $posts[0]; ?>
						<div class="row">
							<div class="col-9">
								<h2><a href="<?php echo get_the_permalink($post); ?>"><?php echo get_the_title($post); ?></a></h2>
							</div>
							<div class="col-3 text-right">
								<?php _e('Fecha', 'classicwhite-theme'); ?>: <?php echo get_the_date( 'd/m/Y', $post); ?>
							</div>
						</div>
						<div class="row no-gutters line">
							<div class="col-2 fisrt-line"></div>
							<div class="col-10 second-line"></div>
						</div>

						<div class="row no-gutters">
							<div class="col-12 my-3 main-content-image">
								<a href="<?php echo get_the_permalink($post); ?>">
									<?php if (has_post_thumbnail($post)) : ?>
										<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
									<?php else : ?>
										<img src="http://placehold.it/700x370?text=<?php echo $post->ID; ?>" />
									<?php endif; ?>
								</a>
							</div>
						</div>

						<!-- red social share -->
						<div class="row no-gutters" style="min-height: 30px;">
							<div class="fb-like"
								data-href="<?php echo get_the_permalink($post); ?>"
								data-layout="button_count"
								data-action="like",
								data-size="small"
								data-show-faces="false"
								data-share="true">
							</div>
							<div class="twit" style="
								display: inline-block;
								margin: 0;
								/*position: absolute;*/
								padding-left: 0.23em;
								padding-top: 0.09em;">
								<?php
									$textTwit = rawurlencode("Lo ultimo de " . get_bloginfo() . " : " . get_the_title($post));
									$urlTwit = rawurlencode(wp_get_shortlink($post->ID));
									$stringTwURL = "https://twitter.com/intent/tweet?text={$textTwit}&tw_p=tweetbutton&url={$urlTwit}";
								?>
								<a class="twitter-share-button" href="<?php echo $stringTwURL; ?>"></a>
							</div>
						</div>
						<hr>

						<div class="row no-gutters">
							<div class="col-12 mb-4">
								<?php
									$result = get_extended($post->post_content);
									$resumeText = '';
									if (
										isset($result['main']) && strlen($result['main']) > 0 &&
										isset($result['extended']) && strlen($result['extended']) > 0
									) {
										$resumeText = $result['main'];
									} else {
										$content = wp_filter_nohtml_kses($post->post_content);
										$resumeText = limit_words($content, 33, '...');
									}
								?>
								<?php echo $resumeText; ?>
							</div>
						</div>
						<div class="row no-gutters line">
							<div class="col-2 fisrt-line"></div>
							<div class="col-10 second-line"></div>
						</div>

						<div class="row no-gutters">
							<div class="col-12 text-right mt-3">
								<a class="see-more text-uppercase mr-3"
								href="<?php echo get_the_permalink($post); ?>"><?php _e('Leer Más', 'classicwhite-theme'); ?><span class="html-arrow">&#8594;</span></a>
							</div>
						</div>
					</div><!-- border -->
				</div>
			</div>
		<?php else : ?>
			<div class="row">
				<div class="col-12">
					<?php _e('No se encontrarón resultados.', 'classicwhite-theme'); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div><!-- #wrapper-container -->
<?php get_footer(); ?>
