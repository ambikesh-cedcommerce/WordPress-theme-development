<main id="primary" class="site-main">

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
	<?php
		endif;

		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
			get_template_part('template-parts/content', get_post_type());

		endwhile;

		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><!-- #main -->
<!-- footer -->

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'poca')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'poca'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'poca'), 'poca', '<a href="http://underscores.me/">ambikesh kumar gautam</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<!-- header -->
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'poca'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				else :
				?>
					<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
				endif;
				$poca_description = get_bloginfo('description', 'display');
				if ($poca_description || is_customize_preview()) :
				?>
					<p class="site-description"><?php echo $poca_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'poca'); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<!-- ===================== side bar =================== -->
		<aside id="secondary" class="widget-area">
			<?php dynamic_sidebar('sidebar-1'); ?>
		</aside><!-- #secondary -->

		<!-- comment  -->
		<div id="comments" class="comments-area">
			<h1>comments.php</h1>
			<?php
			// You can start editing here -- including this comment!
			if (have_comments()) :
			?>
				<h2 class="comments-title">
					<?php
					$poca_comment_count = get_comments_number();
					if ('1' === $poca_comment_count) {
						printf(
							/* translators: 1: title. */
							esc_html__('One thought on &ldquo;%1$s&rdquo;', 'poca'),
							'<span>' . wp_kses_post(get_the_title()) . '</span>'
						);
					} else {
						printf(
							/* translators: 1: comment count number, 2: title. */
							esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $poca_comment_count, 'comments title', 'poca')),
							number_format_i18n($poca_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							'<span>' . wp_kses_post(get_the_title()) . '</span>'
						);
					}
					?>
				</h2><!-- .comments-title -->

				<?php the_comments_navigation(); ?>

				<ol class="comment-list">
					<?php
					wp_list_comments(
						array(
							'style'      => 'ol',
							'short_ping' => true,
						)
					);
					?>
				</ol><!-- .comment-list -->

				<?php
				the_comments_navigation();

				// If comments are closed and there are comments, let's leave a little note, shall we?
				if (!comments_open()) :
				?>
					<p class="no-comments"><?php esc_html_e('Comments are closed.', 'poca'); ?></p>
			<?php
				endif;

			endif; // Check for have_comments().

			comment_form();
			?>

		</div><!-- #comments -->

		<!-- ===================== page.php =================== -->
		<main id="primary" class="site-main">
			<h1>page.php</h1>
			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', 'page');

				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		<div class="col-12 col-lg-4">
			<div class="sidebar-area mt-5">
				<!-- Single Widget Area -->
				<div class="single-widget-area search-widget-area mb-80">
					<form action="#" method="post">
						<input type="search" name="search" class="form-control" placeholder="Search ...">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>

				<!-- Single Widget Area -->
				<div class="single-widget-area catagories-widget mb-80">
					<h5 class="widget-title">Categories</h5>

					<!-- catagories list -->
					<ul class="catagories-list">
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entrepreneurship</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Media</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tech</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tutorials</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Business</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Entertainment</a></li>
					</ul>
				</div>

				<!-- Single Widget Area -->
				<div class="single-widget-area news-widget mb-80">
					<h5 class="widget-title">Recent Posts</h5>

					<!-- Single News Area -->
					<div class="single-news-area d-flex">
						<div class="blog-thumbnail">
							<img src="./img/bg-img/11.jpg" alt="">
						</div>
						<div class="blog-content">
							<a href="#" class="post-title">Episode 10: Season Finale</a>
							<span class="post-date">December 9, 2018</span>
						</div>
					</div>

					<!-- Single News Area -->
					<div class="single-news-area d-flex">
						<div class="blog-thumbnail">
							<img src="./img/bg-img/12.jpg" alt="">
						</div>
						<div class="blog-content">
							<a href="#" class="post-title">Episode 6: SoundCloud Example</a>
							<span class="post-date">December 9, 2018</span>
						</div>
					</div>

					<!-- Single News Area -->
					<div class="single-news-area d-flex">
						<div class="blog-thumbnail">
							<img src="./img/bg-img/13.jpg" alt="">
						</div>
						<div class="blog-content">
							<a href="#" class="post-title">Episode 7: Best Mics for Podcasting</a>
							<span class="post-date">December 9, 2018</span>
						</div>
					</div>

					<!-- Single News Area -->
					<div class="single-news-area d-flex">
						<div class="blog-thumbnail">
							<img src="./img/bg-img/14.jpg" alt="">
						</div>
						<div class="blog-content">
							<a href="#" class="post-title">Episode 6 – Defining Your Style</a>
							<span class="post-date">December 9, 2018</span>
						</div>
					</div>

				</div>

				<!-- Single Widget Area -->
				<div class="single-widget-area adds-widget mb-80">
					<a href="#"><img class="w-100" src="./img/bg-img/banner.png" alt=""></a>
				</div>

				<!-- Single Widget Area -->
				<div class="single-widget-area tags-widget mb-80">
					<h5 class="widget-title">Popular Tags</h5>

					<ul class="tags-list">
						<li><a href="#">Creative</a></li>
						<li><a href="#">Unique</a></li>
						<li><a href="#">audio</a></li>
						<li><a href="#">Episodes</a></li>
						<li><a href="#">ideas</a></li>
						<li><a href="#">Podcasts</a></li>
						<li><a href="#">Wordpress Template</a></li>
						<li><a href="#">startup</a></li>
						<li><a href="#">video</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- ***** Blog Area End ***** -->
	<?php
	/**
	 * The template for displaying search results pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
	 *
	 * @package Poca
	 */

	get_header();
	?>

	<main id="primary" class="site-main">

		<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf(esc_html__('Search Results for: %s', 'poca'), '<span>' . get_search_query() . '</span>');
					?>
				</h1>
			</header><!-- .page-header -->

		<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part('template-parts/content', 'search');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	get_footer();
	?>
<!-- // ********************************************************** -->
<!-- <li><a href="<?php // echo get_term_link($term->slug, $taxonomy); ?>"></a></li> -->