<?php /* Template Name: Malaria */ ?>
<?php get_header(); ?>
<?php sidebar(true, true, false); ?>

<section id="primary">
	<div id="content" role="main">
		<?php 
			echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/"><div class="button-book-title">Book your vaccination</div></a>';
		?>		
	
		<h1><?php the_title(); ?></h1>		
		<?php echo the_content(); ?>
	
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
