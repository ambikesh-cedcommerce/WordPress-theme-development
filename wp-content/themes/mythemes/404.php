<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<h1>404.php</h1>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Not Found', 'Mythemes' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php esc_attr_e( 'This is somewhat embarrassing, isn’t it?', 'Mythemes' ); ?></h2>
					<p><?php esc_attr_e( 'It looks like nothing was found at this location. Maybe try a search?', 'Mythemes' ); ?></p>
					<a href="<?php home_url(); ?>">Go Back Home</a>

				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
