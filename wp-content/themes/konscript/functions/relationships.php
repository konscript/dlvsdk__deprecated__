<?php

/*
 * Relationships:
 * Regions <> FAQ
 * Regions <> Country
 *
 * Now we will find all the FAQs relevant for a country 
 ********/
function getFaqsByCountry($country_id){
	$data = array();

	// get all regions
	$regions = get_posts( array('post_type' => 'region') ); 

	// loop through regions
	foreach($regions as $region){
		// region id
		$region_id = $region->ID; 		
	
		// fetch countries in region
		$countries = get_post_custom_values('countries', $region_id);		
		$countries = explode(",", $countries[0]);		

		// search through all countries in region. Look for the current country (country_id)
		if(in_array($country_id, $countries)){
			$faqs = get_post_custom_values('faqs', $region_id);
			
			// if there are not FAQs for this country, return an empty string
			$faqs = empty($faqs[0]) ? array() : explode(",", $faqs[0]);	
			
			foreach($faqs as $faq){ 
				$faq = get_post( $faq );
				$data[] = array($faq->post_title, $faq->post_content);			
			}
		}
	}
	
	return $data;
}

/*
 * Now we will find all FAQs grouped by region
 ********/
function getFaqsGroupedByRegion(){
	$data = array();

	// get all regions
	$regions = get_posts( array('post_type' => 'region') ); 

	// loop through regions
	foreach($regions as $region){
		// region id
		$region_id = $region->ID; 		
	
		// fetch faqs in region
		$faqs = get_post_custom_values('faqs', $region_id);		
		$faqs = explode(",", $faqs[0]);		

		$data[] = array(
			"region_name" => $region->post_title,
			"faqs" => $faqs
		);
	}
	
	return $data;
}

?>
