<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Optimization Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Optimization {
    
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
    public function __construct( $options ) {
        
        # Load Options
        $this->options = $options;

        require_once dirname(__FILE__) . "/options.php";

    }

}