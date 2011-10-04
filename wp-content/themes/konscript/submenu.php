<div id="sidebar"> &nbsp;
<?php

    //wp_nav_menu(array('theme_location' 	=> 'main'));		

global $post;
 
// Get the ID of the set menu
$menu_id = get_post_meta($post->ID, 'dpm_page-menu-id', true);

// the page has no menu, look for parent menus
if($menu_id <= 0){
	$menu_id = get_post_meta($post->post_parent, 'dpm_page-menu-id', true);

	// if singe post (not page)
	if(is_single()){	
		$page_id = getPageIDOfCurrentCustomPostType();							
		
		// get menu ID
		$menu_id = get_post_meta($page_id, 'dpm_page-menu-id', true);
	}
}

// if a menu is found, output it
if($menu_id > 0){
	wp_nav_menu(array('menu' => $menu_id));
}
?> 
</div>

