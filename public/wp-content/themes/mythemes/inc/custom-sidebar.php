<?php
/**
 * This is used to restrict users pages according to theire Roles .
 *
 * @return void
 * @package Mythemes
 */

/**
 * Register our sidebars and widgetized areas.
 */
function sidebar_widgets_init() {
	/* Register the 'RightSidebar' sidebar. */
	register_sidebar(
		array(
			'name'          => ( 'Right sidebar' ),
			'id'            => ( 'right_sidebar' ),
			'before_widget' => ( '<div class="card my-4">' ),
			'before_title'  => ( '<h5 class="card-header">' ),
			'after_title'   => ( '</h5><div class="card-body">' ),
			'after_widget'  => ( '</div></div>' ),
		)
	);
	/* Register the 'Leftsidebar' sidebar. */
		register_sidebar(
			array(
				'id'          => ( 'left_sidebar' ),
				'name'        => __( 'Left Sidebar' ),
				'description' => __( 'This is left sidebar it will all the sidebar.php element in left' ),
			)
		);
		/* Register Footer Widgets. */
		register_sidebar(
			array(
				'name'          => ( 'Footer' ),
				'id'            => ( 'custom_footer' ),
				'before_widget' => ( '<div class="container">' ),
				'after_widget'  => ( '</div>' ),
			)
		);
		/* Register New-Widgets. */
		register_sidebar(
			array(
				'name'          => ( 'New_sidebar' ),
				'id'            => ( 'new-sidebar' ),
				'before_widget' => ( '<div class="card my-4" > ' ),
				'before_title'  => ( '<h5 class = "card-header" >' ),
				'after_title'   => ( '</h5><div class="card-body">' ),
				'after_widget'  => ( '</div></div>' ),
			)
		);

}
	add_action( 'widgets_init', 'sidebar_widgets_init' );



