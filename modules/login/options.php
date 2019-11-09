<?php
/**
 * login options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'login',
    'title'     =>  __('Login Page' , 'cora'),
    'icon'      =>  'vpn_key',
]);

# Placeholder image
$this->parent->options->add_field([
    'section'   =>  'login',
    'type'      =>  'html',
    'content'   =>  '<div class="cora-section-placeholder" style="background-image:url('. $this->parent->url("modules/login") .'/screenshot.png);"></div>'
]);

# Upgrade message
$this->parent->options->add_field([
    'section'   =>  'login',
    'type'      =>  'html',
    'content'   => $this->parent->promotion_block(
        __( 'Login Page', 'cora'),
        __( 'Differentiate your website with a unique modern login & sign-up page. Upgrade to customize & rebrand the login page completely within seconds.', 'cora' )
    )
]);
