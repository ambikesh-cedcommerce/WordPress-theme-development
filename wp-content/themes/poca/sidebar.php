<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Poca
 */

?>
    
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) :?>
           <?php dynamic_sidebar('sidebar-1'); ?>
      <?php endif ?>
      
    <!-- ***** Blog Area End ***** -->
   