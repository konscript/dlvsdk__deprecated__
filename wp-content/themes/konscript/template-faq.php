<?php /* Template Name: FAQs */ ?>
<?php get_header(); ?>
<?php sidebar(true, true, false); ?>

<section id="primary">
	<div id="content" role="main">
	<div class="post faq">
		<h1><?php the_title(); ?><?php //post_type_archive_title(); ?></h1>	
		
			<?php echo the_content(); ?>

				<input type="text" id="searchFaq" placeholder="Type to search" />
				<a href="#" id="clearSearch">x</a>

			<?php 		
				// get regions and their related faq_id. Eg. Asia: 231, 234..
				$regions = getFaqsGroupedByRegion();					
				$terms = getFaqsGroupedByTerm();								
				$faqs = getFaqs();						
			?>					

			<?php foreach($regions as $region): ?>
				<h3><?=$region["region_name"]; ?></h3>
			 	<div class="accordion">
					<?php foreach($region["faqs"] as $faq_id): 					
						$faq = $faqs[$faq_id];							
						echo slidedown($faq["post_title"], $faq["post_content"], $faq_id);
					endforeach; ?>
				</div>
			<?php endforeach; ?>
			
			<?php foreach($terms as $term): ?>
				<h3><?=$term["term_name"]; ?></h3>
				<div class="accordion">				
					<?php foreach($term["faqs"] as $faq_id): 
						$faq = $faqs[$faq_id];	
						echo slidedown($faq["post_title"], $faq["post_content"], $faq_id);
					endforeach; ?>
				</div>
			<?php endforeach; ?>
 		</div>	
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
