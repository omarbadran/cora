<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Toolbar Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Toolbar {

    /**
     * Class constructor.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function __construct( $parent ) {
        
        # Load Options
        $this->parent = $parent;

        require_once dirname(__FILE__) . "/options.php";

        add_action( 'admin_bar_menu', [ $this, 'edit_toolbar'], 999);
        add_action( 'admin_bar_menu', [ $this, 'instant_search'], 99999);

    }

    /**
     * Edit Toolbar Items.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function edit_toolbar( $wp_admin_bar ) {

        $add_items  =   $this->parent->options->get_value('toolbar', 'add_items', false);


        # Remove Items
        foreach ($this->parent->options->fields as $field) {
            
            if ( $field['type'] == 'switch' && $field['section'] == 'toolbar') {
                
                $value = $this->parent->options->get_value('toolbar', $field['id']);
                                
                if ( !filter_var( $value, FILTER_VALIDATE_BOOLEAN ) ) {
                    $wp_admin_bar->remove_node( str_replace('_', '-', $field['id']) );
                }

            }
        }

        # Add Items
        if ( isset($add_items) && ! empty($add_items) ) {

            foreach ($add_items as $item) {

                $item['id'] = plugin_basename( sanitize_title( $item['title'] ) );
                
                if( $item['new_tab'] ) {
                    $item['meta']['target'] = '_blank';
                }

                $wp_admin_bar->add_node($item);
            
            }

        }

    }

    /**
     * Instant Search.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function instant_search ( $wp_admin_bar ) {
        $item['id'] = 'cora-instant-search';
        $placeholder = 'Instant Search';

        $item['title'] = "
            <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='30' height='30' viewBox='0 0 50 50'><path d='M 21 3 C 11.601563 3 4 10.601563 4 20 C 4 29.398438 11.601563 37 21 37 C 24.355469 37 27.460938 36.015625 30.09375 34.34375 L 42.375 46.625 L 46.625 42.375 L 34.5 30.28125 C 36.679688 27.421875 38 23.878906 38 20 C 38 10.601563 30.398438 3 21 3 Z M 21 7 C 28.199219 7 34 12.800781 34 20 C 34 27.199219 28.199219 33 21 33 C 13.800781 33 8 27.199219 8 20 C 8 12.800781 13.800781 7 21 7 Z'></path></svg>
            <input type='text' placeholder='$placeholder'/>
        ";

        $wp_admin_bar->add_node($item);
    }

}