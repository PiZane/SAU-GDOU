<?php
/**
 * materialwp functions and definitions
 *
 * @package materialwp
 */

if ( ! function_exists( 'materialwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function materialwp_setup() {

	/**
	* Set the content width based on the theme's design and stylesheet.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on materialwp, use a find and replace
	 * to change 'materialwp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'materialwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Suport for WordPress 4.1+ to display titles
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'materialwp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'image', 'video', 'quote', 'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'materialwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // materialwp_setup
add_action( 'after_setup_theme', 'materialwp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function materialwp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'materialwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="panel panel-warning">',
		'after_widget'  => '</div></aside>',
		'before_title'  => ' <div class="panel-heading"><h3 class="panel-title">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'materialwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialwp_scripts() {
	$home_url = get_template_directory_uri() . '/';
	wp_enqueue_style( 'sl-bootstrap-styles', 'https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7', 'all' );

	wp_enqueue_style( 'sl-roboto-styles', $home_url . 'assets/css/roboto.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'sl-material-styles', $home_url . 'assets/css/material-fullpalette.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'sl-ripples-styles', $home_url . 'assets/css/ripples.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'sl-materialwp-style', $home_url . 'assets/css/style.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'sl-bootstrap-js', 'https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3.3.7', true );

	wp_enqueue_script( 'sl-ripples-js', $home_url . 'assets/js/ripples.min.js', array(), '', true );

	wp_enqueue_script( 'sl-material-js', $home_url . 'assets/js/material.min.js', array(), '', true );

	wp_enqueue_script( 'unslider', $home_url . 'assets/js/unslider-min.js', array(), '', true );

	wp_enqueue_script( 'scroll', $home_url . 'assets/js/jquery.simple-scroll-follow.min.js', array(), '', true );

	wp_enqueue_script( 'main-js', $home_url . 'assets/js/main.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'materialwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Adds a Walker class for the Bootstrap Navbar.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Comments Callback.
 */
require get_template_directory() . '/inc/comments-callback.php';

function custom_enqueue_scripts() {
	wp_deregister_script('jquery');
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts', 1);

remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
remove_action('wp_head', 'wp_generator'); //removes meta name generator.
remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
remove_action('wp_head', 'feed_links', 2 ); //removes feed links.
remove_action('wp_head', 'feed_links_extra', 3 );  //removes comments feed.
remove_action('wp_head', 'rest_output_link_wp_head');

function get_unslider_thumbnail( $id ) {
	$first_img = '';
	// 如果设置了缩略图
	$post_thumbnail_id = get_post_thumbnail_id( $id );
	if ( $post_thumbnail_id ) {
	   	$output = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	   	$first_img = $output[0];
	} else {
			$first_img =  home_url('/') . 'assets/img/' . $id % 4 . '.png';
	}
	return $first_img;
}

function get_post_thumbnail_url( $id ) {
// global $post, $posts;
$first_img = '';

// 如果设置了缩略图
$post_thumbnail_id = get_post_thumbnail_id( $id );
if ( $post_thumbnail_id ) {
    $output = wp_get_attachment_image_src( $post_thumbnail_id, array('220','140') );
    $first_img = $output[0];
} else { // 没有缩略图，查找文章中的第一幅图片
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ // 既没有缩略图，文中也没有图，设置一幅默认的图片
        //return get_template_directory_uri() . '/img/' . 0  .'.png';
        return home_url('/') . 'assets/img/default.png';
    }
}

return $first_img;
}

function get_post_excerpt($post, $excerpt_length=150){
    $post_excerpt = $post->post_excerpt;
    if($post_excerpt == ''){
        $post_content = $post->post_content;
        $post_content = do_shortcode($post_content);
        $post_content = wp_strip_all_tags( $post_content );

        $post_excerpt = mb_strimwidth($post_content,0,$excerpt_length,'…','utf-8');
    }

    $post_excerpt = wp_strip_all_tags( $post_excerpt );
    $post_excerpt = trim( preg_replace( "/[\n\r\t ]+/", ' ', $post_excerpt ), ' ' );

    return $post_excerpt;
}
