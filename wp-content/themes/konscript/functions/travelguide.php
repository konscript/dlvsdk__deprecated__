<?php
/*
 * generation of the travelguide. Fetches all countries and makes them sortable with jQuery
 */
 
 function getListOfCountries(){
 	$args = array(
	'orderby'         => 'title',
	'order'           => 'ASC',
	'numberposts'     => -1,
	'post_type'       => 'country');
	
	return get_posts( $args ); 
 }

function travelguide(){ ?>

	<p id="travelguide-before">Type your destination</p>
	
  <form method="GET" id="travelguide" action="<?php bloginfo('wpurl'); ?>">
    <select name="Country" id="country-selector" autofocus="autofocus" autocorrect="off" autocomplete="off">
      <option value="" selected="selected">Select Country</option>
		<?php $countries = getListOfCountries() ?>	
		<?php foreach($countries as $country): ?>
			<?php 
				$alt_spellings = get_field('alternative_spellings', $country->ID);
				$country_name = $country->post_title;
				$country_slug = get_permalink($country->ID);				
			?>					
	      <option value="<?= $country->ID; ?>" data-alternative-spellings="<?php echo $alt_spellings; ?>"><?=$country_name; ?></option>					
		<?php endforeach; ?>
    </select>
    <input type="Submit" value="Find">
  </form>	

	<p id="travelguide-after">or click on the map:</p>
		
	<?php 
} 

function redirectTravelGuide() {
	if(isset($_GET["Country"])){
		header("Location: ".get_permalink($_GET["Country"]));
	}
}

