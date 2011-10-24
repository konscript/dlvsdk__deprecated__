<?php /* Template Name: Frontpage*/ ?>

<?php get_header(); ?>

<div id="content">	

	<div id="featured" >
	
	<?php if(get_field('tabs')): ?>
		<?php 
			// define variables
			$tab_id = 0; 
			$tabs = "";									
		?>	
		<?php while(the_repeater_field('tabs')): ?>    
			<?php 
				// increment tab id
				$tab_id++; 
				$tab_visibility = $tab_id > 1 ? "ui-tabs-hide" : "";
			?>
			
			 <!-- tab content -->
			 <div id="fragment-<?php echo $tab_id; ?>" class="ui-tabs-panel <?= $tab_visibility ?>">
				<img src="<?php the_sub_field('background_image'); ?>" alt="<?php the_sub_field('title'); ?>" />        		
				<div class="inner">
					<p class="header"><?php the_sub_field('title'); ?></p>
					<p><?php the_sub_field('description'); ?></p>			
				</div>
			 </div>        
				
			<?php 
				// add tabs
				$tabs .= '<li class="ui-tabs-nav-item" id="nav-fragment-'.$tab_id.'"><a href="#fragment-'.$tab_id.'"><img src="'.get_sub_field('icon').'"/><span class="title">'.get_sub_field('title').'</span></a></li>';
			?>			
		<?php endwhile; ?>	 
	<?php endif; ?>	
		 
	 <!-- tabs -->
		<ul class="ui-tabs-nav">
			<?php echo $tabs; ?>
		</ul>	 
	 
	</div>

	<div class="frontpage-widgets" id="column-left">
	<?php  if (function_exists('dynamic_sidebar') && dynamic_sidebar('left_column')) : else : ?>
		<p><strong>Widget Ready</strong></p>
		<p>This left_column is widget ready! Add one in the admin panel.</p>
	<?php endif;  ?>
		
	</div>
		
	<div class="frontpage-widgets" id="column-center">
	<?php /* if (function_exists('dynamic_sidebar') && dynamic_sidebar('center_column')) : else : ?>
		<p><strong>Widget Ready</strong></p>
		<p>This center_column is widget ready! Add one in the admin panel.</p>
	<?php endif; */?>
	
			<h3>Our Clinics</h3>
			<img src="<?php bloginfo('template_url'); ?>/img/clinic_map.png" />
	</div>
		
	<div class="frontpage-widgets" id="column-right">
	<?php /* if (function_exists('dynamic_sidebar') && dynamic_sidebar('right_column')) : else : ?>
		<p><strong>Widget Ready</strong></p>
		<p>This right_column is widget ready! Add one in the admin panel.</p>
	<?php endif; */ ?>
	
			<h3>Online Booking</h3>
			
			<p class="header">Book you time now - it's easy!</p>			
			<a class="button" href="#">Book!</a>
			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
			
			<img src="<?php bloginfo('template_url'); ?>/img/firstaidkit.png" class="bookingimage"/>
			
			<ul id="clinics">
				<li>London</li>				
				<li>Clinic #2</li>
				<li>Clinic #3</li>
				<li>Clinic #4</li>
				<li>Clinic #5</li>
			</ul>														
	</div>


</div><!--#end content -->

<?php get_footer(); ?>
