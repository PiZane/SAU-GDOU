<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialwp
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div id="primary" class="col-md-8 col-lg-8">
			<main id="main" class="site-main" role="main">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<?php the_archive_title( '<h3 class="panel-title">', '</h3>' ); ?>
					</div>
					<?php if ( have_posts() ) : ?>
						<div class="list-group" style="padding:0">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="row article-list">
									<div class="col-md-4 hidden-sm hidden-xs" style="padding:0">
										<a class="article-thumbnail" href="<?php the_permalink(); ?>">
											<img src="<?php echo get_post_thumbnail_url($post->ID) ?>" alt="<?php echo $post->post_title; ?>">
										</a>
									</div>
									<div class="col-md-8 col-sm-12">
										<h4 class="sl-list-item"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h4>
										<p class="excerpt visible-lg visible-md"><?php echo get_post_excerpt($post) ?></p>
										<p class="text-right visible-lg visible-md"><?php the_time('Y年n月j日 G:i');; ?></p>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
						<?php materialwp_paging_nav(); ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div>
			</main>
		</div>
		<?php get_sidebar(); ?>
	</div> <!-- .row -->
</div> <!-- .container -->

<?php get_footer(); ?>
