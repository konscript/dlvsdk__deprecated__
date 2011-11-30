<?php
// random utility functions that are shared across the application

// show/hide content when click on title
function slidedown($title, $content, $url = 0){
	$url = is_numeric($url) ? get_permalink( $url ) : $url;

	return '
			<h4><a href="'. $url .'">'.$title.'</a></h4>
			<div>'.$content.'</div>';
}
?>
