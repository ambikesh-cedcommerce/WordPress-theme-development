<?php
/**
 * ====================================
 * Register Custom Post type Podcast
 * ====================================
 *
 * @package poca
 */

/**
 * Register a custom post type called "podcast".
 *
 * @see get_post_type_labels() for label keys.
 */
function poca_podcast_init() {
	/**
	 * The $labels array holds the labels for the Custom Taxonomy.
	 * These labels will be used for displaying various information about the
	 * Taxonomy in the Administration area.
	 */
	$labels = array(
		'name'                  => _x( 'Global Podcast', 'Post type general name', 'textdomain' ), // which will apear in the top of the page .
		'singular_name'         => _x( 'Podcast', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Podcast', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Podcast', 'Add Podcast on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add Podcast', 'textdomain' ),
		'add_new_item'          => __( 'Add New Global Podcast', 'textdomain' ),
		'new_item'              => __( 'New podcast', 'textdomain' ),
		'edit_item'             => __( 'Edit podcast', 'textdomain' ),
		'view_item'             => __( 'View podcast', 'textdomain' ),
		'all_items'             => __( 'All podcast', 'textdomain' ),
		'search_items'          => __( 'Search podcast', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent podcast:', 'textdomain' ),
		'not_found'             => __( 'No Podcast found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Podcast found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Podcast Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Podcast archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Podcast list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Podcast list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'podcast' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'menu_icon'          => 'dashicons-playlist-audio',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'podcast', $args ); // 'podcast' is Id of cutom post type .
}

add_action( 'init', 'poca_podcast_init' );

// ========================================= Register Custom texonomy With Name [Podcast category and tags ] ============================================================
/**
 * This function register_taxonomy in the cutom post .
 *
 * @return void
 */
function poca_register_taxonomy_category_and_tags() {
	$labels = array(
		'name'              => _x( 'Podcast Category ', 'taxonomy general name' ),
		'singular_name'     => _x( 'Podcast Category ', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Podcast Category' ),
		'all_items'         => __( 'All Podcast Category' ),
		'parent_item'       => __( 'Parent Podcast Category' ),
		'parent_item_colon' => __( 'Parent Podcast Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add Podcast Category' ),
		'new_item_name'     => __( 'New Podcast Category ' ),
		'menu_name'         => __( 'Podcast Category' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories).
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' => 'podcast-category',
		),
	);
	// 1. First Parameter of register_taxonomy is "slug" of the taxonomy which will show in the browser URL.
	// 2. Second @param is custom post name where it will show in the sub-menu of the custom posts.
	// 3. Third is Arguments.
	register_taxonomy( 'category', array( 'podcast' ), $args );

	$labels_tag = array(
		'name'              => _x( 'Podcast tag ', 'taxonomy general name' ),
		'singular_name'     => _x( 'Podcast tag ', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Podcast tag' ),
		'all_items'         => __( 'All Podcast tag' ),
		'parent_item'       => __( 'Parent Podcast tag' ),
		'parent_item_colon' => __( 'Parent Podcast tag:' ),
		'edit_item'         => __( 'Edit tag' ),
		'update_item'       => __( 'Update tag' ),
		'add_new_item'      => __( 'Add Podcast tag' ),
		'new_item_name'     => __( 'New Podcast tag ' ),
		'menu_name'         => __( 'Podcast tag' ),
	);
	$args_tag   = array(
		'hierarchical'      => false, // make it hierarchical (like categories).
		'labels'            => $labels_tag,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'slug' => 'podcast-tag',
		),
	);
	register_taxonomy( 'tag', array( 'podcast' ), $args_tag );
}
add_action( 'init', 'poca_register_taxonomy_category_and_tags' );
