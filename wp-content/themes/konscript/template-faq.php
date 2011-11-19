<?php /* Template Name: FAQ*/ ?>
<?php get_header(); ?>
<?php get_submenu(); ?>

<section id="primary">
	<div id="content" role="main">
	<h1><?php post_type_archive_title(); ?></h1>
		
		<?php $args = array(
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_type'       => 'faq'); ?>		
		
		 <?php $faqs = get_posts( $args ); ?> 

		 <?php foreach($faqs as $faq):?>	
	 	<div class="slidedown">
			<a href="#" class="title"><?php echo $faq->post_title; ?></a>
			<p class="content"><?php echo $faq->post_content; ?></p>
		</div>
	 	<?php endforeach; ?>
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
