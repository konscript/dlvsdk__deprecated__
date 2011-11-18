<?php /* Template Name: Clinics*/ ?>
<?php get_header(); ?>
<?php get_submenu(); ?>

<section id="primary">
	<div id="content" role="main">

		<?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <div class="page clinic">
		        <h1><?php the_title(); ?></h1>
		        <div class="post-content">		   
		        			        
		             
	        		<div id="vaccination_purposes">
					<?php if(get_field('clinics')): ?>		        		       
						<?php while(the_repeater_field('clinics')): ?>
						<?php
							$name = get_sub_field('name');
							
							// append destination param to url
							if(isset($_GET["destination"])){
								$iframe_url = get_sub_field('url')."?l1=".$_GET["destination"];
								$link_url = "?clinic=".urlencode($name)."&destination=".$_GET["destination"];																
							}else{
								$iframe_url = get_sub_field('url');
								$link_url = "?clinic=".urlencode($name);
							}
							
						?>
						
						<?php if(isset($_GET["clinic"])): ?>
							<?php if(urldecode($_GET["clinic"])==$name): ?>
								
								<iframe src="<?php echo $iframe_url ?>" frameborder="0" width="100%" height="600"></iframe>						
							<?php endif; ?>							
						<?php else: ?>
						 	<?php echo the_content(); ?>                    		        						
							<a href="<?php echo $link_url; ?>"><?php echo $name; ?></a>
						<?php endif; ?>

						<?php endwhile;	?>
					<?php endif; ?>
					
					</div>					 						 
                </div>
		    </div><!--#end post-->
        <?php endwhile; endif; ?>
	</div><!--#end content -->
</section><!-- #primary -->

<?php get_footer(); ?>
