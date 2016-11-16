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

<?php if (is_front_page()) : ?>
        </div><!-- #content / #front-page -->
<?php else : ?>
        </div><!-- .container -->
	</div><!-- #content / #front-page -->
<?php endif; ?>

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
            </div>
        </div><!-- .site-info -->
<?php endif; ?>
        <div class="container-fluid copybar">
            <div class="container">
                <p>&copy; <?php echo current_time('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            <span class="sep"> | </span>
            <?php printf( esc_html__( 'Website by %1$s', 'aws' ), '<a href="http://altheawebservices.com/" rel="designer">Althea Web Services</a>' ); ?>
            </div>
        </div><!-- copybar -->
    </footer><!-- #site-footer -->

</div><!-- #page -->

<?php
    wp_footer();
    // Load in header code snippets only if theme option is in use
    if ( get_option('snippets_footer') ) :
        echo get_option('snippets_footer');
    endif;
?>

</body>
</html>
