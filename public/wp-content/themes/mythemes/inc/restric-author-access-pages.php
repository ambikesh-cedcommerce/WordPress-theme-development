<?php
/**
 * This is used to restrict users pages according to theire Roles .
 *
 * @return void
 * @package Mythemes
 */

/**
 * This is used for the restrict user accoridint to there roles  .
 * Fetch current user rol.
 */
function get_user_role() {

	global $current_user;

	$user_roles = $current_user->roles; // Accessing current user rol .

	$user_role = array_shift( $user_roles ); // For pop user_role form array -> object .

	return $user_role;
}
/**
 * ================ Restrict user(role) Author and Subscriber =================
 */

add_action( 'template_redirect', 'sub_and_auth_res' );

/**
 * Restricting user  author and subscriber .
 */
function sub_and_auth_res() {

		$page_id = 1990;
		$user    = get_user_role(); // Fetching user role .

	// If user logged then don't redirect page .
	// if user is subscriber do not access autherpage .
	if ( is_user_logged_in() && 'subscriber' === $user ) {
			$redirect = false;

		if ( is_page() && ( is_page( $page_id ) ) ) {// If is page then make redirect true.

				// Set redirect to true by default.
				$redirect = true;

				// if this redirect is true then redirect on the homepage.
			if ( $redirect ) {
					wp_safe_redirect( esc_url( home_url() ), 307 );
			}
		}
	} elseif ( ! is_user_logged_in() ) { // Checking for the guest user(if this is not logged in  user ).

		$redirect = false;// Make false if user is not logged in .
		// if  author_center page or subscriber-center page.
		if ( is_page( 1992 ) || is_page( 1990 ) ) {
			$redirect = true;
		}
		if ( $redirect ) {// if is true then redirect on the homepage .
			wp_safe_redirect( esc_url( home_url() ), 307 );
		}
	} elseif ( is_user_logged_in() && ( 'author' === $user ) ) {// Else user is looged in and role is author then redirect false.
				$redirect = false;
	}
}

