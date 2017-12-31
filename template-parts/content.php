<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AWS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aws_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if (is_single()) :
			if (is_single()) {
				// Thumbnail
				if ( get_the_post_thumbnail() ) :
					$thumbnail_id = get_post_thumbnail_id( $post->ID );
					$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
					echo "<img src=".get_the_post_thumbnail_url()." class='img-responsive featured-image alignright' alt='".$alt."' />";
				else :
					echo "<img src='".get_template_directory_uri()."/assets/img/featured-image.png' class='img-responsive featured-image alignright dummy' alt='The Post Thumbnail' />";
				endif;
				// Content
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aws' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			} else {
				// Excerpt
				the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aws' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aws' ),
				'after'  => '</div>',
			) );
		else : ?>
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<?php
					if ( get_the_post_thumbnail() ) :
						$thumbnail_id = get_post_thumbnail_id( $post->ID );
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
						echo "<img src=".get_the_post_thumbnail_url()." class='img-responsive featured-image alignright' alt='".$alt."' />";
					else :
						echo "<img src='".get_template_directory_uri()."/assets/img/featured-image.png' class='img-responsive featured-image alignright dummy' alt='The Post Thumbnail' />";
					endif;
				?>
			</div>
			<div class="col-xs-12 col-md-9">
				<?php
					if (is_single()) {
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aws' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					} else {
						the_excerpt( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aws' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					}

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aws' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div><!-- .row -->
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php aws_entry_footer(); ?>
		<?php if (is_single()) : the_post_navigation(array(
			'prev_text' => 'Previous Post',
			'next_text' => 'Next Post'
		)); ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
