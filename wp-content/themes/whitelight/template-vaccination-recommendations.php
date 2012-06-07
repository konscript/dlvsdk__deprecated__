<?php /* Template Name: Vaccination recommendations */ ?>
<?php get_header(); ?>

<div id="content">
	<div class="page col-full">
		<?php sidebar(true, true, false); ?>
		<section id="main" class="col-left">

			<a class="button-book" href="<?php echo get_bloginfo('wpurl'); ?>'/booking/"><div class="button-book-title">Bestil vaccination</div></a>
			<header><h1><?php the_title(); ?></h1></header>
			<?php echo the_content(); ?>

			<div id="map-wrapper">

				<h3 class="map-header">Hvilke vacciner anbefales?</h3>
			
				<div class="map-form-container">
					<form method="GET" class="map-form" action="<?php bloginfo('wpurl'); ?>">
					  <select name="Country" id="country-selector">
						<option value="" selected="selected">Vælg land</option>
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
					<span class="map-text">eller klik på kortet:</span>
				</div>
				
				<div id="map-continents">
				  <ul id="continents">
				   <li id="c1"><a href="<?php bloginfo('wpurl'); ?>/region/africa">Afrika</a></li>
				   <li id="c2"><a href="<?php bloginfo('wpurl'); ?>/region/asia">Asien</a></li>
				   <li id="c3"><a href="<?php bloginfo('wpurl'); ?>/region/oceania">Oceanien</a></li>
				   <li id="c4"><a href="<?php bloginfo('wpurl'); ?>/region/europe">Europa</a></li>
				   <li id="c5"><a href="<?php bloginfo('wpurl'); ?>/region/north-america">Nord Amerika</a></li>
				   <li id="c6"><a href="<?php bloginfo('wpurl'); ?>/region/south-america">Syd Amerika</a></li>
				  </ul>
				</div>		
			</div>		
		</section>
	</div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/continents-map/continents-map.js"></script> 
<?php get_footer(); ?>
