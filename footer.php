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

        </div><!-- .container -->
	</div><!-- #content -->

	<footer id="site-footer" role="contentinfo">
        <div class="container-fluid footer-info">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                </div>
            </div>
        </div><!-- .site-info -->
            <div class="container-fluid copybar">
                <div class="container">
                    <p>&copy; <?php echo current_time('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( esc_html__( 'Website by %1$s', 'aws' ), '<a href="http://altheawebservices.com/" rel="designer">Althea Web Services</a>' ); ?>
                </div>
            </div><!-- copybar -->
    </footer><!-- #site-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
