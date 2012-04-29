<?php
/*
 * post type: clinic
 * argument: destination
 * NB. Remember to rebuild permalinks after EVERY change
 ***/

// add destination to query vars
function add_query_vars($vars) {
    $vars[] = "destination_param";
    $vars[] = "clinic_param";    
    return $vars;
}
add_filter('query_vars', 'add_query_vars');

// flush_rewrite_rules( true );

// add new rewrite rules for clinic single and archive pages
function add_rewrite_rules($rules) {

    // booking with clinic
    $booking_without_destination = array('booking/clinic/(.+?)/?$' => 'index.php?pagename=booking&clinic_param=$matches[1]');           
    
    // booking with destination 
    $booking_with_destination = array('booking/destination/(.+?)/?$' => 'index.php?pagename=booking&destination_param=$matches[1]');               
     
    
    // add new rules to existing rules    
    $rules = $booking_with_destination + $booking_without_destination + $rules;

    return $rules;
    
    // single: ?clinic=london
    // archive page: ?post_type=clinic
    // page: ?pagename=clinic
}
add_filter('rewrite_rules_array', 'add_rewrite_rules');
?>
