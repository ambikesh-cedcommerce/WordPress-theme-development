<?php
/**
 * MyClass File Doc Comment
 *
 * @category Mythemes
 * @package  WordPress
 * @author   Ambikeshgautam<ambikeshkumargautam@cedcoss.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
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
	);
	register_nav_menus( $locations );

}
	add_action( 'init', 'register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 */
function arphabet_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Right sidebar',
			'id'            => 'right_sidebar',
			'before_widget' => '<div class="card my-4">',
			'before_title'  => '<h5 class="card-header">',
			'after_title'   => '</h5><div class="card-body">',
			'after_widget'  => '</div></div>',
		)
	);

}
	add_action( 'widgets_init', 'arphabet_widgets_init' );


/**
 * For Custom logo .
 */
add_theme_support( 'custom-logo' );
/**
 * For Custom header .
 */
add_theme_support( 'custom-header' );
