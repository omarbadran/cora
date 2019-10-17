<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Media Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Media {
    
    /**
     * Options framework class.
     *
     * @since       1.0.0
     * @access      public
     * @var         object
     */
    public $options;

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