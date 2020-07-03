<?php
/**
 * Template for displaying search forms in Poca
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search"  class=" form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'poca' ); ?>" value = "<?php  echo get_search_query(); ?>" name="search" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>