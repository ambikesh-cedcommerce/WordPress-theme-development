<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Poca
 */

get_header();
?>
 <!-- ***** Breadcrumb Area Start ***** -->
 <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70"><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcumb--con">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Blog</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Blog Details Area Start ***** -->
  <section class="blog-details-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="podcast-details-content d-flex mt-5 mb-80">

            <!-- Post Share -->
            <div class="post-share">
              <p>Share</p>
              <div class="social-info">
                <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                <a href="#" class="pinterest"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#" class="thumb-tack"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
              </div>
            </div>
            <?php 
             if ( have_posts() ) {
                while ( have_posts() ) {   
                  the_post();
              ?>
            <!-- Post Details Text -->
            <div class="post-details-text">
              <?php the_post_thumbnail(); ?>

              <div class="post-content">
                <a href="#" class="post-date"><?php the_date(); ?></a>
                <h2>TLS #281: The Lively Show</h2>
                <div class="post-meta">
                  <a href="#" class="post-author">By <?php the_author(); ?></a> |
                  <a href="#" class="post-catagory">Tutorials</a>
                </div>
              </div>

              <p><?php the_content(); ?></p>

              <!-- Blockquote -->
              <blockquote class="poca-blockquote d-flex">
                <div class="icon">
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <div class="text">
                  <h5>That’s not to say you’ll have the exact same thing if you stop by: the restaurant’s menus change constantly, based on seasonal ingredients.</h5>
                  <h6><?php the_author();?></h6>
                </div>
              </blockquote>

              <h2><?php the_content_feed(); ?></h2>
              <p><?php the_content(); ?></p>
          <?php     
                }            
            } 
            ?>
              <!-- Post Catagories -->
              <div class="post-catagories d-flex align-items-center">
                <h6>Categories:</h6>
                <ul class="d-flex flex-wrap align-items-center">
                  <li><a href="#">Tutorials,</a></li>
                  <li><a href="#">Business,</a></li>
                  <li><a href="#">Tech</a></li>
                </ul>
              </div>

              <!-- Pagination -->
              <div class="poca-pager d-flex mb-30">
                <a href="#">Previous Post <span>Episode 3 – Wardrobe For Busy People</span></a>
                <a href="#">Next Post <span>Episode 6 – Defining Your Style</span></a>
              </div>
              <?php comments_template(); ?>
              <!-- Sidebar -->
              <div class="col-12 col-lg-4">
                <div class="sidebar-area mt-5">          
                  <?php get_sidebar(); ?>
              </div> 
              <!--  End Sidebar -->
            </div>
          </section>
        <!-- ***** Newsletter Area Start ***** -->
        <section class="poca-newsletter-area bg-img bg-overlay pt-50 jarallax" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-img/15.jpg);">
          <div class="container">
            <div class="row align-items-center">
              <!-- Newsletter Content -->
              <div class="col-12 col-lg-6">
                <div class="newsletter-content mb-50">
                  <h2>Sign Up To Newsletter</h2>
                  <h6>Subscribe to receive info on our latest news and episodes</h6>
                </div>
              </div>
              <!-- Newsletter Form -->
              <div class="col-12 col-lg-6">
                <div class="newsletter-form mb-50">
                  <form action="#" method="post">
                    <input type="email" name="nl-email" class="form-control" placeholder="Your Email">
                    <button type="submit" class="btn">Subscribe</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- ***** Newsletter Area End ***** -->  
<?php
get_footer();
