<?php

# Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Theme Class
 * 
 * 
 * @since 1.0.0
 * @author Omar Badran
 */
class Cora_Theme {

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
        
        require_once $this->parent->dir("modules-premium/theme/options.php");

        add_action( 'admin_head', [$this  , "css_vars"] );
        add_action( 'login_head', [$this  , "css_vars"] );

        add_filter( 'admin_body_class', [$this  , "shadows"]);
        add_filter( 'login_body_class', [$this  , "shadows"]);

        if( $this->parent->options->in_view() ){
            add_action( 'admin_print_footer_scripts', [$this  , "live_preview"] );
        }
    }

    /**
     * Shadows.
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function shadows( $classes ) {
        $use_shadows = $this->parent->options->get_value('theme_premium', 'shadows');

        if ( filter_var($use_shadows, FILTER_VALIDATE_BOOLEAN) ) {
            if ( is_array($classes) ) {
                $classes[] = 'cora-shadows';
            } else {
                $classes .= 'cora-shadows';
            }
        }

        return $classes;
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

            if ($field['section'] == 'theme_premium' && $field['type'] == 'color') {

                $id = $field['id'];
                $value = $this->parent->options->get_value('theme_premium', $id);
                
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

            if( $section == 'theme_premium' && $type == 'color' ) {

                echo "CoraFramework.$watch( 'values.theme_premium.$id', newVal => {
                        document.documentElement.style.setProperty('--$id', newVal);
                    }); \n";

            }
        }

        echo "}); </script>";
    }

}