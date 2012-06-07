<?php get_header(); ?>
<?php 
$args = array(
	'post_type'	=>'region',
	'title_li'	=> '&nbsp;',
	'echo'			=> false,
);
$sidebar_menu = wp_list_pages( $args ); ?>

<div id="content">
	<div class="page col-full">
		<?php sidebar($sidebar_menu, false, false); ?>
		<section id="main" class="col-left">

			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<div class="post region">
					<header><h1><?php the_title(); ?></h1></header>
					<div class="post-content">

						<form method="GET" class="map-form" action="<?php bloginfo('wpurl'); ?>">
						  <select name="Country" id="country-selector">
					    <option value="" selected="selected">Select Country</option>
							<?php $region = get_post_custom_values('countries');
										$countries = getCountries($region[0]); ?>	
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

						<span> to read more about it, and the recommended vaccinations.</span>

						<img class="region-map" src="<?php bloginfo('template_directory'); ?>/img/continents-<?php echo basename(get_permalink()); ?>.png" alt="<?php echo basename(get_permalink()); ?>" />
		      	
						<div class="country-wrapper">
						<?php

						// get ids of countries in region
						$region = get_post_custom_values('countries');
						
						// get countries
						$countries = getCountries($region[0]);

						// output countries in region
						foreach($countries as $country):
							if(get_field('flag', $country->ID)) { ?>
							<a href="<?php echo get_permalink( $country->ID ); ?>" class="country" title="<?php echo $country->post_title; ?>">
								<img src="<?php the_field('flag', $country->ID); ?>" alt="<?php echo $country->post_title; ?>" />
							</a>
						<?php } endforeach; ?>
						</div>
						
					</div>
				</div><!--#end post-->
			<?php endwhile; endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
