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
	
  <form method="POST" id="travelguide" action="/">
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
		
	<?php 
} 

function redirectTravelGuide() {
	if(isset($_POST["Country"])){
		header("Location: ".get_permalink($_POST["Country"]));
	}
}

