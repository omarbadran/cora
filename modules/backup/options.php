<?php
/**
 * backup options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'backup',
    'title'     =>  __('Backup' , 'cora'),
    'icon'      =>  'archive',
]);


# Import
$this->parent->options->add_field([
    'id'           =>  'export',
    'section'      =>  'backup',
    'title'        =>   esc_html__('Export Data' , 'cora'),
    'type'         =>   'export',
]);

# Import
$this->parent->options->add_field([
    'id'           =>  'import',
    'section'      =>  'backup',
    'title'        =>   esc_html__('Import  Data' , 'cora'),
    'type'         =>   'import',
]);