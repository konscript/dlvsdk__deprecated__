<?php

// submenu include shortcode
function get_submenu() {
	include(get_template_directory() . "/submenu.php");
}

// include Kristians Dynamic Menus on admin page
include 'DynamicMenus.php';

/**
#############################
# REGISTER NAVIGATION AREAS #
#############################
**/
function theme_addmenus() {
	register_nav_menus(
		array('main' => 'Main Menu')
	);
}

add_action( 'init', 'theme_addmenus' );


/**
#############################
# primary menu with search  #
#############################
**/
function primary_menu(){

	/****
	 * custom post type menu ancestor fix
	 * NB. Remember to add slug as title attribute in menu manager!
	 * http://wordpress.stackexchange.com/questions/3014/highlighting-wp-nav-menu-ancestor-class-w-o-children-in-nav-structure
	 ******/
	 
	global $pageIDOfCurrentCustomPostType;
	$pageIDOfCurrentCustomPostType = getPageIDOfCurrentCustomPostType();	
	add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2 );
	
	function current_type_nav_class($classes, $item) {
		global $pageIDOfCurrentCustomPostType;
		/*
		$post_type = get_query_var('post_type');
		
		// if current menu item is of the same post type
		if ($item->attr_title != '' && $item->attr_title == $post_type) {
		    array_push($classes, 'current-menu-item');
		    array_push($classes, 'dlvs-custom-post-type');		    
		};
		*/
		
		// add class if post_id fits the page_id the menu item points to (object_id)
		if($item->object_id == $pageIDOfCurrentCustomPostType){
		    array_push($classes, 'current-menu-item');			
		}
		
		return $classes;
	}							
	
    $menu = wp_nav_menu(array(
		'theme_location' 	=> 'main',
		'container'=> false,
		'echo'            => true,

	));
	
	get_search_form(); 
}
?>
