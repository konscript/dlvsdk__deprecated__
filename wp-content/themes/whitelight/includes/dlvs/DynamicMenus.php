<?php 

/*
Plugin Name: Dynamic Page Menus
Plugin URI: http://github.com/ksmandersen/Dynamic-Wordpress-Menus/
Description: Set the page menu for a nav location dynamically from the admin interface
Version: 1.0
Author URI: http://github.com/ksmandersen/
*/

// Get the available menu's registed in Wordpress Menu interface
function get_menus(){
    $r = array(-1 => "(no menu)");
    //$r = array();
    $menus = wp_get_nav_menus();
		if(is_array($menus) && count($menus) > 0) {
			foreach($menus as $key => $menu) {
				$o = wp_get_nav_menu_object($menu->term_id);
				$r[$menu->term_id] = $o->name;
			}
		}
	
    return $r;
}

// Register meta box for page
function page_meta() {						
	
	$meta_box = array(
		'id'			=> 'dpm_page-menu',
		'title'		=> 'Attach submenu to page',
		'pages'		=> array('page'),
		'context'	=> 'normal',
		'fields'	=> array(
			array(
				'name'		=> 'Submenu',
				'id'			=> 'dpm_page-menu-id',
				'type'		=> 'select',
				'options'	=> get_menus(),
				'desc' => 'This submenu will be shown in the left sidebar on this page'
			)
		)
	);
	
  //new RW_Meta_Box($meta_box);
}

// If currently displaying admin interface then register the meta box
// TODO: Only display when creating / editing a page.	
if(is_admin())
	page_meta();


?>
