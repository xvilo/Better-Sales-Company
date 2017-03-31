<?php
 	$elements = array('button', 'icons', 'social-list-end', 'social-list-start', 'social-list-item');
 	
 	//getting all files
 	foreach($elements as $element){
 		require_once( get_template_directory()."/inc/vc-elements/vc-elements-{$element}.php" ); 	
 	}