<?php
/**
 * AWS theme options administration panel.
 *
 * @package AWS
 */

?>

<div class="wrap">
	<h1>AWS General Theme Options</h1>
	<?php settings_errors(); ?>
	<form id="submitForm" method="post" action="options.php" class="aws-options-form">
		<?php
			settings_fields('aws-settings-group');
			do_settings_sections('aws_options' );
			submit_button('Save Changes', 'primary', 'btnSubmit');
		?>
	</form>
</div>