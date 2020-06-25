<?php
/**
 * ===================================
 *      CUSTOM-POST-NEWS
 * ===================================
 *
 * @package helloWorld
 */

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
