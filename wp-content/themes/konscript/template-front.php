<?php /* Template Name: Frontpage*/ ?>
<?php
// redirect for country selector
redirectTravelGuide();
get_header(); 
?>

<div id="content" class="no-sidebar">	

	<div id="tabs" >
	
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
			?>
				
			<!-- tab content -->
			<div id="tabs-<?=$tab_id;?>">
				<img src="<?php the_sub_field('background_image'); ?>" alt="<?php the_sub_field('title'); ?>" />
				<div class="inner">
					<p class="header"><?php the_sub_field('title'); ?></p>
					<p><?php the_sub_field('description'); ?></p>			
				</div>
			</div>
				
			<?php 
				// tabs
				$tabs .= '<li><a href="#tabs-'.$tab_id.'"><img src="'.get_sub_field('icon').'"/><span class="title">'.get_sub_field('title').'</span></a></li>';
			?>			
		<?php endwhile; ?>	 
	<?php endif; ?>	
		 
	 <!-- tabs -->
		<ul	>
			<?php echo $tabs; ?>
		</ul>	 	 
	</div><!-- end #tabs -->

	<div class="frontpage-column" id="column-left">

		<h3><?=the_field("title_left")?></h3>

		<?php travelguide(); ?>			
			
		<div id="map-continents">
		  <ul id="continents">
		   <li id="c1"><a href="<?php bloginfo('wpurl'); ?>/region/africa">Africa</a></li>
		   <li id="c2"><a href="<?php bloginfo('wpurl'); ?>/region/asia">Asia</a></li>
		   <li id="c3"><a href="<?php bloginfo('wpurl'); ?>/region/oceania">Oceania</a></li>
		   <li id="c4"><a href="<?php bloginfo('wpurl'); ?>/region/europe">Europe</a></li>
		   <li id="c5"><a href="<?php bloginfo('wpurl'); ?>/region/north-america">North America</a></li>
		   <li id="c6"><a href="<?php bloginfo('wpurl'); ?>/region/south-africa">South America</a></li>
		  </ul>
		</div>			

		<?=the_field("content_left")?>
		
	</div>
			
	<div class="frontpage-column" id="column-right">	
			<h3><?=the_field("title_right")?></h3>			
			<?=the_field("content_right")?>	
			<a class="button-book" href="<?php bloginfo('wpurl'); ?>/booking">Book!</a>
			
			<!--
			<img src="<?php bloginfo('template_url'); ?>/img/firstaidkit.png" class="bookingimage"/>
			
			<ul id="clinics">
				<li>London</li>
				<li>Clinic #2</li>
				<li>Clinic #3</li>
				<li>Clinic #4</li>
				<li>Clinic #5</li>
			</ul>
			-->
	</div>

</div><!--#end content -->
<?php get_footer(); ?>
