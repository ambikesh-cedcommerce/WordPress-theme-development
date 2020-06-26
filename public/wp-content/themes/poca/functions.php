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
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'animate_css', get_template_directory_uri() . '/css/animate.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'audioplayer', get_template_directory_uri() . '/css/default-assets/audioplayer.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'classy-nav', get_template_directory_uri() . '/css/default-assets/classy-nav.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'htkgrotest-fonts', get_template_directory_uri() . '/css/default-assets/hkgrotesk-fonts.css', array(), '1.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
/**
 * Enqueue Javascript function
 *
 * @return void
 */
function themeslug_enqueue_script() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '1.1', true );
		wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array( 'jquery' ), '1.1', true );
		wp_enqueue_script( 'poca-bundle', get_template_directory_uri() . '/js/poca.bundle.js', array( 'jquery' ), '1.1', true );
		wp_enqueue_script( 'active', get_template_directory_uri() . '/js/default-assets/active.js', array( 'jquery' ), '1.1', true );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );



