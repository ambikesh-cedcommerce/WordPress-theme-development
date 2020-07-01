<?php
/**
 *
 * This is meta data adding file . it will put all the related in the head>meta.
 *
 * @package helloworld
 */

add_action(
	'admin_init',
	function () {
		add_meta_box( '_mycustommetabox', 'My Custom Meta Box', 'hw_custom_metabox_fun', array( 'post', 'page' ) );
	}
);
/**
 * Callback function of the custom metabox which will resposible to handle all the metabox detail
 *
 * @param object $post post is detail of the post [here also if we want to put pages we can !].
 * @return void
 */
function hw_custom_metabox_fun( $post ) {
	$_mymetabox   = get_post_meta( $post->ID, '_mymetabox', true ) ? get_post_meta( $post->ID, '_mymetabox', true ) : '';
	$_myselectbox = get_post_meta( $post->ID, '_myselectbox', true ) ? get_post_meta( $post->ID, '_myselectbox', true ) : '';
	?>
	<input type="text" id="" name= "_mymetabox" class="" value="<?php echo $_mymetabox; ?>" />
	<br>
	<select name="_selectbox" id="">
		<option value='1'<?php echo $_myselectbox == 1 ? 'selected' : ''; ?>>One</option>
		<option value='2'<?php echo $_myselectbox == 2 ? 'selected' : ''; ?>>Two</option>
		<option value='3'<?php echo $_myselectbox == 3 ? 'selected' : ''; ?>>Three</option>
	</select>
	<?php
}

add_action( 'save_post', 'hw_save_post' );
/**
 * Undocumented function
 *
 * @return void
 */
function hw_save_post( $post_id ) {
	if ( array_key_exists( '_mymetabox', $_POST ) ) {
		update_post_meta( $post_id, '_mymetabox', $_POST['_mymetabox'] );
		update_post_meta( $post_id, '_myselectbox', $_POST['_myselectbox'] );

	}
}
