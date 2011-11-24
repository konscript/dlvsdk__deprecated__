<?php
// random utility functions that are shared across the application

// show/hide content when click on title
function slidedown($title, $content, $id = 0){

	return '
	 	<div class="accordion">
			<a href="'.get_permalink( $id ) .'" class="title">'.$title.'</a>
			<div class="content">'.$content.'</div>
		</div>';
}

?>
