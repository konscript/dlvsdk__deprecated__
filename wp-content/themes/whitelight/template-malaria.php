<?php /* Template Name: Malaria */ ?>
<?php get_header(); ?>

<div id="content">
	<div class="page col-full">
		<?php sidebar(true, true, false); ?>
		<section id="main" class="col-left">

			<?php 
				echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/"><div class="button-book-title">Book your vaccination</div></a>';
			?>		
		
			<header><h1><?php the_title(); ?></h1></header>
			<?php echo the_content(); ?>
		
		</section>
	</div>
</div>

<?php get_footer(); ?>
