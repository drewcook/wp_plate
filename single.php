<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AWS
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9">
			<main id="main" role="main">
				<?php while ( have_posts() ) : the_post();
					echo "<div class=\"breadcrumbs\">";
					get_breadcrumbs($post);
					echo "</div>";
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; ?>
			</main><!-- #main -->
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
