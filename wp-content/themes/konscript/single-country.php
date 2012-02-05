<?php get_header(); ?>
<?php 
// Sidebar menu
$args = array(
  'post_type'=>'region',
  'title_li'=> '&nbsp;',
  'echo'         => false,  
);
$sidebar_menu = wp_list_pages( $args );
$sidebar_country_meta_links = '<a href="'.get_field('latest_disease_surveillance').'" target="_blank">Latest Disease Surveillance</a>';
if (get_field('updated_malaria_map')) {
	$sidebar_country_meta_links .= '<br /><a href="'.get_field('updated_malaria_map').'" target="_blank">Updated Malaria Map</a>';
}
$sidebar_country_meta = '
	<div class="country-meta-header">Country Facts</div>
	<table class="country-meta">
		<tbody>
		<tr>
			<td><strong>Capital:</strong></td>
			<td>'.get_field('capital').'</td>
		</tr>
		<tr>
			<td><strong>Population:</strong></td>
			<td>'.get_field('population').'</td>
		</tr>
		<tr>
			<td colspan="2">
				'.get_field('embassy_info').'
			</td>
		</tr>
		<tr>
			<td colspan="2">
				'.$sidebar_country_meta_links.'		
			</td>
		</tr>				
		</tbody>
	</table>';
sidebar($sidebar_menu, false, $sidebar_country_meta); ?>

	<div id="content">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <div class="post country">
		        
						<?php if(get_field('flag')) { ?>
							<div class="country-flag">
								<img src="<?php echo get_field('flag'); ?>" />
							</div>
						<?php } ?>
						
						<h1><?php the_title(); ?></h1>

						<?php 
							$destination = urlencode(the_title('', '', false));
							$book_button = '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/destination/' . $destination . '"><div class="button-book-title">Book your vaccination</div></a>';
							echo $book_button;
						?>
		
						<div class="post-content">	

						<?php							
							$already_outputted = array();
												
							// labels for groups
							$vaccinations_groups_labels = array(
								"All travellers", "+2 weeks", "+3 months", "+6 months"
							);
							
							// vaccinations for groups
							$vaccinations_groups = array();
							$vaccinations_groups[1] = get_field('group_1');
							$vaccinations_groups[2] = get_field('group_2');
							$vaccinations_groups[3] = get_field('group_3');
							$vaccinations_groups[4] = get_field('group_4');						
						?>		
						<table id="vaccinations_groups">
							<thead>
								<tr>
									<td>&nbsp;</td>
									<?php foreach($vaccinations_groups_labels as $label): ?>
										<td><?=$label?></td>
									<?php endforeach; ?>							
								</tr>
							</thead>
							<tbody>							
							<?php foreach($vaccinations_groups as $group_id => $group): ?>
								<?php if(!empty($group)): ?>								
									<?php foreach($group as $vaccination): ?>									
										<?php
											// make sure every vaccine is only outputted once (somebody may have added a vaccine to multiple groups)									
											if(!in_array($vaccination->ID, $already_outputted)):
												$already_outputted[] = $vaccination->ID;										
												?>									
												<tr>	
													<td class="vaccination-name"><a href="<?php echo get_permalink( $vaccination->ID ); ?>"><?php echo $vaccination->post_title; ?></a></td>
													<?php 
													// output cell with vaccination indicator
													$checkmark = '<img src="'.get_bloginfo("template_url").'/img/checkmark.png"/>';
												
													$repeat_in_next_group = false;
													for ( $counter = 1; $counter <= count($vaccinations_groups_labels); $counter++) {
														echo "<td>";
														if($counter == $group_id || $repeat_in_next_group === true){
															$repeat_in_next_group = true;
															echo $checkmark;
														}else{
															echo "-";
														}
														echo "</td>";
													}
													?>
												</tr>
											<?php endif; ?>		
									<?php endforeach; ?>
								<?php endif; ?>			
							<?php endforeach; ?>	
							</tbody>
						</table>		
						
						<!-- <h3>FAQ</h3> -->
						<?php /*
							$country_id = get_the_ID();
							$faqs = getFaqsByCountry($country_id); 
						*/ ?>			
						<!-- <div class="accordion"> -->
						<?php /* foreach($faqs as $id => $faq):
							echo slidedown($faq["post_title"], $faq["post_content"], $id);
						endforeach; */ ?>		
						<!-- </div> -->

						<!-- <h3>Description</h3> -->
					 	<?php //echo the_content(); ?>											
					</div>					 						 
		    </div><!--#end post-->
        <?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
