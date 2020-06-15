<?php
/**
 * Myplugins-dev
 *
 * @package           Myplugins-dev
 * @author            Ambikesh kumar Gautam
 * @copyright         2020 Cedcoss PVT LKO
 * @license           GPL-2.0-or-later
 */

/**
 * Myplugins-dev
 *
 * @wordpress-plugin
 * Plugin Name:       Myplugins-dev
 * Plugin URI:        https://github.com/ambikeshkumargautam-cedcoss/WordPress-theme-development/tree/master/public/wp-content/plugins/myplugins-dev
 * Description:       This Plugins is about making our own plugins in WordPress.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            Ambikesh Kumar Gautam
 * Author URI:        https://github.com/ambikeshkumargautam-cedcoss
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
/**
 * If ( ! defined( 'ABSPATH' ) ) {
 * die;
 * }
 * ( 'ABSPATH', false ) || die( 'Hey , you can\t access this file , You are silly human ! ' );

 * If ( ! function_exists( 'add_action' ) ) {
 * echo 'you can\t access this file , You are silly human';
 * exit;
 * }
 */
/**
 * If this file is called directly, then abort execution.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Comment of this class here...
 */
final class Myplugins_Dev {
	/**
	 * Comment of this class here...
	 *
	 * @param string $string this will recieve a messege which is comming form the created object .
	 */
	public function __construct( $string ) {
		echo esc_html( $string );
	}
}

if ( class_exists( 'Myplugins_Dev' ) ) { // If this class exists then create a instance of this class .
	$myplugins_dev = new Myplugins_Dev( 'Myplugins-dev initialized' ); // Instance of the class .
}

