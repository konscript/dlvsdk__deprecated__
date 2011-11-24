<?php
// Safety first.
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly!');

// load up jQuery from Google CDN
if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"), false, '1.6.2');    
   wp_enqueue_script('jquery');
   
	wp_deregister_script('jqueryui');   
	wp_register_script('jqueryui', ("http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"), false, '1.5.3');   
	wp_enqueue_script('jqueryui');   
     
}

// Remove useless the_generator meta tag - whoops
add_filter( 'the_generator', create_function('$a', "return null;") );

// Custom Logo
function custom_logo() { ?> 
	<style type="text/css">
		h1 a { background-image: url(
			<?php get_bloginfo('template_directory'); ?>/img/logo-login.gif
		) !important; }
    </style>
<?php }

add_action('login_head', 'custom_logo');

// Admin Footer
function remove_footer_admin () {
	echo 'Powered by Konscript';
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
