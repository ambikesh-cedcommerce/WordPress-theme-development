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
* Register our wporg_options_page to the admin_menu action hook
*/
	add_action( 'admin_menu', 'add_new_menu_items' );

/**
 * WordPress Menus API.
 */
function add_new_menu_items() {
		// add top level menu page i.e , this menu item have can have sub menus .
		add_menu_page(
			'WPOrg', // Required. (string $page_title) Text heading of the page that displayed on the top of the Page(Heading) .
			'WPOrg', // Required. (string $menu_title) Text to be displayed in the menu .
			'manage_options', // Required . (string $capability) The required capability of users to access this menu item .
			'wporg', // Required. ( string $menu_slug ) A unique identifier to identify this menu item (which is slug of the page).
			'wporg_options_page_html', // ( callable $function ) this will show all the content on the page .
			'' // Optional . The URL to the menu item icon .
			// Privority  of the menu section where it will be show in the admin panel .
		);

}
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

		// show error/update messages. on the top of the page .
		settings_errors( 'wporg_messages' );
	?>
		<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form id="input-admin-form" action="options.php" method="post">
		<?php
		// output security fields for the registered setting "wporg".
		// Prints the input field with names 'wponce', 'action' and 'option_page' in formsection of setting page .
		// The 'wporg' is the settings group name , which should match the group name used in register_setting().
		// The add_settings_section callback is displayed here . for every new section we need to call settings_fields .
		settings_fields( 'wporg' );

		// do_settings_sections is called add_settings_field() function here
		// output setting sections and their fields
		// (sections are registered for "wporg", each field is registered to a specific section).
		// Prints out heading (h2) and a table with all settings sections inside the form section of the settings page .
		// 'wporg' is the slug name o fthe page whose settings sectiosn you want to output .
		do_settings_sections( 'wporg' );
		// Add the submit button to serialize the options.
		?>
		<?php
		submit_button( 'Change setting' );
		?>
		</form>
		</div>
		<?php
}

/**
 * Custom option and settings
 */
function display_the_options_init_settings() {
	// Register the setting for add_settings_field()
	// "swporg" setting group name same as define in add_settings_field() and setting_field().
	// "wporg_options" is the id attributes of the input field of table with name wporg_options .
	register_setting( 'wporg', 'wporg_options' );

	// Adds a new [Hidden input fieid with class] .
	// wporg is the value of the hidden input field with than option_page.
	// wporg_section_developers_cb is a callback function that prints the description of setting page .
	// 'wporg' is slug name of the page whose settings sections you want to output .
	// register a new section in the "wporg" page ..
		add_settings_section(
			'wporg_section_developers_two', // Id of add_settings_section .
			__( 'This is new second section.', 'wporg' ), // Page heading.
			'wporg_section_developers_cd_two', // call back functions .
			'wporg' // $page (page identifier).
		);
		// Setting name, dispaly name , callback to print from element , page in which field in displayed , section to which it belongs.
		// last field section is optional.
		// Add a setting field to a settings page and section by creating a table with heading that will be display no settng page
		// 'wporg_field_pill' is the id attribute of input field of table with name 'wporg_field_pill'.
		// '__( 'Pill', 'wporg' ), is title of the input field of table with name __( 'Pill', 'wporg' ), .
		// 'wporg_field_pill_cb' is callback function that prints the input field with name Pill .
		// 'wporg' is the slug name of the page whose settings sections you want to output.
		// 'wporg_section_developers' is the Group name , which should match the group name used in settings_fields().
		// register a new field in the "wporg_section_developers" section, inside the "wporg" page .
		add_settings_field(
			'wporg_field_pill_two', // Id .
			// use $args' label_for to populate the id inside the callback .
			__( 'Pill_Two', 'wporg' ), // Title of setting field .
			'wporg_field_pill_cb_two', // Callback function .
			'wporg', // $page .
			'wporg_section_developers_two', // section default .
			array( // Arguments .
				'label_for'         => 'wporg_field_pill',
				'class'             => 'wporg_row',
				'wporg_custom_data' => 'custom',
			)
		);
	/**
	 * ============================================
	 * Facebook link  Sections in WPORG settings.
	 * ============================================
	 */
	// Adds a new [Hidden input fieid with class] .
	// wporg is the value of the hidden input field with than option_page.
	// wporg_section_developers_cb is a callback function that prints the description of setting page .
	// 'wporg' is slug name of the page whose settings sections you want to output .
	// register a new section in the "wporg" page ..
	add_settings_section(
		'wporg_section_facebook_link', // Id of add_settings_section .
		__( 'Social Media Links ', 'wporg' ), // Page heading.
		'wporg_section_facebook_display', // call back functions .
		'wporg' // $page (page identifier).
	);
	// Setting name, dispaly name , callback to print from element , page in which field in displayed , section to which it belongs.
	// last field section is optional.
	// Add a setting field to a settings page and section by creating a table with heading that will be display no settng page
	// 'wporg_field_pill' is the id attribute of input field of table with name 'wporg_field_pill'.
	// '__( 'Pill', 'wporg' ), is title of the input field of table with name __( 'Pill', 'wporg' ), .
	// 'wporg_field_pill_cb' is callback function that prints the input field with name Pill .
	// 'wporg' is the slug name of the page whose settings sections you want to output.
	// 'wporg_section_developers' is the Group name , which should match the group name used in settings_fields().
	// register a new field in the "wporg_section_developers" section, inside the "wporg" page .
	add_settings_field(
		'facebook_link', // Id of dataBase where it storing .
		// use $args' label_for to populate the id inside the callback .
		__( 'Facebook link', 'wporg' ), // Title of setting field .
		'wporg_field_display_inputbox', // Callback function .
		'wporg', // $page .
		'wporg_section_facebook_link', // section default .
		array( // Arguments .
			'label_for'         => 'facebook_link',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		)
	);
	// Setting name, dispaly name , callback to print from element , page in which field in displayed , section to which it belongs.
	// last field section is optional.
	// Add a setting field to a settings page and section by creating a table with heading that will be display no settng page
	// 'wporg_field_pill' is the id attribute of input field of table with name 'wporg_field_pill'.
	// '__( 'Pill', 'wporg' ), is title of the input field of table with name __( 'Pill', 'wporg' ), .
	// 'wporg_field_pill_cb' is callback function that prints the input field with name Pill .
	// 'wporg' is the slug name of the page whose settings sections you want to output.
	// 'wporg_section_developers' is the Group name , which should match the group name used in settings_fields().
	// register a new field in the "wporg_section_developers" section, inside the "wporg" page .
	add_settings_field(
		'twitter_link', // Id of dataBase where it storing .
		// use $args' label_for to populate the id inside the callback .
		__( 'Twitter Link', 'wporg' ), // Title of setting field .
		'wporg_field_display_inputbox_twitter', // Callback function .
		'wporg', // $page .
		'wporg_section_facebook_link', // section default .
		array( // Arguments .
			'label_for'         => 'twitter_link',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		)
	);

}

/**
* Register our wporg_settings_init to the admin_init action hook
*/
add_action( 'admin_init', 'display_the_options_init_settings' );

/**
 * This function will show out of developers sections.
 *
 * @param string $args .
 * @return void
 */
function wporg_section_developers_cd_two( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'wporg' ); ?></p>
	<?php
}
/**
 * This function will show out of developers sections.
 *
 * @param string $args .
 * @return void
 */
function wporg_section_facebook_display( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Add You links here to link in the bottum of the page.', 'wporg' ); ?></p>
	<?php
}
	/**
	 * Show get_option wrong option .
	 *
	 * @param string $args .
	 * @return void
	 */
function wporg_field_pill_cb_two( $args ) {
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
	 * Show input Box for input Facebook link here .
	 *
	 * @param string $args .
	 * @return void
	 */
function wporg_field_display_inputbox( $args ) {

	?>
	<textarea id="<?php echo esc_attr( $args['label_for'] ); ?>"  
	name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
	</textarea>
	<?php

}
	/**
	 * Show input Box for input Facebook link here .
	 *
	 * @param string $args .
	 * @return void
	 */
function wporg_field_display_inputbox_twitter( $args ) {
	?>
	<textarea id="<?php echo esc_attr( $args['label_for'] ); ?>"  
	name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
	</textarea>
	<?php
}

// ==================================== Register Custom Post type  ===================================================
/**
 * This function will show all the content of the CUSTOM POST TYPE .
 *
 * @return void
 */
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_book_init() {
	/**
	 * The $labels array holds the labels for the Custom Taxonomy.
	 * These labels will be used for displaying various information about the
	 * Taxonomy in the Administration area.
	 */
	$labels = array(
		'name'                  => _x( 'Global News', 'Post type general name', 'textdomain' ), // which will apear in the top of the page .
		'singular_name'         => _x( 'News', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'News', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'News', 'Add News on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add News', 'textdomain' ),
		'add_new_item'          => __( 'Add New Global News', 'textdomain' ),
		'new_item'              => __( 'New news', 'textdomain' ),
		'edit_item'             => __( 'Edit news', 'textdomain' ),
		'view_item'             => __( 'View news', 'textdomain' ),
		'all_items'             => __( 'All news', 'textdomain' ),
		'search_items'          => __( 'Search news', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent news:', 'textdomain' ),
		'not_found'             => __( 'No News found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No News found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'News Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'News archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'News list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'News list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'news', $args ); // 'news' is Id of cutom post type .
}

add_action( 'init', 'wpdocs_codex_book_init' );

// ===========================Include custom template directory [custom-template-news.php] file =====================================================

add_filter( 'template_include', 'hello_news_tamplate' );

/**
 * Undocumented function
 *
 * @param string $template Holder the directory folder name   .
 * @return string
 */
function hello_news_tamplate( $template ) {
	global $post;
	if ( is_single() && 'news' === $post->post_type ) {
		$template = plugin_dir_path( __FILE__ ) . 'template/custom-template-news.php';
	}
	return $template;

}
// ========================================= Register Custom texonomy With Name [Sport] ============================================================
/**
 * This function register_taxonomy in the cutom post .
 *
 * @return void
 */
function wporg_register_taxonomy_course() {
	$labels = array(
		'name'              => _x( 'News Category ', 'taxonomy general name' ),
		'singular_name'     => _x( 'News Category ', 'taxonomy singular name' ),
		'search_items'      => __( 'Search News Category' ),
		'all_items'         => __( 'All News Category' ),
		'parent_item'       => __( 'Parent News Category' ),
		'parent_item_colon' => __( 'Parent News Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add News Category' ),
		'new_item_name'     => __( 'New News Category ' ),
		'menu_name'         => __( 'News Category' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories).
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' => 'news-category',
		),
	);
	// 1. First Parameter of register_taxonomy is "slug" of the taxonomy which will show in the browser URL.
	// 2. Second @param is custom post name where it will show in the sub-menu of the custom posts.
	// 3. Third is Arguments .
	register_taxonomy( 'category', array( 'news' ), $args );

	$labels_tag = array(
		'name'              => _x( 'News tag ', 'taxonomy general name' ),
		'singular_name'     => _x( 'News tag ', 'taxonomy singular name' ),
		'search_items'      => __( 'Search News tag' ),
		'all_items'         => __( 'All News tag' ),
		'parent_item'       => __( 'Parent News tag' ),
		'parent_item_colon' => __( 'Parent News tag:' ),
		'edit_item'         => __( 'Edit tag' ),
		'update_item'       => __( 'Update tag' ),
		'add_new_item'      => __( 'Add News tag' ),
		'new_item_name'     => __( 'New News tag ' ),
		'menu_name'         => __( 'News tag' ),
	);
	$args_tag   = array(
		'hierarchical'      => false, // make it hierarchical (like categories).
		'labels'            => $labels_tag,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' => 'new-tag',
		),
	);
	register_taxonomy( 'tag', array( 'news' ), $args_tag );
}
add_action( 'init', 'wporg_register_taxonomy_course' );

// ============================================================================================================ .

/**
 * Including example-enqueue-ajax.php in core template of the plugins it enqueue js and localize to send ajax request to the simple-ajax-example.php .
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/helloworld-enqueue-ajax.php';
/**
 * Including simple-ajax-example.php in core template of the plugins it is responsible to handle ajax request and send response to this .
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/hw-ajax-simple.php';
