<?php /* Template Name: Frontpage*/ ?>
<?php
// redirect for country selector
redirectTravelGuide();
get_header(); 
?>

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

	<div class="frontpage-column" id="column-left">

			<h3><?=the_field("title_left")?></h3>
			<?=the_field("content_left")?>
			<p>Type your destination:</p>			
			<?php travelguide(); ?>			
			
			<p class="mapText">Or click map to find destination:</p>
			<a id="world_map_thumb" href="<?php bloginfo('template_url'); ?>/ajax/world_map.htm"><img src="<?php bloginfo('template_url'); ?>/img/world_map_thumb.png" /></a>

		
	</div>
			
	<div class="frontpage-column" id="column-right">	
			<h3><?=the_field("title_right")?></h3>			
			<?=the_field("content_right")?>	
			<a class="button" href="/clinics">Book!</a>				
			
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

<div style="display: none;">
	<div id="world_map_big" style="width:800px;overflow:auto;">
		<img src="<?php bloginfo('template_url'); ?>/img/world_map.png" />
	</div>
</div>
<?php get_footer(); ?>
