<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package materialwp
 */
?>
<?php if(is_single() && isset($_GET['iframe'])) : ?>
	<style>
		html{overflow: hidden;}
		*{padding: 0;margin: 0}
		img{max-width: 100%!important}
		video{max-width: 100%!important}
	</style>
	<div class="post-iframe">
		<?php echo $post->post_content; ?>
	</div>
<?php exit();?>
<?php endif ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'materialwp' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav class="navbar sl-navbar navbar-inverse" role="navigation">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header sl-navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
					<a class="visible-lg visible-md" style="display:block;width:285px;height:100%;" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img class="img-responsive" src="<?php echo get_template_directory_uri() . '/assets/img/logo.png' ?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
					<a class="navbar-brand hidden-lg hidden-md" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				</div>

    			<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
				 <?php
		            wp_nav_menu( array(
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => false,
		                'menu_class'        => 'nav sl-nav navbar-nav navbar-right',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
	        	?>

        		</div> <!-- .navbar-collapse -->
        	</div><!-- /.container -->
		</nav><!-- .navbar .navbar-default -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
