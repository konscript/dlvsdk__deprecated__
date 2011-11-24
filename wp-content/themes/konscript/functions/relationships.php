<?php

/*
 * Relationships:
 * Regions <> FAQ
 * Regions <> Country
 *
 * get all the FAQs relevant for a country 
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
		$countries = empty($countries[0]) ? array() : explode(",", $countries[0]);		

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
 * get all FAQs grouped by region
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
		$faqs = empty($faqs[0]) ? array() : explode(",", $faqs[0]);		

		// only add region to data array, if there are any faqs
		if(count($faqs) > 0){
			$data[] = array(
				"region_name" => $region->post_title,
				"faqs" => $faqs
			);
		}
	}
	
	return $data;
}

/*
 * get all FAQs grouped by term
 ********/
function getFaqsGroupedByTerm(){
	$data = array();
	
	// get terms for the taxonomy "faq_category"
	$terms = get_terms( "faq_category" );
	
	foreach($terms as $term){
		// get faq_ids related to the current term
		$faqs = get_objects_in_term( $term->term_id, "faq_category" );							

		// only add term to data array, if there are any faqs
		if(count($faqs) > 0){
			$data[] = array(
				"term_name" => $term->name,
				"faqs" => $faqs
			);				
		}		
	}
	return $data;
}

/*
 * get FAQS ordered by date
 ********/
function getFaqs(){
	$args = array(
	'orderby'  		=> 'post_date',
	'order'    		=> 'DESC',
	'post_type'		=> 'faq',
	'numberposts'				=>	'-1',
	); 

	// get faqs
	$faqs = array();	
	
	foreach(get_posts( $args )  as $faq){	
		$faqs[$faq->ID] = array(
			'post_title' => $faq->post_title,
			'post_content' => $faq->post_content				
		);
	} 		
	return $faqs;	
}

/*
 * get countries ordered by name
 ********/
function getCountries(){
	$args = array(
		'post_type'       => 'country',
		'orderby'         => 'post_title',
		'order'           => 'DESC'
	); 

	// get countries
	$countries = array();
	foreach(get_posts( $args )  as $country){
		$countries[$country->ID] = array(
			'post_title' => $country->post_title,
			'post_content' => $country->post_content				
		);
	} 		
	return $countries;	
}
?>
