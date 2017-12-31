<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AWS
 */
?>

<div class="col-xs-12 col-sm-4 col-md-3">
	<aside id="secondary" class="widget-area" role="complementary">
		<?php if ( is_active_sidebar( 'sidebar-primary' ) ) : dynamic_sidebar( 'sidebar-primary' ); else : ?>
			<p><i><strong>This is the Primary Sidebar widget area.</strong> If you are seeing this message, then you have not added any widgets to the area.</i></p>
			<p><i>If you would like to see widgets instead, just navigate to <strong>Appearance > Widgets</strong> in the dashboard, and add in any widget you would like into the 'Primary Sidebar' widget area.</i></p>
		<?php endif; ?>
	</aside><!-- #secondary -->
</div>
