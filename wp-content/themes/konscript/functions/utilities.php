<?php
// random utility functions that are shared across the application

// show/hide content when click on title
function slidedown($title, $content, $id = 0){

	return '
			<h4><a href="'.get_permalink( $id ) .'">'.$title.'</a></h4>
			<div>'.$content.'</div>';
}
?>

