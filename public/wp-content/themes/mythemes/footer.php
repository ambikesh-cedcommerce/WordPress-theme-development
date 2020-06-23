<!-- Footer -->
	<footer class="py-5 bg-dark">
		<?php
			/**
			 * Custom footer
			 *
			 * @package WordPress
			 */

			dynamic_sidebar( 'left_sidebar' );
			dynamic_sidebar( 'custom_footer' ); ?>
<?php
/**
 * Fetching Value from Database from 'wporg_options' colum .
 */
$get_option_value = get_option( 'wporg_options' ); // Fetching value from the Database using get_option() function .
$facebook         = $get_option_value ['facebook_link']; // Id  of the table 'wporg_field_facebook' where facebook link in stored.
$twitter          = $get_option_value ['twitter_link']; // 'twitter' is id of the twitter link .
?>
<a href="<?php echo esc_html_e( $facebook ); ?>">Facebook</a>
<a href="<?php echo esc_html_e( $twitter ); ?>">Twitter</a>
		<!-- /.container -->
	</footer>
	<!-- Bootstrap core JavaScript -->	
	<?php
	/**
	 * Footer
	 * Theme Name : Mytheme
	 *
	 * @package Footer
	 */
	?>
	<?php	wp_footer(); ?>
	<?php	wp_footer(); ?>	

	</body>
</html>
