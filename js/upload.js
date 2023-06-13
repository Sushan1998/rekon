jQuery(document).ready(function($){
	"use strict";
	var rekon_upload;
	var rekon_selector;

	function rekon_add_file(event, selector) {

		var upload = $(".uploaded-file"), frame;
		var $el = $(this);
		rekon_selector = selector;

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( rekon_upload ) {
			rekon_upload.open();
			return;
		} else {
			// Create the media frame.
			rekon_upload = wp.media.frames.rekon_upload =  wp.media({
				// Set the title of the modal.
				title: "Select Image",

				// Customize the submit button.
				button: {
					// Set the text of the button.
					text: "Selected",
					// Tell the button not to close the modal, since we're
					// going to refresh the page when the image is selected.
					close: false
				}
			});

			// When an image is selected, run a callback.
			rekon_upload.on( 'select', function() {
				// Grab the selected attachment.
				var attachment = rekon_upload.state().get('selection').first();

				rekon_upload.close();
				rekon_selector.find('.upload_image').val(attachment.attributes.url).change();
				if ( attachment.attributes.type == 'image' ) {
					rekon_selector.find('.rekon_screenshot').empty().hide().prepend('<img src="' + attachment.attributes.url + '">').slideDown('fast');
				}
			});

		}
		// Finally, open the modal.
		rekon_upload.open();
	}

	function rekon_remove_file(selector) {
		selector.find('.rekon_screenshot').slideUp('fast').next().val('').trigger('change');
	}
	
	$('body').on('click', '.rekon_upload_image_action .remove-image', function(event) {
		rekon_remove_file( $(this).parent().parent() );
	});

	$('body').on('click', '.rekon_upload_image_action .add-image', function(event) {
		rekon_add_file(event, $(this).parent().parent());
	});

});