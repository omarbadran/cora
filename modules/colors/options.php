<?php
/**
 * Theme options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->options->add_section([
    'id'        =>  'theme',
    'title'     =>  esc_html__('Theme' , 'cora'),
    'icon'      =>  'invert_colors',
]);
