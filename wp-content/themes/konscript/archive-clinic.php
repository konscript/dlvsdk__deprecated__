<?php get_header(); ?>
<?php get_submenu(); ?>

<div id="content">
	<h1><?php wp_title(''); ?></h1>
		
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
			// get destination param
			$destination = urldecode($wp_query->query_vars['destination']);
	
			// append destination param to url
			$url = empty($destination) ? get_permalink() : get_permalink() . "destination/".$destination;
		?>	 	
	
		<p><a href="<?php echo $url; ?>"><?php the_title(); ?></a></p>

	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
