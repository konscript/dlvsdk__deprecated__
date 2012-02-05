<?php /* Template Name: Frontpage*/ ?>
<?php get_header(); ?>

<div id="content" class="no-sidebar">	

	<div id="tabs">
	
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
					<a class="button" href="<?php echo get_permalink(get_sub_field('link')->ID); ?>">Read more</a>
				</div>
			</div>
				
			<?php 
				// tabs
				$tabs .= '<li><a href="#tabs-'.$tab_id.'"><img src="'.get_sub_field('icon').'" alt="'.get_sub_field('title').'"/><span class="title">'.get_sub_field('title').'</span></a></li>';
			?>			
		<?php endwhile; ?>	 
	<?php endif; ?>	
		 
	 <!-- tabs -->
		<ul	>
			<?php echo $tabs; ?>
		</ul>	 	 
	</div><!-- end #tabs -->

	<div class="frontpage-column" id="column-left">

		<div id="map-wrapper">

		<h3>What vaccines are recommended?</h3>
	
		<form method="GET" id="travelguide" action="<?php bloginfo('wpurl'); ?>">
		  <select name="Country" id="country-selector">
	    <option value="" selected="selected">Select Country</option>
			<?php $countries = getCountries(); ?>	
			<?php foreach($countries as $country): ?>
				<?php 
					$country_name = $country->post_title;
					$country_slug = get_permalink($country->ID);				
					$country_id = $country->ID;
				?>					
			    <option value="<?= $country_slug; ?>"><?=$country_name; ?></option>					
			<?php endforeach; ?>
		  </select>
		  <input type="Submit" value="Find">
		</form>	

		<p id="travelguide-after">or click on the map:</p>		
		
		<div id="map-continents">
		  <ul id="continents">
		   <li id="c1"><a href="<?php bloginfo('wpurl'); ?>/region/africa">Africa</a></li>
		   <li id="c2"><a href="<?php bloginfo('wpurl'); ?>/region/asia">Asia</a></li>
		   <li id="c3"><a href="<?php bloginfo('wpurl'); ?>/region/oceania">Oceania</a></li>
		   <li id="c4"><a href="<?php bloginfo('wpurl'); ?>/region/europe">Europe</a></li>
		   <li id="c5"><a href="<?php bloginfo('wpurl'); ?>/region/north-america">North America</a></li>
		   <li id="c6"><a href="<?php bloginfo('wpurl'); ?>/region/south-america">South America</a></li>
		  </ul>
		</div>		
		</div>
		
	</div>
			
	<div class="frontpage-column" id="column-right">	

		<a class="button-book" href="<?php bloginfo('wpurl'); ?>/booking"><div class="button-book-title">Book now</div><div class="button-book-meta">Quick and easy<br />online booking</div></a>
		<h3>Popular destinations</h3>			

		<table class="zebra top-destinations">
		<?php 
		$top_destinations = get_field('top_destinations');
		foreach($top_destinations as $country): 		
		?>
			<tr><td><img src="<?php the_field('flag', $country->ID); ?>" alt="" /><a href="<?php echo get_permalink($country->ID); ?>"><?php echo $country->post_title; ?> </a></td></tr>
		<?php endforeach; ?>
		</table>
	</div>
	
	<div class="clinics">
		<?php	$clinics = getClinics();
		foreach($clinics as $clinic):	?>
		<a href="<?php echo get_permalink($clinic->ID); ?>" class="clinic">
			<div class="title"><?php echo $clinic->post_title; ?></div>
			<div class="address"><?php the_field("address", $clinic->ID); ?></div>
		</a>
		<?php	endforeach;	?>
	</div>

</div><!--#end content -->
<?php get_footer(); ?>
