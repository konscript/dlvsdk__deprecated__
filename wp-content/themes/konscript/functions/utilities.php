<?php
// random utility function that are shared across the application

// show/hide content when click on title
function slidedown($title, $content){
	return '
	 	<div class="slidedown">
			<a href="#" class="title">'.$title.'</a>
			<p class="content">'.$content.'</p>
		</div>';
}

?>
