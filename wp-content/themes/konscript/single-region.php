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

<div id="content">
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="post region">
			<a class="button-book" href="<?php bloginfo('wpurl'); ?>/booking-popup">Book!</a>
			<h1><?php the_title(); ?></h1>
			<div class="post-content">
      	Please click a country below, to read more about it, and the recommended vaccinations.
				<?php
				// list of all countries
				$countries = getCountries();
			
				// region data
				$region = get_post_custom_values('countries');
			
				// ids of countries in region
				$country_ids = explode(",", $region[0]);

				// output countries in region
				foreach($country_ids as $country_id): ?>
					<p><a href="<?php echo get_permalink( $country_id ) ?>"><?php echo $countries[$country_id]['post_title']; ?></a></p>
				<?php endforeach;	?>
				
			</div>
		</div><!--#end post-->
	<?php endwhile; endif; ?>
</div><!--#end content -->

<?php get_footer(); ?>
