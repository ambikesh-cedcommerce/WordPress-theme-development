<?php
/**
 * MyClass File Doc Comment
 *
 * @category Mythemes
 * @package  WordPress
 * @author   Ambikeshgautam<ambikeshkumargautam@cedcoss.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */

/**
 * Enqueue Bootstrap and Css function
 *
 * @return void
 */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'blog-home', get_template_directory_uri() . '/css/blog-home.css', array(), '1.1', 'all' );

}
/**
 * Enqueue Javascript function
 *
 * @return void
 */
function themeslug_enqueue_script() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array( 'jquery' ), '1.1', true );
}
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
	add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );



/**
 * Add Thumbnail in the post .
 * Thumbnails are 'search-form', 'comment-form ', 'comment-list ', 'gallery ', 'caption'
 */
	add_theme_support( 'post_thumbnails' );
	add_theme_support( 'post_thumbnails', array( 'search-form', 'comment-form ', 'comment-list ', 'gallery ', 'caption' ) );
	register_sidebar();

/**
 * Add menus in the appearence section
 *
 * @return void
 */
	add_theme_support( 'menues' );

/**
 * This is featured Image.
 * Thumbnail
 *
 * @return void
 */
add_theme_support( 'post-thumbnails' );

/**
 * Register navigation menus uses wp_nav_menu in three Places
 * This will show the Navbar in Head
 *
 * @return void
 */
function register_my_menus() {
	$locations = array(
		'header-menu' => __( 'Header Menu' ),
		'extra-menu'  => __( 'Extra Menu' ),
		'footer-menu' => __( 'Foote Menue' ),
		'item-wrap'   => __( '<ul id="menu">$3$s</u>' ),
	);
	register_nav_menus( $locations );

}
	add_action( 'init', 'register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 */
function arphabet_widgets_init() {

	register_sidebar(
		array(
			'name'          => 'Right sidebar',
			'id'            => 'right_sidebar',
			'before_widget' => '<div class="card my-4">',
			'before_title'  => '<h5 class="card-header">',
			'after_title'   => '</h5><div class="card-body">',
			'after_widget'  => '</div></div>',
		)
	);

}
	add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Register our sidebars and widgetized areas.
 */
function add_cutom_footer() {

	register_sidebar(
		array(
			'name'          => 'Footer',
			'id'            => 'custom_footer',
			'before_widget' => '<div class="container">',
			'after_widget'  => '</div>',
		)
	);

}
	add_action( 'widgets_init', 'add_cutom_footer' );

/**
 * For Custom logo .
 */
add_theme_support( 'custom-logo' );
/**
 * For Custom Background .
 */
add_theme_support( 'custom-background' );
/**
 * For Custom header .
 */
add_theme_support( 'custom-header' );
/**
 * For automatic feed links .
 */
add_theme_support( 'automatic-feed-links' );

/**
* Html5
*/
add_theme_support( 'html5', array( 'gallery' ) );

/**
 * For content width .
 */
add_theme_support( 'content-width' );
/**
 * For title-tag .
 */
add_theme_support( 'title-tag' );
/**
 * Added post_formate with feature, aside gallery.
 *
 * @see add_theme_support for post-formate.
 */
function themename_post_formats_setup() {
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}
	add_action( 'after_setup_theme', 'themename_post_formats_setup' );

/**
 * For editor style .
 */
add_editor_style( 'css/custom-editor-style.css' );
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function custom_book_post() {
	$labels = array(
		'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Book', 'textdomain' ),
		'new_item'              => __( 'New Book', 'textdomain' ),
		'edit_item'             => __( 'Edit Book', 'textdomain' ),
		'view_item'             => __( 'View Book', 'textdomain' ),
		'all_items'             => __( 'All Books', 'textdomain' ),
		'search_items'          => __( 'Search Books', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'custom_book_post' );

/**
 * Fetch current user rol.
 */
function get_user_role() {

	global $current_user;

	$user_roles = $current_user->roles; // Accessing current user rol .

	$user_role = array_shift( $user_roles ); // For pop user_role form array -> object .

	return $user_role;
}

/**
 * ================ Validate =================
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
	}
	// If user is not logged in then this will checking guest user.
	elseif ( ! is_user_logged_in() ) { // Checking for the guest user.

		$redirect = false;// Make false if user is not logged in .
		// if  author_center page or subscriber-center page.
		if ( is_page( 1992 ) || is_page( 1990 ) ) {
			$redirect = true;
		}
		if ( $redirect ) {// if is true then redirect on the homepage .
			wp_safe_redirect( esc_url( home_url() ), 307 );
		}
	} 
	// Else user is looged in and role is author then redirect false.
	elseif ( is_user_logged_in() && ( 'author' === $user ) ) {
				$redirect = false;
	}
}

