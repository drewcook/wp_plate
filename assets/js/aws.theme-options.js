jQuery.noConflict();
jQuery(document).ready(function($){

	var mediaUploader;

	// Logo
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

	// Favicon
	$('#favicon-upload-button').on('click', function(e){
		e.preventDefault();
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Upload A Favicon',
			button: {
				text: 'Choose Favicon'
			},
			multiple: false
		});
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#favicon-url').val(attachment.url);
			$('#favicon-preview').css('background-image', 'url(' + attachment.url + ')');
		});
		mediaUploader.open();
	});
	$('#favicon-remove-button').on('click', function(e){
		e.preventDefault();
		var answer = confirm("Are you sure you want to remove the site logo?");
		if (answer == true) {
			$('#favicon-url').val('');
			$('.aws-options-form').submit();
		}
		return;
	});

	// Prevent tab in <pre> blocks
	$(".pre-block textarea").keydown(function(e) {
		if(e.keyCode === 9) { // tab was pressed
			console.log("tab pressed");
			// get caret position/selection
			var start = this.selectionStart;
			var end = this.selectionEnd;

			var $this = $(this);
			var value = $this.val();

			// set textarea value to: text before caret + tab + text after caret
			$this.val(value.substring(0, start)
				+ "\t"
				+ value.substring(end));

			// put caret at right position again (add one for the tab)
			this.selectionStart = this.selectionEnd = start + 1;

			// prevent the focus lose
			e.preventDefault();
		}
	});

});