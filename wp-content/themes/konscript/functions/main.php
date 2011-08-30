<?php
/**
 * Main (main.php)
 * Put all your primary code logic here and use it in the templates. Branch out to other php-files if necessary.
 */

/**
 * Add actions
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference
 */ 
// add_action( 'action_hook_name','custom_function_name' );

/**
 * Add filters
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference
 */
// add_filter( 'filter_hook_name', 'custom_function_name' );

function hello_world() {
	echo 'Hello World!';
}
?>