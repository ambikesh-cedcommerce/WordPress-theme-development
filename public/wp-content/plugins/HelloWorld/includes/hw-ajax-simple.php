<?php
/**
 * This file is enqueueing ajax file in this folder .
 *
 * @package Helloworld
 */

/**
 * ===================================
 * Handlign hw-ajax.js REQUEST OF AJAX .
 * ===================================
 */

/**
 * This fucntion enqueue JavaScrpitt folder in this mai template .
 *
 * @return void
 */
function helloworld_ajax_action() {

		$nonce = ! empty( $_REQUEST['nonce'] );
	if ( ! wp_verify_nonce( $nonce, 'hw-handle-ajax-script' ) ) {

			echo 'Nonce value cannot be verified by This request.';
	}
	// The $_REQUEST contains all the data sent via ajax .
	if ( isset( $_REQUEST['fruit'] ) ) {

		$fruit = sanitize_html_class( wp_unslash( $_REQUEST['fruit'] ) );

		// Let's take the data that was sent and do something with it.
		if ( 'Banana' === $fruit ) {
			$fruit = 'Apple';
		}

		// Now we'll return it to the javascript function
		// Anything outputted will be returned in the response.
		echo esc_html( $fruit );

		// If you're debugging, it might be useful to see what was sent in the $_REQUEST .
	}

	// Always die in functions echoing ajax content.
	die();
}
// This wp_ajax is only for the logged in users .
add_action( 'wp_ajax_helloworld_ajax_action', 'helloworld_ajax_action' );

// If you wanted to also use the function for non-logged in users (in a theme for example) .
add_action( 'wp_ajax_nopriv_helloworld_ajax_action', 'helloworld_ajax_action' );

/**
 * ===================================
 * Handlign form-handle.js REQUEST OF AJAX .
 * ===================================
 */

/**
 * This function will take all the requests of the AJAX - and processed all those request .
 * in this function ajax request come and processed and then return it into that ajax template .
 *
 * @return void
 */
function show_output_action() {
	// Checking whether nonce value is empty or not .
	$nonce = ! empty( $_REQUEST['nonce'] );
	// wp_verify_nonce function takes two parameter .
	// 1:- value of nonce .
	// 2:- Ajax handler name (which had declared while enqueueing js or sanitize js ).
	if ( ! wp_verify_nonce( $nonce, 'form-handle-ajax-request' ) ) {
			echo 'This is not verfied  || ';
	}
	// Checking value is comming or not with name 'cloths' using REQUEST method .
	if ( isset( $_REQUEST['cloths'] ) ) {

		$cloths = sanitize_html_class( wp_unslash( $_REQUEST['cloths'] ) );

		if ( 'shirt' === $cloths ) {

			$cloths = 'This is t-shirt';
		}
		echo esc_html( $cloths );
	}
	// Die is must at the end of function because there is prevent other execution without request .
	die();
}
// "wp_ajax" -> prefix of the hook and "show_output_action" is action of ajax requests .
// second parameter is callback function .
// it will work when user logged in .
add_action( 'wp_ajax_show_output_action', 'show_output_action' );

add_action( 'wp_ajax_nopriv_show_output_action', 'show_output_action' );
