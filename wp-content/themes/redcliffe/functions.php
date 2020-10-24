<?php

	function theme_scripts() {

		wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/style.css' );

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor.js', false, null, true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true );
	}

	function theme_main_setup() {

		register_nav_menus( array(
			'header_menu' => 'Меню в шапке',
		));
	}

	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Опции',
			'menu_title'	=> 'Опции',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));	
	}


	/* Remove br from CONTACT FORM 7
	=======================================*/
	add_filter('wpcf7_autop_or_not', '__return_false');


	/* Change length of the text trim and change [...] to ...
	=============================================*/

	add_filter( 'excerpt_length', function(){
		return 30;
	} );

	add_filter('excerpt_more', function($more) {
		return '...';
	});


	/* Add thumbnail
	=======================================*/


	add_theme_support( 'post-thumbnails' );



	
	/* Init Custom Post type
	=======================================*/

	include (get_template_directory() . '/assets/inc/custom-post-type-team.php');
	include (get_template_directory() . '/assets/inc/custom-post-type-practice.php');
	include (get_template_directory() . '/assets/inc/custom-post-type-careers.php');

	



	add_action('wp_enqueue_scripts', 'theme_scripts');
	add_action('after_setup_theme', 'theme_main_setup');



