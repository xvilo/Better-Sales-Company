<?php
/*
Element Description: VC socialList
*/
 
// socialList Class 
class socialListEnd extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_mapping' ) );
        add_shortcode( 'magneet_socialListEnd', array( $this, 'vc_html_output_end' ) );
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
	            'name' => __('Social List End', 'text-domain'),
	            'base' => 'magneet_socialListEnd',
	            'description' => __('Laatste Block', 'text-domain'), 
	            'category' => __('Magneetonline', 'text-domain'),   
	            //'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
	            'params' => array(    
	                     
	            )
	        )
	    ); 
	    
	                              
	        
	}
	
	// Element HTML
	public function vc_html_output_end( $atts ) {
	    $html = "</ul>";      
	    return $html;
	}     
} // End Element Class
 
// Element Class Init
new socialListEnd();   