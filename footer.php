<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AWS
 */

?>

<?php if (is_front_page() || is_page() || is_single()) : ?>
        </div><!-- #content / #front-page -->
<?php else : ?>
        </div><!-- .container -->
	</div><!-- #content / #front-page -->
<?php endif; ?>

<div class="clearfix"></div>

<footer id="site-footer" role="contentinfo">

<?php if ( is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4') ) : ?>
    <div class="container-fluid footer-info">
        <div class="container">
            <div class="row">
                <?php if ( is_active_sidebar('footer-1') ) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar('footer-2') ) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar('footer-3') ) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar('footer-4') ) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                <?php endif; ?>
            </div>
	        <?php if ( get_option('primary_email') or get_option('social_facebook') or get_option('social_twitter') or get_option('social_google') or get_option('social_instagram') or get_option('social_linkedin') or get_option('social_pinterest') or get_option('social_youtube') or get_option('social_yelp') or get_option('social_rss') ) : ?>
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
	        <?php endif; ?>
        </div>
    </div><!-- .footer-info -->
<?php endif; ?>

    <div class="container-fluid copybar">
        <div class="container">
            <p>
	            &copy; <?php echo current_time('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><span class="sep"> | </span><?php printf( esc_html__( 'Website by %1$s', 'aws' ), "<a href='".esc_url('http://altheawebservices.com/')."' rel='designer'>".__( 'Althea Web Services', 'aws' )."</a>" ); ?>
            </p>
        </div>
    </div><!-- copybar -->

</footer><!-- #site-footer -->

<?php
    wp_footer();
    // Load in footer code snippets only if theme option is in use
    if ( get_option('snippets_footer') ) :
        echo get_option('snippets_footer');
    endif;
    // Load in conversion tracking only if theme option is in use and only on the specified page
    if ( get_option('conversion_page') && get_option('conversion_code') ) :
        if ( is_page(get_option('conversion_page')) ) :
            echo get_option('conversion_code');
        endif;
    endif;
?>

</body>
</html>
