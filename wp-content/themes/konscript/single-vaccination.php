<?php get_header(); ?>
<?php sidebar_page(); ?>
	<div id="content">

	    <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="post">
                <h1><?php the_title(); ?></h1>
                <div class="post-content">
	 <?php		
	 	$fields = get_post_custom();
	 	
	 	$quantity = $fields["quantity"][0];	 	
	 	$price = $fields["price"][0];
	 	$date = $fields["date"][0];	 	
	 	
	 	echo $price;
	 ?>                
                
                    <?php echo the_content(); ?>
                    
                    
                </div>
		    </div><!--#end post-->
        <?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
