<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Blog Home - Start Bootstrap Template</title>
	<?php
		/**
		 * Mythemes.
		 *
		 * @package Worpressthemedevelopment
		 */

	?>
	<?php wp_head(); ?>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">
				<?php bloginfo( ' title' ); ?>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'container_class' => 'nav-item ',
						)
					);
					?>
				</div>
		</div>
	</nav>
