<?php /* Template Name: Frontpage*/ ?>
<?php
/*
// disabled
// redirect for country selector
if(isset($_GET["Country"])){
	header("Location: ".get_permalink($_GET["Country"]));
}
*/
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

		<h3><?=the_field("title_left")?></h3>
	
		<form method="GET" id="travelguide" action="<?php bloginfo('wpurl'); ?>">
		  <select name="Country" id="country-selector">
		 <!-- <select name="Country" id="country-selector" autofocus="autofocus" autocorrect="off" autocomplete="off"> -->
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
		   <li id="c6"><a href="<?php bloginfo('wpurl'); ?>/region/south-africa">South America</a></li>
		  </ul>
		</div>		
		</div>
		<?=the_field("content_left")?>
		
	</div>
			
	<div class="frontpage-column" id="column-right">	

			<a class="button-book" href="<?php bloginfo('wpurl'); ?>/booking"><div class="button-book-title">Book now</div><div class="button-book-meta">Quick and easy</br />online booking</div></a>

			<h3><?=the_field("title_right")?></h3>			

			<?=the_field("content_right")?>	

	</div>
	
	<div class="clinics">
	<?php	$clinics = getClinics();
		foreach($clinics as $clinic):	?>
			<div class="clinic">
				<div class="title"><a href="<?php echo get_permalink($clinic->ID); ?>"><?php echo $clinic->post_title; ?></a></div>
				<div class="address"><?php the_field("address", $clinic->ID); ?></div>
			</div>
		<?php	endforeach;	?>
	</div>

</div><!--#end content -->
<?php get_footer(); ?>
