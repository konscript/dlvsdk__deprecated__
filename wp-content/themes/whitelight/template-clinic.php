<?php /* Template Name: Clinics */ ?>
<?php get_header(); ?>
<?php
// Sidebar menu
$args = array(
  'post_type'=>'clinic',
  'title_li'=> '&nbsp;',
  'echo' => false,  
);
$sidebar_menu = wp_list_pages( $args );
sidebar($sidebar_menu, true, false); ?>

<section id="primary">
	<div id="content" role="main">
	
	<?php 
	$clinic = basename(get_permalink());
	echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/clinic/' . $clinic . '"><div class="button-book-title">Bestil vaccination</div></a>';
	?>
	<h1><?php the_title(); ?></h1> 		
	<?php echo the_content(); ?>	

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
