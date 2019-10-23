<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * General Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_General {
    
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

        add_filter( 'admin_footer_text',  [ $this, 'footer' ], PHP_INT_MAX);            

    }

    /**
     * Footer Content.
     *
     * @since       1.0.0
     * @access      public
     * @return      string
     */
    public function footer( $content ) {
        
        $content = $this->parent->options->get_value('general', 'footer_text');
        
        $footer_info = filter_var( $this->parent->options->get_value('general', 'footer_info'), FILTER_VALIDATE_BOOLEAN );

        # Footer Info

        if ( $footer_info ) {

            $memory_usage = function_exists('memory_get_peak_usage') ? round(memory_get_peak_usage(TRUE) / 1024 / 1024, 2) : 0;
            
            $memory_limit  = (int) ini_get('memory_limit') ;

            $server_ip_address = (!empty($_SERVER[ 'SERVER_ADDR' ]) ? $_SERVER[ 'SERVER_ADDR' ] : "");
            
            # Added for IP Address in IIS
			if ( $server_ip_address == "" ) { 
				$server_ip_address = ( !empty($_SERVER[ 'LOCAL_ADDR' ]) ? $_SERVER[ 'LOCAL_ADDR' ] : "");
            }
            
            $content .= "<div class='cora_footer_info'>";

            # Memory Usage
            $content .= "<span> Memory :  $memory_usage of $memory_limit MB </span>";
            
            # PHP version
            $content .= "<span> PHP : " . PHP_VERSION . "</span>";
            
            # IP address
            $content .= "<span> IP : $server_ip_address (" . gethostname() . ") </span>";
            
            # Bit size
            $content .= "<span> @ ".  (PHP_INT_SIZE * 8) . "BitOS" ."</span>";

            $content .= "</div>";
            
        }

        return $content;

    }

}