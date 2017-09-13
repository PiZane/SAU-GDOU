<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialwp
 */

get_header();
$about  =  get_category_by_slug('about');
$video  =  get_category_by_slug('videos');
$before =  get_category_by_slug('before');
$after  =  get_category_by_slug('after');
$video  =  get_page_by_path( 'video' );
?>

<div class="container">
	<?php if ( have_posts() ) : ?>
		<div class="row hidden-xs hidden-sm">
			<div class="col-lg-12">
				<div class="slider" style="height: 400px;margin-bottom:3rem">
					<ul>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( is_sticky() ) : ?>
								<li class="top-post">
									<h2 class="slider-title"><?php echo $post->post_title; ?></h2>
									<a href="<?php the_permalink(); ?>">
										<img style="height: 400px;" src="<?php echo get_unslider_thumbnail($post->ID) ?>" alt="<?php echo $post->post_title; ?>" width="100%">
									</a>
								</li>
							<?php endif; ?>
						<?php endwhile; wp_reset_query();?>
					</ul>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="row">
		<div id="primary" class="col-md-8 col-lg-8">
			<main id="main" class="site-main" role="main">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h3 class="panel-title">社联介绍</h3>
						</div>
						<ul class="nav nav-tabs slTab" id="firstTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-expanded="true"><?php echo $video->name; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"><?php echo $about->name; ?></a>
							</li>
						</ul>
						<div class="tab-content" id="firstTabContent">
							<div class="tab-pane fade active" id="video" role="tabpanel" aria-labelledby="video">
								<?php if ( get_post_meta($video->ID, "video", true) ) : ?>
									<div style="padding:0;margin:0;">
											<video class="wp-video-shortcode" src="<?php echo get_post_meta($video->ID, "video", true);?>" preload="metadata" controls></video>
									</div>
								<?php else : ?>
									<?php if ( get_post_meta($video->ID, "html", true) ) : ?>
										<?php echo get_post_meta($video->ID, "html", true); ?>
									<?php else : ?>
										<?php get_template_part( 'content', 'none' ); ?>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="video">
								<?php query_posts(array('cat'=> $about->cat_ID, 'posts_per_page'=>3)); ?>
								<?php if ( have_posts() ) : ?>
									<div class="list-group" style="padding:0">
										<?php while ( have_posts() ) : the_post(); ?>
											<div class="row article-list" style="mar">
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
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h3 class="panel-title">社联风采</h3>
						</div>
						<ul class="nav nav-tabs slTab" id="secondTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="before-tab" data-toggle="tab" href="#before" role="tab" aria-controls="before" aria-expanded="true"><?php echo $before->name; ?></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="after-tab" data-toggle="tab" href="#after" role="tab" aria-controls="after"><?php echo $after->name; ?></a>
							</li>
						</ul>
						<div class="tab-content" id="secondTabContent">
							<div class="tab-pane fade active" id="before" role="tabpanel" aria-labelledby="before">
								<?php query_posts(array('cat'=> $before->cat_ID, 'posts_per_page'=>5)); ?>
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
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
							</div>
							<div class="tab-pane fade" id="after" role="tabpanel" aria-labelledby="after">
								<?php query_posts(array('cat'=> $after->cat_ID, 'posts_per_page'=>5)); ?>
								<?php if ( have_posts() ) : ?>
									<div class="list-group" style="padding:0">
										<?php while ( have_posts() ) : the_post(); ?>
											<div class="row article-list" style="mar">
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
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div> <!-- .row -->
</div> <!-- .container -->

<?php get_footer(); ?>
