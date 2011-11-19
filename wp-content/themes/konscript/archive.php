<?php get_header(); ?>
<?php 
	$submenu = wp_list_categories(array(
		'title_li' => '&nbsp;',
		'echo' => false
	));
	get_submenu($submenu); 
?>


<div id="content">
	<h1><?php wp_title(''); ?></h1>
	
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
