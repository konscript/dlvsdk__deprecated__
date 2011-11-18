<?php 

/**
##########################################
# INCLUDES								 #
##########################################
**/

// safety, jquery cdn and setup
require_once 'functions/setup.php';

// meta box class
require_once 'functions/meta-box/meta-box.class.php';

// register custom post types and taxonomies
require_once('functions/post-type-faq.php');
require_once('functions/post-type-vaccination.php');
require_once('functions/post-type-country.php');
require_once('functions/post-type-clinic.php');
require_once('functions/post-type-region.php');

// menus
require_once 'functions/menu-general.php';
require_once 'functions/DynamicMenus.php';

// widgets
require_once 'functions/widget-frontpage.php';

// travelguide
require_once 'functions/travelguide.php';

function getPageIDOfCurrentCustomPostType(){
	global $wpdb;
	global $post;		
	
	// get current post type		
	$post_type = get_post_type($post);
	
	// get id of page with current custom post type template		
	$post_id = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = 'template-".$post_type.".php'");		
	return $post_id;
}

/**
#############################
# SHORTEN EXCERPT			#
#############################
**/
function konscript_excerpt($length, $str) {
   if(strlen($str)>$length) {
       $subex = substr($str,0,$length-5);
       $exwords = explode(" ",$subex);
       $excut = -(strlen($exwords[count($exwords)-1]));
       if($excut<0) {
            $res = substr($subex,0,$excut);
       } else {
       	    $res = $subex;
       }
       $res .= "[...]";
   } else {
	   $res = $str;
   }
   
   return $res;
}

require_once( get_template_directory() . '/lib/admin/theme-options.php' );
