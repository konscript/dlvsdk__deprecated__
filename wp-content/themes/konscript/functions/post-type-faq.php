<?php

/**
################################
# CREATE FAQ POST TYPE #
################################
**/
add_action('init', 'faq_register');

function faq_register() {

  $labels = array(
   'name' => _x('FAQs', 'post type general name'),
   'singular_name' => _x('FAQ', 'post type singular name'),
   'add_new' => _x('Add New', 'testemonial'),
   'add_new_item' => __('Add New FAQ'),
   'edit_item' => __('Edit FAQ'),
   'new_item' => __('New FAQ'),
   'view_item' => __('View FAQ'),
   'search_items' => __('Search FAQ'),
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
   'menu_position' => 5,
   '_builtin' => false, // It's a custom post type, not built in!
   'menu_icon' => get_stylesheet_directory_uri() . '/img/icon_article.png',
   'rewrite' => array('slug' => 'faq', 'with_front' => false),
	'has_archive' => false,   
   'capability_type' => 'post',
   'hierarchical' => false,
   'supports' => array('thumbnail', 'title', 'editor')
   );
   
   register_post_type('faq', $args);
}

?>
