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

    <!--?php include('json-ld.php'); ?-->
    <script type="application/ld+json">// <![CDATA[
        <?php echo json_encode($payload); ?>
    // ]]></script>

</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aws' ); ?></a>
	<header id="masthead" role="banner">
<?php if ( get_option('header_topbar') or get_option('primary_email') or get_option('social_facebook') or get_option('social_twitter') or get_option('social_google') or get_option('social_instagram') or get_option('social_linkedin') or get_option('social_pinterest') or get_option('social_youtube') or get_option('social_yelp') or get_option('social_rss') ) : ?>

		<div class="container-fluid header-topbar">
			<div class="container">
				<div class="row">
				<?php if ( get_option('header_topbar') ) : ?>
					<div class="col-xs-12 col-sm-8">
						<?php if (get_option('header_topbar')) : ?>
							<p><?php echo get_option('header_topbar'); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( get_option('primary_email') or get_option('social_facebook') or get_option('social_twitter') or get_option('social_google') or get_option('social_instagram') or get_option('social_linkedin') or get_option('social_pinterest') or get_option('social_youtube') or get_option('social_yelp') or get_option('social_rss') ) : ?>
					<div class="col-xs-12 col-sm-4 pull-right">
						<ul class="social-list">
							<?php if (get_option('primary_email')) : ?>
								<li><a href="mailto:<?php echo get_option('primary_email'); ?>"><i class="fa fa-envelope"></i></a></li>
							<?php endif; if (get_option('social_facebook')) : ?>
								<li><a href="https://<?php echo get_option('social_facebook'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php endif; if (get_option('social_twitter')) : ?>
								<li><a href="https://<?php echo get_option('social_twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php endif; if (get_option('social_google')) : ?>
								<li><a href="https://<?php echo get_option('social_google'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<?php endif; if (get_option('social_instagram')) : ?>
								<li><a href="https://<?php echo get_option('social_instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php endif; if (get_option('social_linkedin')) : ?>
								<li><a href="https://<?php echo get_option('social_linkedin'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?php endif; if (get_option('social_pinterest')) : ?>
								<li><a href="https://<?php echo get_option('social_pinterest'); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
							<?php endif; if (get_option('social_youtube')) : ?>
								<li><a href="https://<?php echo get_option('social_youtube'); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
							<?php endif; if (get_option('social_yelp')) : ?>
								<li><a href="https://<?php echo get_option('social_yelp'); ?>" target="_blank"><i class="fa fa-yelp"></i></a></li>
							<?php endif; if (get_option('social_rss')) : ?>
								<li><a href="https://<?php echo get_option('social_rss'); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
							<?php endif; ?>
						</ul>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div><!-- .header-topbar -->

<?php endif; if ( get_option('site_logo') or get_option('address_1') or get_option('address_2') or get_option('address_city') or get_option('address_state') or get_option('address_zip') or get_option('primary_phone') ) : ?>

		<div class="container-fluid header-mainbar">
			<div class="container">
				<div class="row">
				<?php if ( get_option('site_logo') ) : ?>
					<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4 header-mainbar-logo">
                        <p class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img src="<?php echo get_option('site_logo'); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive">
                            </a>
                        </p>
					</div><!-- .header-mainbar-logo -->
				<?php endif; ?>
				<?php if ( get_option('address_1') or get_option('address_2') or get_option('address_city') or get_option('address_state') or get_option('address_zip') or get_option('primary_phone') ) : ?>
					<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8 header-mainbar-info">
						<p>
							<?php if ( get_option('address_1') ) : ?>
								<?php echo get_option('address_1') . ', '; ?>
							<?php endif; ?>
							<?php if ( get_option('address_2') ) : ?>
								<?php echo get_option('address_2') . '<br>'; ?>
							<?php endif; ?>
							<?php if ( get_option('address_city') ) : ?>
								<?php echo get_option('address_city') . ' '; ?>
							<?php endif; ?>
							<?php if ( get_option('address_state') ) : ?>
								<?php echo get_option('address_state') . ' '; ?>
							<?php endif; ?>
							<?php if ( get_option('address_zip') ) : ?>
								<?php echo get_option('address_zip'); ?>
							<?php endif; ?>
						</p>
						<?php if ( get_option('primary_phone') ) : ?>
								<p class="header-phone"><i class="fa fa-phone fa-2x"></i> <?php echo get_option('primary_phone'); ?></p>
						<?php endif ?>
					</div><!-- .header-mainbar-info -->
				<?php endif; ?>
				</div>
			</div>
		</div><!-- .header-mainbar -->

<?php endif; ?>

		<div class="container-fluid header-navbar">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-10 col-md-11">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand hidden-sm hidden-md hidden-lg" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
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
					<div class="hidden-xs col-sm-2 col-md-1">
						<a href="#" class="open-search"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div><!-- .container -->
			<div class="hidden-xs search-form-wrapper<?php if (is_user_logged_in()) { echo " logged-in"; } ?>" id="search-form-wrapper">
				<div class="container">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div><!-- .header-navbar -->

	</header><!-- #masthead -->


	<?php if (is_front_page()) : ?>
		<div id="front-page">
	<?php elseif (is_page() || is_single()) : ?>
		<div id="content">
	<?php else: ?>
		<div id="content">
			<div class="container">
	<?php endif; ?>