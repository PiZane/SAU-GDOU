<?php
/**
 * @package materialwp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="card">
		<div class="entry-img">
			<?php if ( has_post_thumbnail() && get_post_meta($post->ID, "thumbnail", true) ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</div>

		<div class="entry-container">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta">
					<?php materialwp_posted_on(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-content">
				<iframe src="<?php the_permalink() ?>&iframe=1" width="100%" height="100%" style="border:none;" onload="content()"></iframe>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'materialwp' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php materialwp_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div> <!-- .entry-container -->
	</div> <!-- .card -->
</article><!-- #post-## -->
