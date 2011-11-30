<?php /* Template Name: Booking*/ ?>

<div id="booking">
	<h1><?php post_type_archive_title(); ?></h1> 

	<?php $args = array(
	'orderby'         => 'title',
	'order'           => 'ASC',
	'numberposts'     => -1,
	'post_type'       => 'clinic'); ?>

	<?php $clinics = get_posts( $args ); ?> 

	<?php
		// get destination param
		$destination = urldecode($wp_query->query_vars['destination']);
	?>

	<?php echo the_content(); ?>

	<div class="accordion">
		<?php foreach($clinics as $clinic){ 

			// append destination param to url
			$url = empty($destination) ? get_permalink( $clinic->ID ) : get_permalink( $clinic->ID ) . "/destination/".$destination;
			$address = get_field("address", $clinic->ID);
			$phone = get_field("phone_number", $clinic->ID);	

			$accordion_content = "Address: $address Phone: $phone";
			echo slidedown($clinic->post_title, $accordion_content, $url);	
		} 
		?>
	</div>
</div>
		
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/screen.js"></script>	 		
	
