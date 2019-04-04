jQuery(document).ready(function() {

	/* If there are required actions, add an icon with the number of required actions in the About radon page -> Actions required tab */
    var radon_nr_actions_required = radonLiteWelcomeScreenObject.nr_actions_required;

    if ( (typeof radon_nr_actions_required !== 'undefined') && (radon_nr_actions_required != '0') ) {
        jQuery('li.radon-w-red-tab a').append('<span class="radon-actions-count">' + radon_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".radon-dismiss-required-action").click(function(){

        var id= jQuery(this).attr('id');
        console.log(id);
        jQuery.ajax({
            type       : "GET",
            data       : { action: 'radon_dismiss_required_action',dismiss_id : id },
            dataType   : "html",
            url        : radonLiteWelcomeScreenObject.ajaxurl,
            beforeSend : function(data,settings){
				jQuery('.radon-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + radonLiteWelcomeScreenObject.template_directory + '/include/radon-about/img/ajax-loader.gif" /></div>');
            },
            success    : function(data){
				jQuery("#temp_load").remove(); /* Remove loading gif */
                jQuery('#'+ data).parent().remove(); /* Remove required action box */

                var radon_lite_actions_count = jQuery('.radon-actions-count').text(); /* Decrease or remove the counter for required actions */
                if( typeof radon_lite_actions_count !== 'undefined' ) {
                    if( radon_lite_actions_count == '1' ) {
                        jQuery('.radon-actions-count').remove();
                        jQuery('.radon-tab-pane#actions_required').append('<p>' + radonLiteWelcomeScreenObject.no_required_actions_text + '</p>');
                    }
                    else {
                        jQuery('.radon-actions-count').text(parseInt(radon_lite_actions_count) - 1);
                    }
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });

	/* Tabs in welcome page */
	function radon_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".radon-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var radon_actions_anchor = location.hash;

	if( (typeof radon_actions_anchor !== 'undefined') && (radon_actions_anchor != '') ) {
		radon_welcome_page_tabs('a[href="'+ radon_actions_anchor +'"]');
	}

    jQuery(".radon-nav-tabs a").click(function(event) {
        event.preventDefault();
		radon_welcome_page_tabs(this);
    });

	/* Tab Content height matches admin menu height for scrolling purpouses */
	 $tab = jQuery('.radon-tab-content > div');
	 $admin_menu_height = jQuery('#adminmenu').height();
	 if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
	 {
		 $newheight = $admin_menu_height - 180;
		 $tab.css('min-height',$newheight);
	 }

});
