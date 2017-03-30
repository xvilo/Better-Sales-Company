<?php
/*
Element Description: VC Icons
*/
 
// icons Class 
class icons extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_mapping' ) );
        add_shortcode( 'magneet_icons', array( $this, 'vc_html_output' ) );
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
	            'name' => __('icons', 'text-domain'),
	            'base' => 'magneet_icons',
	            'description' => __('Speciale icons', 'text-domain'), 
	            'category' => __('Magneetonline', 'text-domain'),   
	            //'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
	            'params' => array(   
		            
	                array(
	                    'type' => 'dropdown',
	                    'heading' => __( 'Icon', 'text-domain' ),
	                    'param_name' => 'n',
	                    'value' => array( "Selecteer icoon", "mindset", "insights", "team", "world" ),
	                    'description' => __( '<b>Keuze uit de speciale icons.</b> Wanneer geavanceerde instellingen worden gebruikt, wordt deze optie niet toegepast.', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Algemeen',
	                ),
	                
	                array(
	                    'type' => 'dropdown',
	                    'heading' => __( 'Uitlijning', 'text-domain' ),
	                    'param_name' => 'align',
	                    'value' => array( "links", "centered",),
	                    'description' => __( 'Kies je uitlijning.', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Algemeen',
	                ),
	                
	                array(
	                    'type' => 'textfield',
	                    'holder' => 'h3',
	                    'class' => 'title-class',
	                    'heading' => __( 'Scope', 'text-domain' ),
	                    'param_name' => 'scope',
	                    'value' => __( 'theme', 'text-domain' ),
	                    'description' => __( '<b>PAS OP!</B> Dit is een geavanceerde instelling.', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Geavanceerd',
	                ), 
	                
	                array(
	                    'type' => 'textfield',
	                    'holder' => 'h3',
	                    'class' => 'title-class',
	                    'heading' => __( 'Icon Name', 'text-domain' ),
	                    'param_name' => 'sn',
	                    'value' => __( ' ', 'text-domain' ),
	                    'description' => __( '<b>PAS OP!</B> Deze alleen te gebruiken bij custom <i>Scope</i>.', 'text-domain' ),
	                    'admin_label' => false,
	                    'weight' => 0,
	                    'group' => 'Geavanceerd',
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
	                'n'   => 'no-icon',
	                'sn'  => '',
	                'scope' => 'theme',
	                'css' => '',
	                'align' => 'left',
	            ), 
	            $atts
	        )
	    );
	    if($scope != 'theme'){
		    $n = $sn;
	    }
	    // Fill $html var with data
	    $class = "icon";
	    $dir = get_template_directory_uri();
	    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
	    $cssClass = esc_attr( $css_class ); 
	    $html = "<i class='$cssClass m-{$class} {$class}--{$scope}__{$n} m-{$class}__{$align}'><svg><use xlink:href='{$dir}/media/images/sprites/{$scope}.svg#{$n}' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg></i>";      
	     
	    return $html;
	     
	}
     
} // End Element Class
 
// Element Class Init
new icons();   