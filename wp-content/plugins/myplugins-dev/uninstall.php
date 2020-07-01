<?php
/**
 * Trigger this file on Plugin uninstall
 *
 * @package myplugin-dev
 */

if ( ! define( 'WP_UNINSTALL_PLUGIN', true ) ) {
	die;
}

// Clear Database stored data base.
// $books = get_posts( array ( 'post_type' => 'book' ,'numberposts' => -1 ) ); .

// foreach ($books as $book) { .
// wp_delete_post( $book->ID, true ); .
// } .

global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book' " );
$wpdb->query( 'DELETE FORM wp_postmeta WHERE post_id NOT  IN (SELECT id FROM wp_posts)' );
