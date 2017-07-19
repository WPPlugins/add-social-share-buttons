(function ($) {
   	
	$(window).load(function () {
 
		jQuery( "#assb_dialog" ).dialog({
			
			modal: true, title: 'Subscribe Now', zIndex: 10000, autoOpen: true,
			width: '500', resizable: false,
			position: {my: "center", at:"center", of: window },
			dialogClass: 'dialogButtons',
			buttons: {
				Yes: function () {
					// $(obj).removeAttr('onclick');
					// $(obj).parents('.Parent').remove();
					var email_id = jQuery('#txt_user_sub_assb').val();

					var data = {
					'action': 'add_plugin_user_assb',
					'email_id': email_id
					};

					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					jQuery.post(ajaxurl, data, function(response) {
						jQuery('#assb_dialog').html('<h2>You have been successfully subscribed');
						jQuery(".ui-dialog-buttonpane").remove();
					});

					
				},
				No: function () {
						var email_id = jQuery('#txt_user_sub_assb').val();

					var data = {
					'action': 'hide_subscribe_assb',
					'email_id': email_id
					};

					// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
					jQuery.post(ajaxurl, data, function(response) {
													
					});
					
					jQuery(this).dialog("close");
					
				}
			},
			close: function (event, ui) {
				jQuery(this).remove();
			}
		});
		 
		
		jQuery("div.dialogButtons .ui-dialog-buttonset button").removeClass('ui-state-default');
		jQuery("div.dialogButtons .ui-dialog-buttonset button").addClass("button-primary woocommerce-save-button");
		jQuery("div.dialogButtons .ui-dialog-buttonpane .ui-button").css("width","80px");
		
		
		
		 $("#sortable").sortable({ 
		     opacity: 0.6, 
		     cursor: 'move'  
		 });
 
			
		var configpost = {
			'.chosen-select-post'           : {},
			'.chosen-select-deselect'  : {allow_single_deselect:true},
			'.chosen-select-no-single' : {disable_search_threshold:10},
			'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			'.chosen-select-width'     : {width:"95%"}
		}
		for (var selectorpost in configpost) {
			$(selectorpost).chosen(configpost[selectorpost]);
		}
		
		jQuery("#chosen_button_place").chosen();
		
		jQuery("#share_icon_size").chosen();

		jQuery("#whatsapp_share_plugin_form_id").validate({
    
	        // Specify the validation rules
	        rules: {
	            facebook_api_key: "required",
	        },
	        
	        // Specify the validation error messages
	        messages: {
	            facebook_api_key: "Please enter your Facebook API key",
	        },
	        
	        submitHandler: function(form) {
	            form.submit();
	        }
	    });
		
	    
	    var onloadButtonSize = $('.check_button_size').attr('value');
	    
	    if( onloadButtonSize == 'small' ) {
			var get_small_icon_html = $('.button_small_icon_html').html();
			$('.display_added_services').html('');
			$('.display_added_services').html(get_small_icon_html);
		} else if ( onloadButtonSize == 'medium' ) {
			var get_medium_icon_html = $('.button_medium_icon_html').html();
			$('.display_added_services').html('');
			$('.display_added_services').html(get_medium_icon_html);
		} else if( onloadButtonSize == 'large' ) {
			var get_large_icon_html = $('.button_large_icon_html').html();
			$('.display_added_services').html('');
			$('.display_added_services').html(get_large_icon_html);
		}
	    
			
		$('body').on('change','.check_button_size',function(){
			var checkedValue = $(this).attr('value');
			if( checkedValue == 'small' ) {
				var get_small_icon_html = $('.button_small_icon_html').html();
				$('.display_added_services').html('');
				$('.display_added_services').html(get_small_icon_html);
			} else if ( checkedValue == 'medium' ) {
				var get_medium_icon_html = $('.button_medium_icon_html').html();
				$('.display_added_services').html('');
				$('.display_added_services').html(get_medium_icon_html);
			} else if( checkedValue == 'large' ) {
				var get_large_icon_html = $('.button_large_icon_html').html();
				$('.display_added_services').html('');
				$('.display_added_services').html(get_large_icon_html);
			}
		});
		
		$('body').on('click','#add_share_service',function(){
			$( "#display_all_services" ).dialog({
				 width: 700,
           		 height: 300,
			});
		});
		$('body').on('click','#reorder_share_service',function(){
			$( "#reorder_all_services" ).dialog({
				 width: 700,
           		 height: 300,
			});
		});
	});
	
})(jQuery);