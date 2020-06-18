<?php
/**
 * HelloWorld
 *
 * @package           HelloWorld
 * @author            Ambikesh kumar Gautam
 * @copyright         2020 Cedcoss PVT LKO
 * @license           GPL-2.0-or-later
 */

/**
 * HelloWorld
 *
 * @wordpress-plugin
 * Plugin Name:       HelloWorld
 * Plugin URI:        https://github.com/ambikeshkumargautam-cedcoss/WordPress-theme-development/tree/master/public/wp-content/plugins/pluginsdev
 * Description:       This Plugins is about making our own plugins in WordPress.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.3
 * Author:            Ambikesh Kumar Gautam
 * Author URI:        https://github.com/ambikeshkumargautam-cedcoss
 * Text Domain:       HelloWorld
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
 * Activate the plugin.
 */
function pluginprefix_activate() {
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
	add_option( 'installed_on', time() );
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
	// For deactivate Plugins .
	delete_option( 'installed_on' );
}

register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );
// Uninstall Plugin .
register_uninstall_hook( __FILE__, 'pluginprefix_function_to_run' );

// ====================================Twitter link and Number of characters =====================
/**
 * Filter Hook for content of blogposts(single posts) .
 *
 * @param string $content .
 */
function filter_the_content_in_the_main_loop( $content ) {
	// Check if we're  in a single Post.
	if ( is_single() ) {
		$content = $content . '<p><a href= "https://twitter.com/login/error?redirect_after_login=%2F . urlencode( get_the_permalink() )">Twitter</a></p>';
		// No of character in the Blogpost .
		$content .= '<h5>There are ' . esc_html( str_word_count( $content ) ) . ' Characters</h5>';
		return $content;
	}

			return $content; // Returning all content of blog listing page .
}
// Add filter for content .
add_filter( 'the_content', 'filter_the_content_in_the_main_loop' );

// ==================================== Add Custom settings  ===================================================
/**
 * Adding custom setting .
 *
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * Custom option and settings
 */
function wporg_settings_init() {
	// register a new setting for "wporg" page .
	register_setting( 'wporg', 'wporg_options' );

	// register a new section in the "wporg" page .
	add_settings_section(
		'wporg_section_developers', // Id .
		__( 'The Matrix has you.', 'wporg' ), // Title .
		'wporg_section_developers_cb', // call back functions .
		'wporg' // $page .
	);

	// register a new field in the "wporg_section_developers" section, inside the "wporg" page .
	add_settings_field(
		'wporg_field_pill', // Id .
		// use $args' label_for to populate the id inside the callback.
		__( 'Pill', 'wporg' ), // Title of setting field .
		'wporg_field_pill_cb', // Callback function .
		'wporg', // $page .
		'wporg_section_developers', // section default .
		array( // Arguments .
			'label_for'         => 'wporg_field_pill',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		)
	);
}

	/**
	* Register our wporg_settings_init to the admin_init action hook
	*/
	add_action( 'admin_init', 'wporg_settings_init' );

	/**
	 * Custom option and settings :
	 * callback functions
	 */

	// developers section cb ?

	// section callbacks can accept an $args parameter, which is an array.
	// $args have the following keys defined: title, id, callback.
	// the values are defined at the add_settings_section() function.
/**
 * This function will show out of developers sections.
 *
 * @param string $args .
 * @return void
 */
function wporg_section_developers_cb( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'wporg' ); ?></p>
	<?php
}

	// pill field cb.

	// field callbacks can accept an $args parameter, which is an array.
	// $args is defined at the add_settings_field() function.
	// WordPress has magic interaction with the following keys: label_for, class.
	// the "label_for" key value is used for the "for" attribute of the <label>.
	// the "class" key value is used for the "class" attribute of the <tr> containing the field.
	// you can add custom key value pairs to be used inside your callbacks.
	/**
	 * Show get_option wrong option .
	 *
	 * @param string $args .
	 * @return void
	 */
function wporg_field_pill_cb( $args ) {
	// get the value of the setting we've registered with register_setting().
	$options = get_option( 'wporg_options' );
	// output the field.
	?>
	<select id="<?php echo esc_attr( $args['label_for'] ); ?>"
	data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
	name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
	>
	<option value="red" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'red', false ) ) : ( '' ); ?>>
	<?php esc_html_e( 'red pill', 'wporg' ); ?>
	</option>
	<option value="blue" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'blue', false ) ) : ( '' ); ?>>
	<?php esc_html_e( 'blue pill', 'wporg' ); ?>
	</option>
	</select>
	<p class="description">
	<?php esc_html_e( 'You take the blue pill and the story ends. You wake in your bed and you believe whatever you want to believe.', 'wporg' ); ?>
	</p>
	<p class="description">
	<?php esc_html_e( 'You take the red pill and you stay in Wonderland and I show you how deep the rabbit-hole goes.', 'wporg' ); ?>
	</p>
	<?php
}

	/**
	 * Top level menu.
	 */
function wporg_options_page() {
	// add top level menu page .
	add_menu_page(
		'WPOrg',
		'WPOrg Options',
		'manage_options',
		'wporg',
		'wporg_options_page_html'
	);
}

	/**
	* Register our wporg_options_page to the admin_menu action hook
	*/
		add_action( 'admin_menu', 'wporg_options_page' );

	/**
	 * Top level menu:
	 * callback functions
	 */
function wporg_options_page_html() {
		// check user capabilities.
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// add error/update messages .

	// check if the user have submitted the settings
	// WordPress will add the "settings-updated" $_GET parameter to the url .
	if ( isset( $_GET['settings-updated'] ) ) {
		// Add settings saved message with the class of "updated".
		add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
	}

	// show error/update messages.
	settings_errors( 'wporg_messages' );
	?>
	<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form action="options.php" method="post">
	<?php
	// output security fields for the registered setting "wporg".
	settings_fields( 'wporg' );
	// output setting sections and their fields
	// (sections are registered for "wporg", each field is registered to a specific section).
	do_settings_sections( 'wporg' );
	// output save settings button.
	submit_button( 'Save Settings' );
	?>
	</form>
	</div>
	<?php
}
