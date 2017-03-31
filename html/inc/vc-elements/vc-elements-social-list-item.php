<?php
/*
Element Description: VC socialList
*/
 
// socialList Class 
class socialListItem extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'vc_mapping' ) );
        add_shortcode( 'magneet_socialListItem', array( $this, 'vc_html_output' ) );
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
	            'name' => __('Social List Item', 'text-domain'),
	            'base' => 'magneet_socialListItem',
	            'description' => __('Social Media Netwerk', 'text-domain'), 
	            'category' => __('Magneetonline', 'text-domain'),   
	            //'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',            
	            'params' => array(    
	                array(
	                    'type' => 'textfield',
	                    'holder' => 'h3',
	                    'class' => 'title-class',
	                    'heading' => __( 'Netwerk', 'text-domain' ),
	                    'param_name' => 'title',
	                    'value' => __( 'hyves', 'text-domain' ),
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
	            )
	        )
	    );                            
	        
	}
	
	public function vc_html_output( $atts ) {
		
	    // Params extraction
	    extract(
	        shortcode_atts(
	            array(
	                'title'   => 'Geen titel ingegeven',
	                'link' => '#no-link',
	            ), 
	            $atts
	        )
	    );
	    
	    // Fill $html var with data
	    $href = vc_build_link($link);
	    $html = "
	    <li class='social-list--item'>
	    	<a href='{$href['url']}' title='{$href['title']}' target='{$href['target']}' rel='{$href['rel']}' class='social-list--item__inner class='social-list--item__{$title}'>
	    		<i class='fa fa-{$title}' aria-hidden='true'></i>
			</a>
	    </li>";      
	     
	    return $html;
	     
	}
     
} // End Element Class
 
// Element Class Init
new socialListItem();   