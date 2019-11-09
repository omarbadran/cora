<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Scripts Module
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Scripts {
    
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
        
        require_once $this->parent->dir("modules/scripts/options.php");

    }

}