<?php
/**
 *
 * Convert an object to an array
 *
 * @package   Mythemes
 */

/**
 * Enqueue Bootstrap and Css function
 *
 * @return void
 */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'blog-home', get_template_directory_uri() . '/css/blog-home.css', array(), '1.1', 'all' );

}
/**
 * Enqueue Javascript function
 *
 * @return void
 */
function themeslug_enqueue_script() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '1.1', true );
}
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );




/**
 * Add Thumbnail in the post .
 * Thumbnails are 'search-form', 'comment-form ', 'comment-list ', 'gallery ', 'caption'
 */
	add_theme_support( 'post_thumbnails' );
	add_theme_support( 'post_thumbnails', array( 'search-form', 'comment-form ', 'comment-list ', 'gallery ', 'caption' ) );
	register_sidebar();

/**
 * Add menus in the appearence section
 *
 * @return void
 */
	add_theme_support( 'menues' );

/**
 * This is featured Image.
 * Thumbnail
 *
 * @return void
 */
add_theme_support( 'post-thumbnails' );

/**
 * Register navigation menus uses wp_nav_menu in three Places
 * This will show the Navbar in Head
 *
 * @return void
 */
function register_my_menus() {
	$locations = array(
		'header-menu' => __( 'Header Menu' ),
		'extra-menu'  => __( 'Extra Menu' ),
		'footer-menu' => __( 'Foote Menue' ),
		'item-wrap'   => __( '<ul id="menu">$3$s</u>' ),
	);
	register_nav_menus( $locations );

}
	add_action( 'init', 'register_my_menus' );


/**
 * For Custom logo .
 */
add_theme_support( 'custom-logo' );
/**
 * For Custom Background .
 */
add_theme_support( 'custom-background' );
/**
 * For Custom header .
 */
add_theme_support( 'custom-header' );
/**
 * For automatic feed links .
 */
add_theme_support( 'automatic-feed-links' );

/**
* Html5
*/
add_theme_support( 'html5', array( 'gallery' ) );

/**
 * For content width .
 */
add_theme_support( 'content-width' );
/**
 * For title-tag .
 */
add_theme_support( 'title-tag' );
/**
 * Added post_formate with feature, aside gallery.
 *
 * @see add_theme_support for post-formate.
 */
function themename_post_formats_setup() {
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}
	add_action( 'after_setup_theme', 'themename_post_formats_setup' );

/**
 * For editor style .
 */
add_editor_style( 'css/custom-editor-style.css' );

// Custom widgets options .
require_once get_stylesheet_directory() . '/inc/class-my-widget.php';
// Custom Sidebar .
require_once get_stylesheet_directory() . '/inc/custom-sidebar.php';
// Validate pages by user role like author ,admin ,subscriber , etc .
require_once get_stylesheet_directory() . '/inc/restric-author-access-pages.php';
// Customize post type Which is book custom post type  .
// require_once get_stylesheet_directory() . '/inc/custom-posttype.php';
// Adding customize API'S to customize some feature using customize .
require_once get_stylesheet_directory() . '/inc/class-theminimalist-customizer.php';
new TheMinimalist_Customizer(); // New object of the TheMinimalist_Customzer.
