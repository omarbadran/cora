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
    'content'   =>  '<div class="cora-section-placeholder" style="background:url('. $this->parent->url("modules/login") .'/screenshot.png);"></div>'
]);

# Upgrade message
$this->parent->options->add_field([
    'section'   =>  'login',
    'type'      =>  'html',
    'content'   =>  '
        <div class="cora-section-go-premium">
            <h2>'.__('Login Page', 'cora').'</h2>
            <p>' .__('This section allows you to customize every aspect of the admin area. Easily change the design to represent your brand or personal taste. you can choose a pre-designed login or make your own.', 'cora' ).'</p>
            <div class="cora-actions">
                <a href="#" class="button button-primary">'. __('Upgrade', 'cora'). '</a>
                <a href="#" class="button">'. __('Free Trial', 'cora'). '</a>
            </div>
        </div>'
]);

