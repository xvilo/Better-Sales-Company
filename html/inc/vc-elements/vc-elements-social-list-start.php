<?php
/*
Element Description: VC socialList
*/
 
// socialList Class 
class socialListStart extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_mapping' ) );
        add_shortcode( 'magneet_socialListStart', array( $this, 'vc_html_output_start' ) );
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
	            'name' => __('Social List Start', 'text-domain'),
	            'base' => 'magneet_socialListStart',
	            'description' => __('1e Block', 'text-domain'), 
	            'category' => __('Magneetonline', 'text-domain'),   
	            //'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
	            'params' => array(    
	                     
	            )
	        )
	    );           
	        
	}
     
     
    // Element HTML
	public function vc_html_output_start( $atts ) {
	    $html = "<ul class='social-list'>";      
	    return $html;
	}} // End Element Class
 
// Element Class Init
new socialListStart();   