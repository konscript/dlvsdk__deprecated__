<?php

// Load JS for frontend
wp_enqueue_script('jquery-ui-1.8.16.custom.min.js', get_template_directory_uri() . '/includes/js/jquery-ui-1.8.16.custom.min.js', array( 'jquery' ) );
wp_enqueue_script('jquery-ui-autocomplete.js', get_template_directory_uri() . '/includes/js/jquery-ui-autocomplete.js', array( 'jquery' ) );
wp_enqueue_script('jquery.maphilight.min.js', get_template_directory_uri() . '/includes/js/jquery.maphilight.min.js', array( 'jquery' ) );
wp_enqueue_script('jquery.select-to-autocomplete.js', get_template_directory_uri() . '/includes/js/jquery.select-to-autocomplete.js', array( 'jquery' ) );
wp_enqueue_script('jquery.validate.min.js', get_template_directory_uri() . '/includes/js/jquery.validate.min.js', array( 'jquery' ) );
wp_enqueue_script('continents-map.js', get_template_directory_uri() . '/includes/js/continents-map/continents-map.js', array( 'jquery' ) );
wp_enqueue_script('dlvs-main', get_template_directory_uri() . '/includes/js/dlvs-main.js', array( 'jquery' ) );

// Getting page ID of current Custom Post Type
function getPageIDOfCurrentCustomPostType(){
	global $wpdb;
	global $post;		
	
	// get current post type		
	$post_type = get_post_type($post);
	
	// get id of page with current custom post type template		
	$post_id = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = 'template-".$post_type.".php'");		
	return $post_id;
}

// Shorten excerpt
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

// load up jQuery from Google CDN
if( !is_admin()){
	wp_deregister_script('jquery'); 
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"), false, '1.6.2');    
	wp_enqueue_script('jquery');
   
	wp_deregister_script('jqueryui');   
	wp_register_script('jqueryui', ("http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"), false, '1.5.3');   
	wp_enqueue_script('jqueryui');   
}

// Remove useless the_generator meta tag - whoops
add_filter( 'the_generator', create_function('$a', "return null;") );

// Custom Logo
function custom_logo() { ?> 
	<style type="text/css">
		h1 a { background-image: url(<?php echo get_bloginfo('template_directory'); ?>/img/dlvs_logo_2012.png) !important; }
	</style>
<?php }	
add_action('login_head', 'custom_logo');

// Admin Footer
function remove_footer_admin () {
	echo 'Developed by Konscript';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// debug outputting
function debug($output){
	$debug = "<hr><pre>";
	$debug .= print_r($output, true);	
	$debug .= "<pre>";	
	echo $debug; 
}
?>
