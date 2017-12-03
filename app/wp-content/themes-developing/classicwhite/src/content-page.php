<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>
<?php if (is_search()) : ?>

		<div class="row">
			<div class="col-md-12">
				<article>
					<div class="page">
						<h2 class="entry-title point-li">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2>
					</div>

					<?php if ( is_search() ) : // Only display Excerpts for Search ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					<?php else : ?>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'andexone' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'andexone' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<?php endif; ?>

				</article><!-- #post -->
			</div>
			<!--<div class="col-md-4 page-sidebar">
				<?php //get_sidebar() ?>
			</div>-->
		</div>

<?php else : ?>

		<div class="row">
			<div class="subtitle subtitle-bg-1 page">
				<h2 class="color-text-blue"><?php the_title(); ?></h2>
			</div>
		</div>

		<div class="row margin-bottom-60">
			<div class="col-md-8">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
						<footer class="entry-meta">
							<?php //edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
				</article><!-- #post -->
			</div>
			<div class="col-md-4 page-sidebar">
				<?php get_sidebar() ?>
			</div>
		</div>

<?php endif; ?>
