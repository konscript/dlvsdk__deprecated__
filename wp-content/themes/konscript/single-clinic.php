<?php get_header(); ?>
<?php
// Sidebar menu
$args = array(
  'post_type'	=>'clinic',
  'title_li'	=> '&nbsp;',
  'echo'			=> false,  
);
$sidebar_menu = wp_list_pages( $args );
sidebar($sidebar_menu, false, false); ?>

	<div id="content">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<div class="post clinic">

				<h1><?php the_title(); ?></h1>
				
				<?php 
				$clinic = basename(get_permalink());
				echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/clinic/' . $clinic . '"><div class="button-book-title">Book your vaccination</div></a>';
				?>
				
				<div class="post-content">									
					<?php							
					// some text about the clinic
					echo the_content();					
					?>     					
					
					<div class="contact">	
						<p class="header">Contact</p>
						<p class="address">Address: <?php the_field('address'); ?>, <?php the_field('city'); ?></p>					
						<p class="telephone">Phone: <?php the_field('phone_number'); ?></p>
					</div>	
					
					<?php $weekdays = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday"); ?>						
					<div class="opening_hours">	
						<p class="header">Opening hours</p>
						<table class="zebra">
							<?php	foreach($weekdays as $weekday): ?>
									
								<?php 
								$hours = get_field($weekday);
								if($hours != ""): ?>
									<tr><td><?php echo ucfirst($weekday); ?></td><td><?php echo $hours; ?></td></tr>									
								<?php	endif; ?>								
							<?php	endforeach; ?>
						</table>			
					</div>
					
					<div class="gmap"><?php the_field('map'); ?></div>
				</div>
			</div><!--#end post-->
		<?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
