<div id="sidebar"> &nbsp;
<?php

global $post;
// Get the ID of the set menu
$menu_id = get_post_meta($post->ID, 'dpm_page-menu-id', true);

// the page has no menu, look for parent menus
if($menu_id <= 0){
	$menu_id = get_post_meta($post->post_parent, 'dpm_page-menu-id', true);
}

if($menu_id > 0){
	wp_nav_menu(array('menu' => $menu_id));
}
	
	
/*
 wp_list_categories(array(
 	'title_li' => ' '
 ));
*/
?> 
</div>

