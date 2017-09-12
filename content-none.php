<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialwp
 */
?>

<section class="no-results not-found">
	<div class="card">
		<div class="entry-container">
			<header>
				<h1 class="page-title"><?php _e( '内容未找到', 'materialwp' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'materialwp' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'materialwp' ); ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php _e( '内容尚未添加或已被删除，尝试搜索！', 'materialwp' ); ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>
			</div><!-- .page-content -->
		</div><!-- .entry-content -->
	</div><!-- .card -->
</section><!-- .no-results -->
