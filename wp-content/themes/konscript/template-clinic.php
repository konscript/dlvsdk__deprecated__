<?php /* Template Name: Clinic*/ ?>
<?php get_header(); ?>
<?php
// Sidebar menu
$args = array(
  'post_type'=>'clinic',
  'title_li'=> '&nbsp;',
  'echo' => false,  
);
$sidebar_menu = wp_list_pages( $args );
$clinic = basename(get_permalink());
$sidebar_book = '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/clinic/' . $clinic . '"><div class="button-book-title">Book your vaccination</div></a>';
the_submenu($sidebar_menu . $sidebar_book); ?>

<section id="primary">
	<div id="content" role="main">
	<h1><?php post_type_archive_title(); ?></h1> 


	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
