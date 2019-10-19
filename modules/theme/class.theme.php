<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * theme Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_theme {
    
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

        add_action( 'admin_head', array( $this  , "css_vars" ) );
        add_action( 'login_head', array( $this  , "css_vars" ) );

        if( $this->parent->options->in_view() ){
            add_action( 'admin_print_footer_scripts', array( $this  , "live_preview" ) );
        }
    }

    /**
     * Inject CSS variables.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function css_vars() {

        echo "<style>:root {";

        foreach ($this->parent->options->fields as $field) {

            if ($field['section'] == 'theme' && $field['type'] == 'color') {

                $id = $field['id'];
                $section = $field['section'];
                $value = $this->parent->options->get_value($section, $id);
                
                if( $value ){
                    echo "--$id: $value;";
                }
            }

        };

        echo "}</style>";

    }

    /**
     * Live preview.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function live_preview() {

        echo "<script>jQuery(document).ready(function($) {";

        foreach ($this->parent->options->fields as $field) {
            
            extract($field);
            
            $watch = '$watch';

            if( $section == 'theme' && $type == 'color' ) {

                echo "CoraFramework.$watch( 'values.theme.$id', newVal => {
                        document.documentElement.style.setProperty('--$id', newVal);
                    }); \n";

            }
        }

        echo "}); </script>";
    }

}