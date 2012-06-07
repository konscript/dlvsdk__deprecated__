<?php /* Template Name: Booking */ ?>
<?php get_header(); ?>
<div id="content">
	<div class="page col-full">
		<section class="col-full template booking">
			<header><h1><?php the_title(); ?></h1></header>
			
			<?php
									
			// destination
			$clinic_param = urldecode($wp_query->query_vars['clinic_param']);		
			$destination_param = urldecode($wp_query->query_vars['destination_param']);
			
			/*
			
			$args = array(
			'orderby'         => 'title',
			'order'           => 'ASC',
			'numberposts'     => -1,
			'post_type'       => 'clinic'); ?>

			<?php $clinics = get_posts( $args ); ?> 
			
			<div class="form">
				<form id="booking">
					<label for="name">Name:</label><div class="fieldWrapper"><input type="text" name="fullname" id="fullname"></div>
					<label for="email">Email:</label><div class="fieldWrapper"><input type="text" name="email" id="email"></div>															
					<label for="phone">Phone: +44</label><div class="fieldWrapper"> <input type="text" name="phone" id="phone"></div>																
					<label for="comments">Comments:</label><div class="fieldWrapper textarea"><textarea name="comments" id="comments"></textarea></div>
					<label for="destination">Travel destination:</label><div class="fieldWrapper"><input type="text" name="destination" id="destination" value="<?php echo $destination_param ?>"></div>																
					
					<label for="clinic">Clinic:</label>
					<div class="fieldWrapper select">
						<select name="clinic" id="clinic">
							<option data-url="about:blank" value="">Choose your clinic</option>																				
								<?php foreach($clinics as $clinic){
									
									$slug = $clinic->post_name;
									$selected = ( $clinic->post_name == $clinic_param ) ? "selected" : "";
									$booking_url = trim(get_field("booking_url", $clinic->ID));										
									$address = get_field("address", $clinic->ID);
									$title = $clinic->post_title;																				
									if ($booking_url) {
										echo'<option '.$selected.' data-url="'.$booking_url.'" value="London">'.$title.' - ' . $address . '</option>';
									}
								}	?>
						</select>						
					</div>
					<label for="participants">Number of people:</label>
					<div id="participants" class="fieldWrapper radio people">
						<input type="radio" name="participants" value="1" checked="checked" />
						<input type="radio" name="participants" value="2" />
						<input type="radio" name="participants" value="3" />
						<input type="radio" name="participants" value="4" />
						<input type="radio" name="participants" value="5" />
						<input type="radio" name="participants" value="6" />																												
						<input type="radio" name="participants" value="7" /><br />
						<span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7+</span>
<!--					<select name="participants" id="participants">
							<option value="1">1-2 persons</option>
							<option value="2">3-4 persons</option>
							<option value="3">5-6 persons</option>
						</select>						-->
					</div>					
				</form>
				<a class="button-book	button-book-step next" id="navigateStepNext"><div class="button-book-title">Choose time  ➥</div></a><a class="button-book	button-book-step next" id="navigateStepBack"><div class="button-book-title">Edit</div></a>					
			</div>
			
			<div class="iframe">
				<div class="iframe-placeholder">
					<?php echo get_the_post_thumbnail($id, array(440,600)); ?>
					<?php echo the_content(); ?>
				</div>
				<iframe src="about:blank" frameborder="0" width="100%" height="600"></iframe>
			</div>
			*/				
			?>
			<?php $weekdays = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday"); ?>						
			<iframe src="about:blank" frameborder="0" width="100%" height="600" style="display:none"></iframe>		
			<table class="zebra">
				<thead>
					<td>Clinic</td>
					<?php	foreach($weekdays as $weekday): ?>
						<td><?php echo ucfirst($weekday); ?></td>
					<?php	endforeach; ?>
					<td>&nbsp;</td>							
				</thead>						
				<?php	$clinics = getClinics(); ?>
				<?php foreach($clinics as $clinic): ?>	
					<tr>
						<td><?php	the_field("address", $clinic->ID); ?></td>
						<?php	foreach($weekdays as $weekday): ?>
							<td><?php	the_field($weekday, $clinic->ID); ?></td>
						<?php	endforeach; ?>	
						<td><a class="button-book	button-book-table" href="<?php the_field("booking_url", $clinic->ID); ?>"><div class="button-book-title">Bestil tid</div></a></td>
					</tr>
				<?php	endforeach; ?>
			</table>
		</div>
	</div>
</div>

<?php get_footer(); ?>

