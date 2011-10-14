<?php /* Template Name: News*/ ?>
<?php get_header(); ?>
<?php include("submenu-cat.php"); ?>


<div id="content">
	<h1><?php wp_title(''); ?></h1>
	
	<?php query_posts( 'posts_per_page=0' ); ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="post">
			<h2><?php the_title(); ?></h2>
			<small><?php the_time('F jS, Y') ?></small>
			<div class="entry">
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>">Read more</a>
			</div>
		</div>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
