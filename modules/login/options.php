<?php
/**
 * Login options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  '_login',
    'title'     =>  __('Login Page' , 'cora'),
    'icon'      =>  'vpn_key',
]);

# Placeholder image
$this->parent->options->add_field([
<<<<<<< HEAD
    'section'   =>  '_login',
    'type'      =>  'html',
    'content'   =>  '<div class="cora-section-placeholder" style="background-image:url('. $this->parent->url("modules/login") .'/screenshot.png);"></div>'
=======
    'id'            =>  'logo',
    'section'       =>  'login',
    'title'         =>  __('Logo' , 'cora'),
    'type'          =>  'image',
    'default'       =>  $this->parent->url('assets/SVG/logo-dark.svg'),
    'condition'     =>  [
        ['logo_type', '===', 'logo'],
        ['show_logo', '===', true]
    ],
    'description'  =>   __('Logo image url.', 'cora'),
>>>>>>> master
]);

# Upgrade message
$this->parent->options->add_field([
    'section'   =>  '_login',
    'type'      =>  'html',
    'content'   => $this->parent->promotion_block(
        __( 'Login Page', 'cora'),
        __( 'Differentiate your website with a unique modern login & sign-up page. Upgrade to customize & rebrand the login page completely within seconds.', 'cora' )
    )
]);
