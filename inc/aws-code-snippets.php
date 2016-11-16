<?php
/**
 * AWS theme options code snippets sub panel.
 *
 * @package AWS
 */

?>

<div class="wrap">
	<h1>AWS Code Snippets</h1>
	<?php settings_errors(); ?>
	<form id="submitForm" method="post" action="options.php" class="aws-options-form">
		<?php
			settings_fields('aws-snippets-group');
			do_settings_sections('aws_code_snippets' );
			submit_button('Save Changes', 'primary', 'btnSubmit');
		?>
	</form>
</div>