jQuery(document).ready(function() {
    var radon_aboutpage = radonLiteWelcomeScreenObject.aboutpage;
    var radon_nr_actions_required = radonLiteWelcomeScreenObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof radon_aboutpage !== 'undefined') && (typeof radon_nr_actions_required !== 'undefined') && (radon_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + radon_aboutpage + '"><span class="radon-actions-count">' + radon_nr_actions_required + '</span></a>');
    }

    /* Upsell in Customizer (Link to Welcome page) */
    if ( !jQuery( ".radon-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section radon-upsells">');
    }
    if (typeof radon_aboutpage !== 'undefined') {
        jQuery('.radon-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="' + radon_aboutpage + '" class="button" target="_blank">{themeinfo}</a>'.replace('{themeinfo}', radonLiteWelcomeScreenCustomizerObject.themeinfo));
    }
    if ( !jQuery( ".radon-upsells" ).length ) {
        jQuery('#customize-theme-controls > ul').prepend('</li>');
    }
});