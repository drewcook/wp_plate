<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AWS
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9">
			<main id="main" role="main">
				<?php if ( have_posts() ) :
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
</div>

<?php
get_footer();
