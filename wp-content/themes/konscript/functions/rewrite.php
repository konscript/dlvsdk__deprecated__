<?php
/*
 * post type: clinic
 * argument: destination
 * NB. Remember to rebuild permalinks after EVERY change
 ***/

// add destination to query vars
function add_query_vars($vars) {
    $vars[] = "destination";
    return $vars;
}
add_filter('query_vars', 'add_query_vars');

//flush_rewrite_rules( false );


// add new rewrite rules for clinic single and archive pages
function add_rewrite_rules($rules) {
//debug($rules);

/*
	// eg. clinic/london/destination/thailand/
    $single_clinic = array('clinic\/([^/]+)\/destination\/([^/]+)\/?$' => 'index.php?clinic=$matches[1]&destination=$matches[2]');
    
	// eg. clinic/destination/thailand/    
    $archive_clinic = array('clinic\/destination\/([^/]+)\/?$' => 'index.php?post_type=clinic&destination=$matches[1]');    
    
    // add new rules to existing rules    
    $rules = $single_clinic + $archive_clinic + $rules;
*/

    return $rules;
}
add_filter('rewrite_rules_array', 'add_rewrite_rules');
?>
