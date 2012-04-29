<?php

/**
################################
# CREATE Clinic POST TYPE #
################################
**/

// register custom post type
add_action('init', 'clinic_register');

// register taxonomy
add_action( 'init', 'department_register');

function clinic_register() {

  $labels = array(
   'name' => _x('Clinics', 'post type general name'),
   'singular_name' => _x('Clinic', 'post type singular name'),
   'add_new' => _x('Add New', 'testemonial'),
   'add_new_item' => __('Add New Clinic'),
   'edit_item' => __('Edit Clinic'),
   'new_item' => __('New Clinic'),
   'view_item' => __('View Clinic'),
   'search_items' => __('Search Clinic'),
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
	'rewrite' => array('slug' => 'clinic', 'with_front' => false),
	'has_archive' => false,   
	'capability_type' => 'post',
	'hierarchical' => true,
	'supports' => array('thumbnail', 'title', 'editor')
   );
   
   register_post_type('clinic', $args);
}

function department_register(){
  $labels = array(
    'name' => _x( 'Departments', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Department' ),
    'parent_item_colon' => __( 'Parent Department:' ),
    'edit_item' => __( 'Edit Department' ), 
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department Name' ),
    'menu_name' => __( 'Department' ),
  ); 	
  
  $args = array(
    'labels' => $labels,  
    'hierarchical' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'department' ),
  );  
  register_taxonomy('department',array('clinic'), $args);  
}
?>
