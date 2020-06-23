<?php
/**
 * This file is enqueueing ajax file in this folder .
 *
 * @package Helloworld
 */

/**
 * This fucntion enqueue JavaScrpitt folder in this mai template .
 *
 * @return void
 */
function example_ajax_request() {

		$nonce = $_REQUEST['nonce'];

	if ( ! wp_verify_nonce( $nonce, 'example-ajax-script' ) ) {
			echo 'Nonce value cannot be verified by This request.';
	}
	// The $_REQUEST contains all the data sent via ajax .
	if ( isset( $_REQUEST ) ) {

		$fruit = $_REQUEST['fruit'];

		// Let's take the data that was sent and do something with it.
		if ( 'Banana' === $fruit ) {
			$fruit = 'Apple';
		}

		// Now we'll return it to the javascript function
		// Anything outputted will be returned in the response.
		echo esc_html_e( $fruit );

		// If you're debugging, it might be useful to see what was sent in the $_REQUEST
		// print_r($_REQUEST); .
	}

	// Always die in functions echoing ajax content.
	die();
}
// This wp_ajax is only for the logged in users .
add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );

// If you wanted to also use the function for non-logged in users (in a theme for example) .
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );
