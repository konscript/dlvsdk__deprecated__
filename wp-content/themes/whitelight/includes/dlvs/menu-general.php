<?php

// add "sidebar-hidden" to body class
/*
DISABLED: Layout will always have a sidebar
add_filter('body_class','my_class_names');
function my_class_names($classes) {
	
	// will output false if the option "Don't show menu" has been chosen
	if(get_submenu()  === false){
		$classes[] = 'sidebar-hidden';
	}
	
	return $classes;
}
*/

function sidebar( $supplied_menu = false, $supplied_image = false, $supplied_additional = false ) {
	echo '<aside id="sidebar" class="col-right">';
	if ($supplied_menu != false){
		$get_submenu = get_submenu();
		if ($supplied_menu === true && $get_submenu != null) {
			echo '<div class="sidebar-menu">' . $get_submenu . '</div>';
		} else if ($supplied_menu !== true) {
			echo '<div class="sidebar-menu">' . $supplied_menu . '</div>';			
		}
	}
	if ($supplied_image != false){
		$get_image = get_the_post_thumbnail($id, array(200,600));
		if ($supplied_image === true && $get_image != null) {
			echo '<div class="sidebar-image">' . get_the_post_thumbnail($id, array(205,600)) . '</div>';
		} else if ($supplied_image !== true) {
			echo '<div class="sidebar-image">' . $sidebar_image . '</div>';
		}			
	}
	if ($supplied_additional != false){
		echo '<div class="sidebar-additional">' . $supplied_additional . '</div>';
	}
	echo '</aside>';
}

// output submenu
// DEPRECATED!
function the_submenu($supplied_menu = false) {

	// use wordpres inbuilt menu
	if($supplied_menu === false){		

		$submenu = get_submenu();
		echo '<div id="sidebar">'.$submenu.'</div>';
		
	// a custom menu is supplied
	} else {
		echo '<div id="sidebar">'.$supplied_menu.'</div>';
	}
}

// build submenu
function get_submenu(){
	global $post;
	 
	// Get the ID of the set menu
	$menu_id = get_post_meta($post->ID, 'dpm_page-menu-id', true);
		
	// the menu is unset, look for parent menus
	if($menu_id == -1 || $menu_id == null){
		
		// single post (not page)
		if(is_single()){	
			$page_id = getPageIDOfCurrentCustomPostType();												
			
			// get menu ID
			$menu_id = get_post_meta($page_id, 'dpm_page-menu-id', true);
			
		// sub-page
		}else{
			$menu_id = get_post_meta($post->post_parent, 'dpm_page-menu-id', true);
		}						
	}

	if ($menu_id == -1 || $menu_id == null) {
		return false;
	} else {
		return wp_nav_menu(array('menu' => $menu_id, 'echo' => false));
	}
	
} 

// include Kristians Dynamic Menus on admin page
//include 'DynamicMenus.php';

// FIX: add "current-menu-item" class to wp_list_pages with custom post types
function my_page_css_class( $css_class, $page ) {
	global $post;
	
	if ( $post->ID == $page->ID ) {
		$css_class[] = 'current-menu-item';
	}
	return $css_class;
}
add_filter( 'page_css_class', 'my_page_css_class', 10, 2 );

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
		
		// add class if post_id fits the page_id the menu item points to (object_id)
		if($item->object_id == $pageIDOfCurrentCustomPostType){
		    array_push($classes, 'current-menu-item');			
		}
		return $classes;
	}							
	
	$menu = wp_nav_menu(array(
		'theme_location'	=> 'main',
		'container'				=> false,
		'echo'						=> true,
	));
	
	//get_search_form(); 
}
?>
