jQuery(document).ready(function($) {

    /**
     * Logo
    */

    // Clone
    let logoClone = $('#adminmenu li.cora-branding').clone();

    // Remove original
    $('#adminmenu li.cora-branding').remove();

    // Prepend to menu.
    $('#adminmenu').prepend(logoClone);

});