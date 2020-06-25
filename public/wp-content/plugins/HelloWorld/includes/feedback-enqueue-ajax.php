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
function helloworld_ajax_enqueue_in_core() {

	// Enqueue javascript for admin .
	wp_enqueue_script(
		'feedback-handle-ajax-script', // Handle Name of the script. Should be unique .
		plugins_url( '../admin/feedback-ajax.js', __FILE__ ), // url of file where Ajax request in requesting.
		array( 'jquery' ), // An array of registered script handles this script depends on.
		true, // Var .
		true // Show in footer in true.
	);

	// The wp_localize_script allows us to output(for fron-end) the ajax_url path for our script to use.
	wp_localize_script(
		'feedback-handle-ajax-script', // Handle Name of the script. Should be unique .
		'feedback_ajax_obj', // Object name which will send while requesting AJAX request .
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),  // URL of the admin-ajax.php for ajax request .
			'nonce'   => wp_create_nonce( 'ajax-nonce' ), // Create nonce for security check .
		)
	);
}
add_action( 'wp_enqueue_scripts', 'helloworld_ajax_enqueue_in_core' );
