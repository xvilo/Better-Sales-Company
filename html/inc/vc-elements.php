<?php
	$elements = array('button');
	
	//getting all files
	foreach($elements as $element){
		require_once( get_template_directory()."/inc/vc-elements-{$element}.php" ); 	
	}