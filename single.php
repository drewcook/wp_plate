<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AWS
 */

get_header(); ?>

<header class="banner-header">
	<?php the_title( '<h1 class="banner-title">', '</h1>' ); ?>
	<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php aws_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php endif; ?>
</header><!-- .entry-header -->

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-9">
			<main id="main" role="main">
				<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) : comments_template(); endif;
				endwhile; ?>
			</main><!-- #main -->
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php
get_footer();
