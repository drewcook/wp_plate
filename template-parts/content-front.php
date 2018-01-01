<?php
/**
 * Template part for displaying page content in front-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AWS
 */

?>

<section id="front-banner" role="banner">
	<div id="front-carousel" class="carousel slide" data-ride="carousel">
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider_1.jpg" alt="Slide 1" class="img-responsive">
			</div>

			<div class="item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider_2.jpg" alt="Slide 2" class="img-responsive">
			</div>

			<div class="item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/slider_3.jpg" alt="Slide 3" class="img-responsive">
			</div>
		</div>
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#front-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#front-carousel" data-slide-to="1"></li>
			<li data-target="#front-carousel" data-slide-to="2"></li>
		</ol>
		<!-- Left and right controls -->
		<a class="left carousel-control" href="#front-carousel" role="button" data-slide="prev">
			<span class="fa fa-angle-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#front-carousel" role="button" data-slide="next">
			<span class="fa fa-angle-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section><!-- #front-banner -->

<section id="front-main">
	<div class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
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
	</div>
</section><!-- #front-main -->