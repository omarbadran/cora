jQuery(document).ready(function($) {


    /**
     * Remove Original logo
    */

    $('body.login h1 a').remove();

    
    /**
     * Set Background image
    */
    
    if (CoraLogin.background_type == 'image') {

        $(":root").get(0).style.setProperty( "--background_image", `url(${CoraLogin.background_image })` );

    }


    /**
     * Add New Logo
    */
    
    if ( CoraLogin.show_logo == 'true' ) {
        
        $('body.login h1').show();
        
        if ( CoraLogin.logo_type == 'image' ) {
        
            $('body.login h1').append('<img src="' + CoraLogin.logo_url + '"/>');
        
        } else {

            $('body.login h1').append(CoraLogin.logo_text);
        
        }
    
    }

    
    /**
     * Title & Description
    */

    if ( CoraLogin.layout == 'modern' ) {

        $('body.login').append(`
            <div class="cora-login-description">
                <div>
                    <h2>${CoraLogin.title}</h2>
                    <p>${CoraLogin.description}</p>
                </div>
            </div>
        `);
        
    }

});