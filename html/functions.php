<?php
	
	
	/*********************
	 * Menu registratie. *
	 *********************/
	add_theme_support( 'title-tag' );

	function register_my_menu() {
	  register_nav_menu('header-menu',__( 'Header Menu', 'magneet-online' ));
	}
	add_action( 'init', 'register_my_menu' );


	/***************************
	 * WP-admin change notice. *
	 ***************************/
	function sample_admin_notice__success() {
	    global $current_user;
	    get_currentuserinfo();
	    $admin_usr = "magneet_admin";
	    $curr_user = $current_user->user_nicename;
	    if($curr_user == $admin_usr){
		    ?>
		    <div class="notice notice-warning">
		        <p><?php _e( "Thema aanpassingen gelieve te doen in de PHP, SASS en Coffeescript files op de <a href='https://github.com/xvilo/Better-Sales-Company' target='_blank'>GitHub repository.</a> <br><small>Deze melding is alleen te zien voor {$admin_usr}</small>");?></p>
		    </div>
		    <?php
		}
	}
	add_action( 'admin_notices', 'sample_admin_notice__success' );
	
	
	/**************************************
	 * Insert Thenme script, dist or dev. *
	 **************************************/
	function add_theme_scripts() {
		$rev_files = array_reverse(json_decode(file_get_contents(get_template_directory()."/dist/rev-manifest.json"), true));
		foreach($rev_files as $key => $item){
			if( $_SERVER['HTTP_HOST'] == "bettersales.sem" OR $_SERVER['HTTP_HOST'] == "bettersales.magneet.it" ){
				if(pathinfo($key, PATHINFO_EXTENSION) == "css"){
					wp_enqueue_style("dev-".pathinfo($key, PATHINFO_FILENAME), get_template_directory_uri() ."/". $key);
				}elseif(pathinfo($key, PATHINFO_EXTENSION) == "js"){
					wp_enqueue_script( "dev-".pathinfo($key, PATHINFO_FILENAME), get_template_directory_uri() ."/". $key, '', '', true);
				}
			}else{
				if(pathinfo($item, PATHINFO_EXTENSION) == "css"){
					wp_enqueue_style(pathinfo($item, PATHINFO_FILENAME), get_template_directory_uri() ."/dist/". $item);
				}elseif(pathinfo($item, PATHINFO_EXTENSION) == "js"){
					wp_enqueue_script( pathinfo($item, PATHINFO_FILENAME), get_template_directory_uri() ."/dist/". $item, '', '', true);
				}
			}
		}
	}
	add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
	
	
	/*******************************************************
	 * Remove script WP Version var. For Caching purposes. *
	 *******************************************************/
	function remove_cssjs_ver( $src ) {
	    if( strpos( $src, '?ver=' ) )
	        $src = remove_query_arg( 'ver', $src );
	    return $src;
	}
	add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
	add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );