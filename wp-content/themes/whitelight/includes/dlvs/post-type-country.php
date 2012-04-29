<?php

/**
################################
# CREATE COUNTRY POST TYPE #
################################
**/	
//register custom post type
add_action('init', 'country_register');

function country_register() {

  $labels = array(
   'name' => _x('Countries', 'post type general name'),
   'singular_name' => _x('Country', 'post type singular name'),
   'add_new' => _x('Add New', 'country'),
   'add_new_item' => __('Add New Country'),
   'edit_item' => __('Edit Country'),
   'new_item' => __('New Country'),
   'view_item' => __('View Country'),
   'search_items' => __('Search Country'),
   'not_found' =>  __('Nothing found'),
   'not_found_in_trash' => __('Nothing found in Trash'),
   'parent_item_colon' => '',
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
   'rewrite' => array('slug' => 'country', 'with_front' => false),
	'has_archive' => false,
   'capability_type' => 'post',
   'hierarchical' => false,
   'supports' => array('thumbnail', 'title', 'editor')
   );
   
   register_post_type('country', $args);
}



?>
