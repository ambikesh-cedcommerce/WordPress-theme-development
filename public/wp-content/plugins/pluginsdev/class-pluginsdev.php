<?php
/**
 * Myplugins-dev
 *
 * @package           Pluginsdev
 * @author            Ambikesh kumar Gautam
 * @copyright         2020 Cedcoss PVT LKO
 * @license           GPL-2.0-or-later
 */

/**
 * Myplugins-dev
 *
 * @wordpress-plugin
 * Plugin Name:       Pluginsdev
 * Plugin URI:        https://github.com/ambikeshkumargautam-cedcoss/WordPress-theme-development/tree/master/public/wp-content/plugins/pluginsdev
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

/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'PLUGINSDEV_VERSION', '1.0.0' );
/**
 * Comment of this class here...
 */
final class Pluginsdev {
	/**
	 * Activate the plugin.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'custom_post_type' ) );
	}
	/**
	 * This register method is only takes care of triggering the action the registering .
	 */
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	/**
	 * Comment of this class here...
	 *
	 * @param string $string this will recieve a messege which is comming form the created object .
	 */
	/**
	 * Activate the plugin.
	 */
	public function custom_post_type() {
		register_post_type(
			'mobile',
			array(
				'public' => true,
				'label'  => 'Mobiles',

			)
		);
	}
	/**
	 * Activate the plugin.
	 */
	public function activate() {
		// Generated a CTP .
		$this->custom_post_type();
		// Flush rewrite rules.
	}
	/**
	 * Activate the plugin.
	 */
	public function enqueue() {
		// enqueue all our scripts .
		wp_enqueue_style( 'mypluginstyle', plugins_url( '/admin/mystyle.css' . __FILE__ ), array( '' ) ,false ,'all' );
	}
	/**
	 * Activate the plugin.
	 */
	public function deactivate() {
		// Flush rewrite rules .
	}
	/**
	 * Activate the plugin .
	 */
	public function uninstall() {
		// Delete custom post type .
		// Delete  all the data from the DataBase .
	}

}

if ( class_exists( 'Pluginsdev' ) ) { // If this class exists then create a instance of this class .
	$plugins_dev = new Pluginsdev( 'initialzation' ); // Instance of the class .
	$plugins_dev->register();
}

// Activation  .
register_activation_hook( __FILE__, array( $plugins_dev, 'activate' ) );
// Deactivation .
register_deactivation_hook( __FILE__, array( $plugins_dev, 'deactivate' ) );
// Uninstall .
