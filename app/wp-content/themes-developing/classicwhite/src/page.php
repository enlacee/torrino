<?php

get_header(); ?>

	<div class="wrapper-container">
		<div class="page container color-bg-white ">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php //comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #wrapper-container -->
	</div><!-- #page -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

