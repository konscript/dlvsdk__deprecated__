<div id="sidebar"> &nbsp;
<?php
global $post;

// get get number of children
$numberOfChildren = count(get_pages('child_of='.get_the_ID()));				

// is this a subpage?
$isSubpage = (is_page() && $post->post_parent) ? true : false;						

if($numberOfChildren>0 || $isSubpage){
	$permalink = basename(get_permalink($post->post_parent)); 		
	wp_nav_menu(array(
		'menu' 	=> $permalink
	));
}
?> 
</div>

