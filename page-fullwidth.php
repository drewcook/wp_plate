<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying full width pages.
 *
 * @package AWS
 */

get_header(); ?>

<div class="container">
	<main id="main" role="main">
		<?php while ( have_posts() ) : the_post();
			echo "<div class=\"breadcrumbs\">";
			get_breadcrumbs($post);
			echo "</div>";
			get_template_part( 'template-parts/content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) : comments_template(); endif;
		endwhile; ?>
	</main><!-- #main -->
</div>

<?php
get_footer();
