<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AWS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

			if ( get_the_post_thumbnail() ) :
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
				echo "<img src=".get_the_post_thumbnail_url()." class='img-responsive featured-image alignright framed' alt='".$alt."' />";
			else :
				echo "<img src='".get_template_directory_uri()."/assets/img/featured-image.png' class='img-responsive featured-image alignright dummy' alt='The Post Thumbnail' />";
			endif;
			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aws' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'aws' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
