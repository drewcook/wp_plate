<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AWS
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo get_option('favicon'); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo get_option('favicon'); ?>" type="image/x-icon">
<?php wp_head();
	// Load in header code snippets only if theme option is in use
	if ( get_option('snippets_header') ) :
		echo get_option('snippets_header');
	endif;
	// Load in custom styles only if theme option is in use
	if ( get_option('custom_css') ) :
		echo "<style type='text/css' media='all'>" . get_option('custom_css') . "</style>";
	endif;
?>
</head>

<body <?php body_class(); ?>>

	<?php if ( get_option('snippets_body') ) :
		echo get_option('snippets_body');
	endif; ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aws' ); ?></a>

	<header id="masthead" role="banner">
		<div class="container">
			<div class="row">
				<?php if ( get_option('site_logo') ) : ?>
					<div class="col-xs-12 col-md-4 header-logo">
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<img src="<?php echo get_option('site_logo'); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive">
							</a>
						</p>
					</div><!-- .header-mainbar-logo -->
				<?php endif; ?>
				<div class="col-xs-12 col-md-8 header-nav">
					<?php if (get_option('header_info')) : ?><p class="header-info"><?php echo get_option('header_info'); ?></p><?php endif; ?>
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Menu</a>
						</div>
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'container_class' => 'collapse navbar-collapse navbar-ex1',
							'menu_class' => 'nav navbar-nav',
							'fallback_cb' => false,
							'walker' => new wp_bootstrap_navwalker()
						) );
						?>
					</nav>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if (is_front_page()) : ?>
		<div id="front-page">
	<?php elseif (is_404()) : ?>
		<div id="content">
	<?php elseif (is_archive()) : ?>
		<header class="banner-header">
			<?php
				the_archive_title( '<h1 class="banner-title">', '</h1>' );
			?>
		</header><!-- .page-header -->
	<?php elseif (is_search()) : ?>
		<header class="banner-header">
			<h1 class="banner-title"><?php printf( esc_html__( 'Search Results for: %s', 'aws' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->
	<?php else : ?>
		<div id="content">
			<header class="banner-header">
				<?php (is_home() ? single_post_title( '<h1 class="banner-title">', '</h1>' ) : the_title( '<h1 class="banner-title">', '</h1>' )); ?>
				<?php if ( 'post' === get_post_type() && is_single() ) : ?>
					<div class="entry-meta">
						<?php aws_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
	<?php endif; ?>