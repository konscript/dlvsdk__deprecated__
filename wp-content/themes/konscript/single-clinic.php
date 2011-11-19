<?php get_header(); ?>
<?php get_submenu(); ?>
	<div id="content">

		<?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <div class="post clinic">
		        <h1><?php the_title(); ?></h1>
		        <div class="post-content">
				 <?php
					// get destination param
					$destination = urldecode($wp_query->query_vars['destination']);
	
					// append destination param to url
					$url = empty($destination) ? get_field('booking_url') : trim(get_field('booking_url')) . "?l1=".$destination;
					
					// some text about the clinic
				 	echo the_content();				 	
				 ?>                    
														
				<iframe src="<?php echo $url ?>" frameborder="0" width="100%" height="600"></iframe>						
                </div>
		    </div><!--#end post-->
        <?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
