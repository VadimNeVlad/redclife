<?php

	function theme_scripts() {

		wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
		wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/style.css' );

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor.js', false, null, true );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', ['jquery'], null, true );
		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], null, true );
	}

	function theme_main_setup() {

		register_nav_menus( array(
			'header_menu' => 'Меню в шапке',
			'footer_menu' => 'Меню в подвале',
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
		return 60;
	} );

	add_filter('excerpt_more', function($more) {
		return '...';
	});


	/* Add thumbnail
	=======================================*/


	add_theme_support( 'post-thumbnails' );



	/* Add Another Search Page
	=======================================*/

	function template_chooser($template)   
	{    
	  global $wp_query;   
	  $post_type = get_query_var('post_type');   
	  if( $wp_query->is_search && $post_type == 'team' )   
	  {
	    return locate_template('team-search.php');  //  redirect to archive-search.php
	  }   
	  return $template;   
	}
	add_filter('template_include', 'template_chooser');    




	/* Add ACF fields to search
	=======================================*/


	/**
	 * Extend WordPress search to include custom fields
	 *
	 * https://adambalee.com
	 */

	/**
	 * Join posts and postmeta tables
	 *
	 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
	 */
	function cf_search_join( $join ) {
	    global $wpdb;

	    if ( is_search() ) {    
	        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	    }

	    return $join;
	}
	add_filter('posts_join', 'cf_search_join' );

	/**
	 * Modify the search query with posts_where
	 *
	 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
	 */
	function cf_search_where( $where ) {
	    global $pagenow, $wpdb;

	    if ( is_search() ) {
	        $where = preg_replace(
	            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
	            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	    }

	    return $where;
	}
	add_filter( 'posts_where', 'cf_search_where' );

	/**
	 * Prevent duplicates
	 *
	 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
	 */
	function cf_search_distinct( $where ) {
	    global $wpdb;

	    if ( is_search() ) {
	        return "DISTINCT";
	    }

	    return $where;
	}
	add_filter( 'posts_distinct', 'cf_search_distinct' );


	


	
	/* Init Custom Post type
	=======================================*/

	include (get_template_directory() . '/assets/inc/custom-post-type-team.php');
	include (get_template_directory() . '/assets/inc/custom-post-type-practice.php');
	include (get_template_directory() . '/assets/inc/custom-post-type-careers.php');

	



	add_action('wp_enqueue_scripts', 'theme_scripts');
	add_action('after_setup_theme', 'theme_main_setup');



