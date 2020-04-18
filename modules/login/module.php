<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Login Module
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Login {
    
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

        require_once $this->parent->dir("modules/login/options.php");
    }

}