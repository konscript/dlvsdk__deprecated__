<?php

/**
################################
# CREATE VACCINATION POST TYPE #
################################
**/
add_action('init', 'vaccination_register');

function vaccination_register() {

  $labels = array(
   'name' => _x('Vaccinations', 'post type general name'),
   'singular_name' => _x('Vaccination', 'post type singular name'),
   'add_new' => _x('Add New', 'vaccination'),
   'add_new_item' => __('Add New Vaccination'),
   'edit_item' => __('Edit Vaccination'),
   'new_item' => __('New Vaccination'),
   'view_item' => __('View Vaccination'),
   'search_items' => __('Search Vaccination'),
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
   'rewrite' => array('slug' => 'vaccination', 'with_front' => false),
	'has_archive' => false,
   'capability_type' => 'post',
   'hierarchical' => true,
   'supports' => array('thumbnail', 'title', 'editor')
   );
   
   register_post_type('vaccination', $args);
}


?>
