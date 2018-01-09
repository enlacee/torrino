<?php
/**
 * Template Name: Home
 */
?>
<?php get_header(); ?>
<div class="wrapper-container">
	<!-- body -->
	<main class="home">
		<section class="section-home-baners">
			<div class="container_">
				<?php echo do_shortcode( '[rev_slider alias="thehome"]' ); ?>
			</div>
		</section>
		<?php
		$keySidebarSelect = 'classicwhite-sidebar-home-area';
		?>
		<?php if ( is_active_sidebar( $keySidebarSelect ) ) : ?>
			<?php dynamic_sidebar( $keySidebarSelect ); ?>
		<?php endif; ?>

	</main>
</div><!-- End.wrapper-container-->
<?php get_footer(); ?>
