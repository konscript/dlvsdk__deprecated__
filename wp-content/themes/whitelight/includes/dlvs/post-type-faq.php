<?php

/**
################################
# CREATE FAQ POST TYPE #
################################
**/

// register custom post type
add_action('init', 'faq_register');

// register taxonomy
add_action( 'init', 'faq_category_register');

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
   'menu_position' => 4,
   '_builtin' => false, // It's a custom post type, not built in!
   'menu_icon' => get_stylesheet_directory_uri() . '/img/icon_article.png',
   'rewrite' => array('slug' => 'faq', 'with_front' => false),
	 'has_archive' => false,   
   'capability_type' => 'post',
   'hierarchical' => true,
   'supports' => array('thumbnail', 'title', 'editor')
   );
   
   register_post_type('faq', $args);
}

function faq_category_register(){
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Category' ),
  ); 	
  
  $args = array(
    'labels' => $labels,  
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faq_category' ),
  );  
  register_taxonomy('faq_category',array('faq'), $args);  
}
?>
