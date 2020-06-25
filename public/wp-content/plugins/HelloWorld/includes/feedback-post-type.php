<?php
/**
 * =======================================
 * Register Custom Post type .
 * =======================================
 *
 * @package feedback-custom-post-type
 */

/**
 *
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function register_feedback_cutom_post() {
	/**
	 * The $labels array holds the labels for the Custom Taxonomy.
	 * These labels will be used for displaying various information about the
	 * Taxonomy in the Administration area.
	 */
	$labels = array(
		'name'                  => _x( 'feedback', 'Post type general name', 'textdomain' ), // which will apear in the top of the page .
		'singular_name'         => _x( 'feedback', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Feedback', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'feedback', 'Add feedback on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add feedback', 'textdomain' ),
		'add_new_item'          => __( 'Add New  feedback', 'textdomain' ),
		'new_item'              => __( 'New feedback', 'textdomain' ),
		'edit_item'             => __( 'Edit feedback', 'textdomain' ),
		'view_item'             => __( 'View feedback', 'textdomain' ),
		'all_items'             => __( 'All feedback', 'textdomain' ),
		'search_items'          => __( 'Search feedback', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent feedback:', 'textdomain' ),
		'not_found'             => __( 'No feedback found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No feedback found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'feedback Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'feedback archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'feedback list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'feedback list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'feedback' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'          => 'dashicons-heart',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'feedback', $args ); // 'feedback' is Id of cutom post type .
}

add_action( 'init', 'register_feedback_cutom_post' );
