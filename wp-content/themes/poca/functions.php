<?php
/**
 * Poca functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Poca
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'poca_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function poca_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Poca, use a find and replace
		 * to change 'poca' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'poca', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'poca' ),
			)
		);
		// function add_menuclass($ulclass) {
			
		// $classes = preg_replace( '/<ul class="level0">(.*)<\/ul>/iU', '<ul class="dropdown"', $ulclass );
		// // 	// $classes = preg_replace( '/<li <li id="menu-item-2273" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2273" /', '<li', $ulclass );
		// // // 	// $classes = preg_replace( '/<ul /', '<ul class="dropdown"', $ulclass );
		// // // 	// $classes = preg_replace( '/<li /', '<li class="has-down"', $ulclass );

			
		// 	return $classes;
		//  }
		//  add_filter('wp_nav_menu','add_menuclass');
			
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'poca_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'poca_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function poca_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'poca_content_width', 640 );
}
add_action( 'after_setup_theme', 'poca_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function poca_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar_Right', 'poca' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'poca' ),
			'before_widget' => '<div class="single-widget-area search-widget-area mb-80">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	
}
add_action( 'widgets_init', 'poca_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function poca_scripts() {

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
	wp_enqueue_script( 'poca-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '', true );
	wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/js/jarallax.min.js', array(), '', true );
	wp_enqueue_script( 'jarallax-video', get_template_directory_uri() . '/js/jarallax-video.min.js', array(), '', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'poca-bundle', get_template_directory_uri() . '/js/poca.bundle.js', array(), '', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array(), '', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array(), '', true );
	wp_enqueue_script( 'active', get_template_directory_uri() . '/js/default-assets/active.js', array(), '', true );
	wp_enqueue_script( 'audioplayer', get_template_directory_uri() . '/js/default-assets/audioplayer.js', array(), '', true );
	wp_enqueue_script( 'avoid-console-error', get_template_directory_uri() . '/js/default-assets/avoid.console.error.js', array(), '', true );
	wp_enqueue_script( 'classynav', get_template_directory_uri() . '/js/default-assets/classynav.js', array(), '', true );
	wp_enqueue_script( 'jquery-scrollup-min', get_template_directory_uri() . '/js/default-assets/jquery.scrollup.min.js', array(), '', true );
	wp_enqueue_script( 'myjquery', get_template_directory_uri() . '/js/myjquery.js', array(), '', true );


	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '' );
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '' );
	wp_enqueue_style( 'audioplayer', get_template_directory_uri() . '/css/default-assets/audioplayer.css', array(), '' );
	wp_enqueue_style( 'classy-nav', get_template_directory_uri() . '/css/default-assets/classy-nav.css', array(), '' );
	wp_enqueue_style( 'hkgrotesk-fonts', get_template_directory_uri() . '/css/default-assets/hkgrotesk-fonts.css', array(), '' );
	wp_enqueue_style( 'poca-style', get_stylesheet_uri(), array(), '' );
		
	wp_style_add_data( 'poca-style', 'rtl', 'replace' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'poca_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom widgets category.
 */
require get_template_directory() . '/inc/class-categoriey-custom-widgets.php';

/**
 * Custom widgets Popular Tag
 */
require get_template_directory() . '/inc/class-custom-tag-widgets.php';
/**
 * Custom widgets Recent posts
 */
require get_template_directory() . '/inc/class-recent-post.php';

/*******************************************************************
	Comment LIsting Functions wp-list_comment | Callback Function
		[ To arrange all the listing style manually ]
********************************************************************/
function comment_section( $comment, $args, $depth ) { ?>
	<!-- Comments Area -->
	<!-- Single Comment Area -->
	<li class="single_comment_area">
	<!-- Comment Content -->
			<div class="comment-content d-flex">
				<!-- Comment Author -->
				 <div class="comment-author">
					<?php  echo get_avatar( $comment );  ?>
				 </div>
				 <!-- Comment Meta -->
				 <div class="comment-meta">
					 <a href="#" class="post-date"><?php echo get_comment_date(); ?></a>
					 <h5><?php echo get_comment_author_link(); ?></h5>
					 <p><?php comment_text(); ?></p>
					 <a href="#" class="like">Like</a>
					 <?php comment_reply_link(
						array_merge(
							$args,
							array(
							   'reply_text' => __('Reply', 'poca'),
							   'depth'      => $depth,
							   'class'      => 'reply',
							)
						)	
					); ?>
				  </div>
		  </div>
		</li>
	<?php			  
	}

/**
 * This filter will arrange input field according to the theme
 * 			1-> Text Area
 * 			2-> Author Name 
 * 			3-> Email 
 * 			   ||
 * 			   \/
 * 			1-> Author Name
 *			2-> Email
 *          3-> Text area
 */	
	
add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	$cookie__field = $fields['cookies'];
	unset( $fields['cookies'] );
	$fields['cookies'] = $cookie__field;
	return $fields;
}

add_action( 'comment_form_top', function(){
	// Adjust this to your needs:
	echo '<div class="row">'; 
});
add_action( 'comment_form', function(){
	// Adjust this to your needs:
	echo '</div>'; 
});

/**
 * add remove comment-reply-link and reply class in a tag [ In reply button ] .
 */
add_filter('comment_reply_link', 'replace_reply_link_class');


function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='reply", $class);
    return $class;
}
/**
 * Removing inline style from custom tag listing ul li anchor tag
 */
add_filter('wp_generate_tag_cloud', 'myprefix_tag_cloud',10,1);

function myprefix_tag_cloud($tag_string){
  return preg_replace('/style=("|\')(.*?)("|\')/','',$tag_string);
}