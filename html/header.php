<!DOCTYPE html>
<html lang="nl" class="modernizr-no-js">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8" />

        <link rel="preconnect" href="//ajax.googleapis.com" />

        <meta http-equiv="cleartype" content="on" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="msapplication-tap-highlight" content="no" />
        <meta name="description" content="" />

        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <?php echo wp_head() ?>
    </head>
    <body <?php body_class(''); ?>>
	    <div class="small-1 large-9 columns">
							<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
						</div>
	    <div class="wrapper">
			<header class="site-header">
				<div class="container">
					<div class="row">
						<i class=" m-icon icon--ui__logo-light m-icon__left"><svg><use xlink:href="http://bettersales.sem/wp-content/themes/theme/media/images/sprites/ui.svg#logo-light" xmlns:xlink="http://www.w3.org/1999/xlink"></use></svg></i>	
					</div>
				</div>
			</header>