<?php
/**
 * Theme options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'theme',
    'title'     =>  __('Theme' , 'cora'),
    'icon'      =>  'gesture',
]);


# Placeholder image
$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<div class="cora-section-placeholder" style="background-image:url('. $this->parent->url("modules/theme") .'/screenshot.png);"></div>'
]);

# Upgrade message
$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   => $this->parent->promotion_block(
        __('Theme', 'cora'),
        __( 'Customize every part of your admin theme visually with live preview. Change the design to represent your brand or personal taste. You can choose a pre-designed theme or make your own.', 'cora' )
    )
]);
