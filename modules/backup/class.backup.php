<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Backup Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Backup {
    
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

    }

}