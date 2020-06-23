<?php
/**
 * This file is enqueueing ajax file in this folder .
 *
 * @package Helloworld
 */

/**
 * This fucntion enqueueing javascript and localize script in this template  .
 * "handle" of both wp_enqueue_script & wp_localize_script must be same while enqueuing
 *
 * @return void
 */
function example_ajax_enqueue() {

	// Enqueue javascript on the frontend.
	wp_enqueue_script(
		'example-ajax-script', // Handle Name of the script. Should be unique .
		plugins_url( '../admin/sample-ajax-example.js', __FILE__ ), // url of file where Ajax request in requesting.
		array( 'jquery' ), // An array of registered script handles this script depends on.
		true, // Var .
		true // Show in footer in true.
	);

	// The wp_localize_script allows us to output the ajax_url path for our script to use.
	wp_localize_script(
		'example-ajax-script', // Handle Name of the script. Should be unique .
		'example_ajax_obj', // Object name which will send while requesting AJAX request .
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),  // URL of the admin-ajax.php for ajax request .
			'nonce'   => wp_create_nonce( 'ajax-nonce' ), // Create nonce for security check .
		)
	);

}
add_action( 'wp_enqueue_scripts', 'example_ajax_enqueue' );
