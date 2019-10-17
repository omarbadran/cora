jQuery(document).ready(function($) {

    // Remove Original logo

    $('body.login h1 a').remove()

    
    // Add new logo

    var logo = getComputedStyle(document.documentElement).getPropertyValue('--login_logo');

    $('body.login h1').append('<img src="' + logo + '"/>')

});