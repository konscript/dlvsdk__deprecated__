<?php /* Template Name: Page*/ ?>

<?php get_header(); ?>

	<div id="sidebar"> &nbsp;
	<?php
		$children = get_pages('child_of='.get_the_ID());		
		
		$isSubpage = (is_page() && $post->post_parent) ? true : false;
		
		if(count($children)>0 || $isSubpage){
			$permalink = basename(get_permalink($post->post_parent)); 		
			wp_nav_menu(array(
				'menu' 	=> $permalink
		    ));
	    }
    ?>
    <?php 
?>
    
	</div>

	<div id="content">

	
	    <?php if (have_posts()): while (have_posts()): the_post(); ?>

            <div class="post">
                <h1><?php the_title(); ?></h1>
                <div class="post-content">
                    <?php echo the_content(); ?>
                </div>


		    </div><!--#end post-->
        <?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
