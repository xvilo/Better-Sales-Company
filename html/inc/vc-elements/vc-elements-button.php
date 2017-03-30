<?php
/*
Element Description: VC Button
*/
 
// Button Class 
class button extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_mapping' ) );
        add_shortcode( 'magneet_button', array( $this, 'vc_html_output' ) );
    }
     
    // Element Mapping
    public function vc_mapping() {
         
        // Stop all if VC is not enabled
	    if ( !defined( 'WPB_VC_VERSION' ) ) {
	            return;
	    }
	         
	    // Map the block with vc_map()
	    vc_map( 
		    
	        array(
	            'name' => __('Button', 'text-domain'),
	            'base' => 'magneet_button',
	            'description' => __('Speciale button', 'text-domain'), 
	            'category' => __('Magneetonline', 'text-domain'),   
	            //'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
	            'params' => array(   
	                    
	                array(
	                    'type' => 'textfield',
	                    'holder' => 'h3',
	                    'class' => 'title-class',
	                    'heading' => __( 'Title', 'text-domain' ),
	                    'param_name' => 'title',
	                    'value' => __( 'Default value', 'text-domain' ),
	                    'description' => __( 'Title', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Algemeen',
	                ),  
	                  
	                array(
	                    'type' => 'vc_link',
	                    'holder' => 'a',
	                    'class' => 'link-class',
	                    'heading' => __( 'Link', 'text-domain' ),
	                    'param_name' => 'link',
	                    'value' => __( 'http://website.nl', 'text-domain' ),
	                    'description' => __( 'De Link', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Algemeen',
	                ),  
	                  
	                array(
	                    'type' => 'dropdown',
	                    'heading' => __( 'Size', 'text-domain' ),
	                    'param_name' => 'size',
	                    'value' => array( "selecteer grootte", "small", "normal", "big" ),
	                    'description' => __( 'De knop grootte', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Design',
	                ),
	                  
	                array(
	                    'type' => 'dropdown',
	                    'heading' => __( 'Color Style', 'text-domain' ),
	                    'param_name' => 'color',
	                    'value' => array( "selecteer style","style-1", "style-2", "style-3" ),
	                    'description' => __( 'De kleur style', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Design',
	                ),  
	                  
	                array(
	                    'type' => 'dropdown',
	                    'heading' => __( 'Style', 'text-domain' ),
	                    'param_name' => 'style',
	                    'value' => array( "selecteer style", "open", "solid" ),
	                    'description' => __( 'Soort knop', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Design',
	                ),
	                
	                array(
	                    'type' => 'dropdown',
	                    'heading' => __( 'Align', 'text-domain' ),
	                    'param_name' => 'align',
	                    'value' => array( "selecteer Uitlijning", "normal", "center" ),
	                    'description' => __( 'Uitlijning', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Design',
	                ),
	                
	                array(
			            'type' => 'css_editor',
			            'heading' => __( 'Css', 'my-text-domain' ),
			            'param_name' => 'css',
			            'group' => __( 'Design options', 'my-text-domain' ),
			        ),      
	                     
	            )
	        )
	    );                                
	        
	}
     
     
    // Element HTML
	public function vc_html_output( $atts ) {
		
	    // Params extraction
	    extract(
	        shortcode_atts(
	            array(
	                'title'   => 'Geen titel ingegeven',
	                'link' => '#no-link',
	                'size' => 'normal',
	                'color' => 'style-1',
	                'style' => 'open',
	                'align' => 'normal',
	                'css' => '',
	            ), 
	            $atts
	        )
	    );
	    
	    // Fill $html var with data
	    $class = "button";
	    $href = vc_build_link($link);
	    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	    $cssClass = esc_attr( $css_class );
	    $html = "<span class='$cssClass $class {$class}__{$align}'><a href='{$href['url']}' title='{$href['title']}' target='{$href['target']}' rel='{$href['rel']}' class='{$class}--inner {$class}--inner__{$size} {$class}--inner__{$color} {$class}--inner__{$style}'>{$title}</a></span>";      
	     
	    return $html;
	     
	}
     
} // End Element Class
 
// Element Class Init
new button();   