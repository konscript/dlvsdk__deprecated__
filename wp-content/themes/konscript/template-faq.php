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
		
		 <?php $vaccinations = get_posts( $args ); ?> 

		 <?php foreach($vaccinations as $vaccination):?>	
	 	<div class="single-faq">
			<a href="" class="question"><?php echo $vaccination->post_title; ?></a>
			<p class="answer"><?php echo $vaccination->post_content; ?></p>
		</div>
	 	<?php endforeach; ?>
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
