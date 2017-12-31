<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays the front page.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AWS
 */

get_header(); ?>

	<main id="main" role="main">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'front' );
		endwhile; ?>
	</main><!-- #main -->

<?php
get_footer();
