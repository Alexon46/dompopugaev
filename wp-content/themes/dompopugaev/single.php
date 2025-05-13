<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dompopugaev
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?= do_shortcode('[wpseo_breadcrumb]') ?>

		<h1 class="page-title blue-dark">
			<?= get_the_title() ?>
		</h1>

		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());
		endwhile; // End of the loop.
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();
