<?php
/**
 * Theme options
 * 
 * @since 1.0.0
 * @author Omar Badran
*/

# Add Section
$this->parent->options->add_section([
    'id'        =>  'theme',
    'title'     =>  __('Theme' , 'cora'),
    'icon'      =>  'color_lens',
]);


# Placeholder image
$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '<div class="cora-section-placeholder" style="background:url('. $this->parent->url("modules/theme") .'/screenshot.png);"></div>'
]);

# Upgrade message
# Upgrade message
$this->parent->options->add_field([
    'section'   =>  'theme',
    'type'      =>  'html',
    'content'   =>  '
        <div class="cora-section-go-premium">
            <h2>'.__('Theme', 'cora').'</h2>
            <p>' .__('This section allows you to customize every aspect of the admin area. Easily change the design to represent your brand or personal taste.', 'cora' ).'</p>
            <div class="cora-actions">
                <a href="#" class="button button-primary">'. __('Upgrade', 'cora'). '</a>
                <a href="#" class="button">'. __('Free Trial', 'cora'). '</a>
            </div>
        </div>'
]);
