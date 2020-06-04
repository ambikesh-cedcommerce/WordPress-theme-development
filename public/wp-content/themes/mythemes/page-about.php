 
<?php 

if ( is_front_page() ) :
    get_header( 'home' );
    elseif ( is_page( 'About' ) ) :
    get_header( 'about' );
    else:
    get_header();
endif;

?>
<h1>This is About.php page for specific page</h1>