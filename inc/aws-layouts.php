<?php
/**
 * AWS theme options administration panel.
 *
 * @package AWS
 */

?>

<div class="wrap">
	<h1>AWS Layout Options</h1>
	<?php settings_errors(); ?>
	<form id="submitForm" method="post" action="options.php" class="aws-options-form">
		<?php
			settings_fields('aws-layouts-group');
			do_settings_sections('aws_layouts' );
			submit_button('Save Changes', 'primary', 'btnSubmit');
		?>
	</form>
</div>