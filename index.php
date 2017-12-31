<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AWS
 */

get_header(); ?>

	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9">
			<main id="main" role="main">
			<?php if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) : ?>
					<header class="blog-header">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif;
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				the_posts_navigation();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
			</main><!-- #main -->
		</div>
		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();
