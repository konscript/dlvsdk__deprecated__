<?php

/**
################################
# CREATE Region POST TYPE #
################################
**/

// register custom post type
add_action('init', 'region_register');

function region_register() {

  $labels = array(
   'name' => _x('Regions', 'post type general name'),
   'singular_name' => _x('Region', 'post type singular name'),
   'add_new' => _x('Add New', 'testemonial'),
   'add_new_item' => __('Add New Region'),
   'edit_item' => __('Edit Region'),
   'new_item' => __('New Region'),
   'view_item' => __('View Region'),
   'search_items' => __('Search Region'),
   'not_found' =>  __('Nothing found'),
   'not_found_in_trash' => __('Nothing found in Trash'),
   'parent_item_colon' => ''
 );
 
 $args = array(
   'labels' => $labels,
   'public' => true,
   'publicly_queryable' => true,
   'show_ui' => true,
   'query_var' => true,
   'menu_position' => 4,
   '_builtin' => false, // It's a custom post type, not built in!
   'menu_icon' => get_stylesheet_directory_uri() . '/img/icon_article.png',
   'rewrite' => array('slug' => 'region', 'with_front' => false),
	'has_archive' => false,   
   'capability_type' => 'post',
   'hierarchical' => true,
   'supports' => array('thumbnail', 'title', 'editor')
   );
   
   register_post_type('region', $args);
}
?>
