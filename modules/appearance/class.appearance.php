<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * appearance Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_appearance {
    
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

        add_action( 'admin_head', array( $this  , "css_vars" ) );

        if( $this->options->in_view() ){
            add_action( 'admin_print_footer_scripts', array( $this  , "live_preview" ) );
        }
    }

    /**
     * Add CSS variables.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function css_vars() {

        echo "<style>:root {";

        foreach ($this->options->fields as $field) {

            if ($field['section'] == 'appearance' && $field['type'] == 'color') {

                $id = $field['id'];
                $section = $field['section'];
                $value = $this->options->get_value($section, $id);
                
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
        ?>
            <script>
                jQuery(document).ready(function($) {
                    <?php foreach ($this->options->fields as $field) { ?>
                        CoraFramework.$watch( "values.appearance.<?php echo $field['id'] ?>", newVal => {
                            document.documentElement.style.setProperty("--<?php echo $field['id'] ?>", newVal);                            
                        })
                    <?php } ?>
                });
            </script>
        <?php
    }

}