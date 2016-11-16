jQuery.noConflict();
jQuery(document).ready(function($){

	var mediaUploader;

	$('#upload-button').on('click', function(e){
		e.preventDefault();
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Upload A Site Logo',
			button: {
				text: 'Choose Logo'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#site-logo-url').val(attachment.url);
			$('#logo-preview').css('background-image', 'url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});

	$('#remove-button').on('click', function(e){
		e.preventDefault();
		var answer = confirm("Are you sure you want to remove the site logo?");
		if (answer == true) {
			$('#site-logo-url').val('');
			$('.aws-options-form').submit();
		}
		return;
	});

});