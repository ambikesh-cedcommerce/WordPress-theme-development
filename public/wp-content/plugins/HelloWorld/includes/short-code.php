<?php
/**
 * ====================================
 * Add short code .
 * ====================================
 *
 * @package helloworld
 */

add_action( 'init', 'hw_init' );
/**
 * Undocumented function
 *
 * @return void
 */
function hw_init() {

	add_shortcode( 'test', 'hw_my_short_code' );
	add_shortcode( 'news', 'hw_news_my_short_code' );
}
/**
 * Undocumented function
 *
 * @param string $atts this is parameter comment .
 * @param string $content is the parameter .
 *
 * @return string
 */
function hw_my_short_code( $atts, $content = '' ) {
	$atts = shortcode_atts( array( 'message' => 'hello,world' ), $atts, 'test' );
	return $content;
}
// ============================
// adding short code [news]
// ============================
/**
 * This function fetching data from the database using query
 *
 * @param string $atts this is attribute of the function .
 * @param string $content is the parameter .
 * @return string
 */
function hw_news_my_short_code( $atts, $content = '' ) {
	// Attributes of the short code .
	$atts = shortcode_atts( array( 'posts_per_page' => -1 ), $atts, 'news' );
	// Adding pagination in the post .
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args  = array(
		'post_type'      => 'news', // This define which data we we want to fetch .
		'post_status'    => 'pulish',
		'posts_per_page' => $atts['posts_per_page'], // This will limits all the page by posts.
		'paged'          => $paged,
	);
	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$content .= '<div id = "' . get_the_ID() . '" class="container"><h2><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
			$content .= '<p>' . get_the_content() . '</p></div>';
		}
		if ( $atts['posts_per_page'] > 0 ) {
			$content .= "<nav class = 'next_pre'>";
			$content .= get_next_post_link( '%link &raquo;', 'old Post', $query->max_num_pages );
			$content .= get_previous_post_link( '%link &raquo;', 'new post' );
			$content .= '</nav>';
		}
	} else {
		$content .= '<p>No News Post Found........ </p>';
	}
	return $content;
}
