<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AWS
 */

get_header(); ?>

	<div class="row">
		<div class="col-xs-12">
			<main id="main" role="main" class="text-center page-404">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'aws' ); ?></h1>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aws' ); ?></p>
				<?php get_search_form(); ?>
			</main><!-- #main -->
		</div>
	</div>

<?php
get_footer();
