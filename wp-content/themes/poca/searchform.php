<?php
/**
 * Template for displaying search forms in Poca
 *
 * @package Poca
 * @subpackage Poca
 * @since Poca 1.0
 */
?>
<!-- <form  role = "search" action="<?php // echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
    <input type="search" name="s" class="form-control search-field" placeholder="Search searchform ...."  value="<?php echo get_search_query(); ?>">
    <button type="submit" class= "seach-submit" ><i class="fa fa-search"></i></button>
</form> -->

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search"  class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'poca' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>