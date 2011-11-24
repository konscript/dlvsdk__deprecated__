<?php /* Template Name: FAQ*/ ?>
<?php get_header(); ?>
<?php 
$args = array(
  'post_type'=>'region',
  'title_li'=> '&nbsp;',
  'echo'         => false,  
);
$menu = wp_list_pages( $args );
?>
<?php the_submenu($menu); ?>

<section id="primary">
	<div id="content" role="main">
	<div class="post faq">
		<h1><?php post_type_archive_title(); ?></h1>	
		
			<?php echo the_content(); ?>

			<div class="searchbar-inner" >
				<input type="text" id="searchFaq" placeholder="Type to search" />
				<a href="#" id="clearSearch">Clear</a>
			</div>

			<?php 		
			// get regions and their related faq_id. Eg. Asia: 231, 234..
			$regions = getFaqsGroupedByRegion();					
			$terms = getFaqsGroupedByTerm();								
			$faqs = getFaqs();		
			?>					
		
			<?php foreach($regions as $region): ?>
				<h3><?=$region["region_name"]; ?></h3>
				<?php foreach($region["faqs"] as $faq_id): 
					$faq = $faqs[$faq_id];	
					echo slidedown($faq["post_title"], $faq["post_content"], $faq_id);
				endforeach;
			endforeach; ?>
			
			<?php foreach($terms as $term): ?>
				<h3><?=$term["term_name"]; ?></h3>
				<?php foreach($term["faqs"] as $faq_id): 
					$faq = $faqs[$faq_id];	
					echo slidedown($faq["post_title"], $faq["post_content"], $faq_id);
				endforeach;
			endforeach; ?>			
 		</div>	
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
