<?php
/**
 * AWS theme options custom CSS sub panel.
 *
 * @package AWS
 */

?>

<div class="wrap">
	<h1>AWS Custom CSS</h1>
	<?php settings_errors(); ?>
	<form id="submitForm" method="post" action="options.php" class="aws-options-form">
		<?php
			settings_fields('aws-css-group');
			do_settings_sections('aws_custom_css' );
			submit_button('Save Changes', 'primary', 'btnSubmit');
		?>
	</form>
</div>