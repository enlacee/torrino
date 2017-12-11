<?php

get_header(); ?>

	<div class="wrapper-container">
		<div class="container">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/page' ); ?>
				<?php //comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #wrapper-container -->
	</div><!-- #page -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
