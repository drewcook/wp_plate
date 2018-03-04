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

	<?php if ( !is_single() ) : ?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php aws_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php if (is_single()) :
			// Thumbnail
			if ( get_the_post_thumbnail() ) :
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
				echo "<img src=".get_the_post_thumbnail_url()." class='img-responsive featured-image alignright' alt='".$alt."' />";
			endif;
			// Content
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aws' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aws' ),
				'after'  => '</div>',
			) );
		else : ?>
		<div class="row">
			<?php if ( get_the_post_thumbnail() ) : ?>
				<div class="col-xs-12 col-md-3">
					<?php
						if ( get_the_post_thumbnail() ) :
							$thumbnail_id = get_post_thumbnail_id( $post->ID );
							$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
							echo "<img src=".get_the_post_thumbnail_url()." class='img-responsive featured-image alignright' alt='".$alt."' />";
						endif;
					?>
				</div>
			<?php endif; ?>
			<div class="col-xs-12 <?php if ( get_the_post_thumbnail() ) : echo 'col-md-9'; endif; ?>">
				<?php
					the_excerpt( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aws' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
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
		<div class="entry-footer-meta">
			<?php aws_entry_footer(); ?>
		</div>
		<?php if (is_single()) : the_post_navigation(array(
			'prev_text' => 'Previous Post',
			'next_text' => 'Next Post'
		)); ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
