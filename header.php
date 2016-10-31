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
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aws' ); ?></a>

	<header id="masthead" role="banner">

		<div class="container-fluid">
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
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
			</div><!-- .header-navbar -->
		</div>

	</header><!-- #masthead -->

	<div id="content">
		<div class="container">
