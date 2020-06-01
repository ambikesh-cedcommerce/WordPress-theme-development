<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Mythemes
 * @since Mythemes 1.0
 */

get_header(); ?>
<!-- Page Content -->
<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-8">
			<h1 class="my-4"><?php the_title(); ?>
				<small>Secondary Text</small>
			</h1>
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
		<!-- Blog Post -->
		<div class="card mb-4">
				<?php the_post_thumbnail(); ?>
			<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
				<div class="card-body">
					<h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry">
									<?php the_content(); ?>
								</div>
								<a href="" class="btn btn-primary">Read More &rarr;</a>
							</div>
							<div class="card-footer text-muted">
								Posted on <?php the_date(); ?> by
								<?php the_author(); ?>
							</div>
						</div>
				<?php
			}
		}
					// Previous/next page navigation.
						the_posts_pagination(
							array(
								'prev_text'          => __( 'Previous page', 'mythemes' ),
								'next_text'          => __( 'Next page', 'mythemes' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'mythemes' ) . ' </span>',
							)
						);
						?>
					</div>
			<?php get_sidebar(); ?>
			</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->
<?php get_footer(); ?>
