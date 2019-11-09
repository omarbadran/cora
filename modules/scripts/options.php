<?php
/**
 * Custom Scripts options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'scripts',
    'title'     =>  __('Custom Scripts' , 'cora'),
    'icon'      =>  'power',
]);

# Placeholder Image
$this->parent->options->add_field([
    'section'   =>  'scripts',
    'type'      =>  'html',
    'content'   =>  '<div class="cora-section-placeholder" style="background-image:url('. $this->parent->url("modules/Scripts") .'/screenshot.png);"></div>'
]);

# Upgrade Message
$this->parent->options->add_field([
    'section'   =>  'scripts',
    'type'      =>  'html',
    'content'   => $this->parent->promotion_block(
        __( 'Custom Scripts', 'cora'),
        __( 'Easily Add any custom JS & CSS code with a single click. Load third parties code like facebook pixel and google analytics in an organizable way without the risk of breaking your site or the need to install any additional plugins.', 'cora' )
    )
]);
