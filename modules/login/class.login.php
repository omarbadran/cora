<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Login Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Login {
    
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
        
        # Define paths
        $this->dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
        $this->url = site_url( str_replace( str_replace( '\\', '/', ABSPATH ), '', $this->dir ) );
        
        add_filter( 'login_body_class', array( $this  , "body_class" ) );
        add_action( 'login_enqueue_scripts', array( $this  , "logo" ) );

        # Load Options
        $this->options = $options;

        require_once dirname(__FILE__) . "/options.php";

    }

    /**
     * Body class.
     *
     * @since       1.0.0
     * @access      public
     * @return      array
     */
    public function body_class ($classes) {
        
        $layout = $this->options->get_value('login', 'layout', 'standard');
        $classes[] = 'cora-' . $layout;
        
        return $classes;
    
    }

    /**
     * Custom Logo.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function logo () {
        $logo = $this->options->get_value('login', 'logo', 'standard');
        ?>
            <style type="text/css"> 
                :root {
                    --login_logo: url(<?php echo $logo ?>);
                } 
            </style>
        <?php
    }
}