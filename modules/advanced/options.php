<?php
/**
 * Advanced options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'advanced',
    'title'     =>  __('Advanced' , 'cora'),
    'icon'      =>  'settings',
]);


# Export
$this->parent->options->add_field([
    'id'           =>  'export',
    'section'      =>  'advanced',
    'title'        =>   __('Export Data' , 'cora'),
    'type'         =>   'export',
]);

# Import
$this->parent->options->add_field([
    'id'           =>  'import',
    'section'      =>  'advanced',
    'title'        =>   __('Import  Data' , 'cora'),
    'type'         =>   'import',
]);