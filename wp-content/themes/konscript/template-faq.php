<?php /* Template Name: FAQ*/ ?>
<?php get_header(); ?>
<?php get_submenu(); ?>

<section id="primary">
	<div id="content" role="main">
	<h1><?php post_type_archive_title(); ?></h1>
	

		<div class="searchbar-inner" >
			<input type="text" id="searchFaq" placeholder="Type to search" />
			<a href="#" id="clearSearch">Clear</a>
		</div>

		<?php
		$regions = getFaqsGroupedByRegion();
		?>
		
		<?php $args = array(
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_type'       => 'faq'); ?>		
		

		<?php 
		$faqs_list = array();
		foreach(get_posts( $args )  as $faq){	
			$faqs_list[$faq->ID] = array(
				'post_title' => $faq->post_title,
				'post_content' => $faq->post_content				
			);
		} 
		

		
		foreach($regions as $region): ?>
			<p class="region"><?=$region["region_name"]; ?></p>
						
			<?php foreach($region["faqs"] as $faq_id): 
				$faq = $faqs_list[$faq_id];	?>
			 	<div class="slidedown">
					<a href="#" class="title"><?php echo $faq["post_title"]; ?></a>
					<p class="content"><?php echo $faq["post_content"]; ?></p>
				</div>	 				
			<?php endforeach; ?>
		<?php endforeach; ?>
	 	
	
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
