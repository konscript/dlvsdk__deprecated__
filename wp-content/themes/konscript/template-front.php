<?php /* Template Name: Frontpage*/ ?>

<?php get_header(); ?>

<div id="content">	
	<div id="featured" >
	 <!-- First Content -->
	 <div id="fragment-1" class="ui-tabs-panel">
		<img src="<?php bloginfo('template_url'); ?>/img/frontpage-stockphoto.jpg"/>	 
		
		<div class="left">&nbsp;</div>
		<div class="right">
			<div class="inner">
				<p class="header">NUMMER 1: Ipsum lorem Doloret</p>
				<p>Ipsum lorem Doloret</p>			
			</div>
		</div>
	 </div>
	
	 <!-- Second Content -->
	 <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
<img src="<?php bloginfo('template_url'); ?>/img/frontpage-stockphoto.jpg"/>
		<div class="left">&nbsp;</div>
		<div class="right">
			<div class="inner">
				<p class="header">NUMMER 2: Ipsum lorem Doloret</p>
				<p>Ipsum lorem Doloret</p>			
			</div>
		</div>
	 </div>
	
	 <!-- Third Content -->
	 <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide">
		<div class="left">&nbsp;</div>
		<div class="right">
			<div class="inner">
				<p class="header">NUMMER 3: Ipsum lorem Doloret</p>
				<p>Ipsum lorem Doloret</p>			
			</div>
		</div>
	 </div>

	 
	 <!-- tabs -->
		<ul class="ui-tabs-nav">
		  <li class="ui-tabs-nav-item" id="nav-fragment-1"><a href="#fragment-1"><img src="<?php bloginfo('template_url'); ?>/img/plane.png"/><div>Going Travelling?</div></a></li>
		  <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="<?php bloginfo('template_url'); ?>/img/goggles.png"/><div>It's influenza season</div></a></li>
		  <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="<?php bloginfo('template_url'); ?>/img/boxnotes.png"/><div>Get An Appointment</div></a></li>
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
