<?php get_header(); ?>
<?php 
$args = array(
  'post_type'=>'country',
  'title_li'=> '&nbsp;',
  'echo'         => false,  
);
$menu = "".wp_list_pages( $args ).""; 

	get_submenu($menu); 
?>
	<div id="content">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <div class="post country">
		        <h1><?php the_title(); ?></h1>	        		        
		        <div class="post-content">		   		        			        	
					<a href="/clinics?destination=<?php echo urlencode(the_title('', '', false)) ?>" class="button">Book vaccination</a>
		        <div class="clear"></div>

		             
	        		<div id="purposes">
					<?php if(get_field('vaccination_purposes')): ?>		        		       
						<?php while(the_repeater_field('vaccination_purposes')):
							$purpose = get_sub_field('purpose');
							$vaccinations = get_sub_field('vaccinations');	
							?>						
							
							<div class="vaccinations"><p class="purpose"><?=$purpose ?></p>
							<?php foreach($vaccinations as $vaccination): ?>
							 	<div class="slidedown">
									<a class="title"><?=$vaccination->post_title ?></a>							 	
									<div class="content"><?php echo $vaccination->post_content; ?></div>
								</div>								

							<?php endforeach; ?>
							</div>							
						<?php endwhile;	?>
					<?php endif; ?>
					</div>					 						 
				 	<?php echo the_content(); ?>
                </div>
		    </div><!--#end post-->
        <?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
