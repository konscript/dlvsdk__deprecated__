<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
	<!--Default sidebar info goes here-->
	<div id="sidebar"> &nbsp;
	<?php
	
		// only pages can have submenus (is that correct?!)		
		if(is_page()){
			// get get number of children
			$numberOfChildren = count(get_pages('child_of='.get_the_ID()));				
		
			// return true if subpage else false
			$isSubpage = ($post->post_parent) ? true : false;		
		
			if($numberOfChildren>0 || $isSubpage){
				$permalink = basename(get_permalink($post->post_parent)); 		
				wp_nav_menu(array(
					'menu' 	=> $permalink
				));
			}
	    }
    ?>    
	</div>
<?php endif; ?>
