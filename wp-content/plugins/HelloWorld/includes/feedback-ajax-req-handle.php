<?php
/**
 * Handling response of ajax request and inserting in the database with post type [ feedback custom post type ] .
 *
 * @package Helloworld
 */

/**
 * =======================================================
 * Handling ajax request which is sending by feedback ajax .
 * =======================================================
 */

/**
 * This fucntion enqueue JavaScrpitt folder in this mai template .
 *
 * @return void
 */
function feedback_ajax_action() {
	// Check whether nonce is empty or not .
	if ( ! empty( $_REQUEST['nonce'] ) ) {

		$nonce = filter_var( wp_unslash( $_REQUEST['nonce'] ) );

		if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {

			echo 'Nonce value cannot be verified by This request.';
		}
	}
	// Checking name is set or not by ajax  request .
	if ( isset( $_REQUEST['name'] ) ) {
		$name = sanitize_html_class( wp_unslash( $_REQUEST['name'] ) );
	}
	// Checking email is set or not by ajax  request .
	if ( isset( $_REQUEST['email'] ) ) {
			$email = sanitize_html_class( wp_unslash( $_REQUEST['email'] ) );
	}
	// Checking feedback  message is set or not by ajax request.
	if ( isset( $_REQUEST['feedback'] ) ) {
			$feedback = sanitize_html_class( wp_unslash( $_REQUEST['feedback'] ) );
	}
	// Add feedback in custom post type [feedback].
		$my_post = array(
			'post_type'    => 'feedback',
			'post_title'   => $name,
			'post_content' => $feedback . $email,
			'post_status'  => 'publish',
			'post_author'  => 1,
		);
		// Insert the post into the database.
		wp_insert_post( $my_post );
		// Out put message .
		echo ' FeedBack added ';
		// Always die in functions echoing ajax content.
		die();
}
// This wp_ajax is only for the logged in users .
add_action( 'wp_ajax_feedback_ajax_action', 'feedback_ajax_action' );

// If you wanted to also use the function for non-logged in users (in a theme for example) .
add_action( 'wp_ajax_nopriv_feedback_ajax_action', 'feedback_ajax_action' );
