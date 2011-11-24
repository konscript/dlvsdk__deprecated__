<?php get_header(); ?>
<?php get_submenu(); ?>
<div id="content">
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="post clinic">
			<h1><?php the_title(); ?></h1>
			<div class="post-content">



			<?php
			$countries = get_post_custom_values('countries');		
			$countries = explode(",", $countries[0]);					
			debug($countries);
			
			?>
				
			</div>
		</div><!--#end post-->
	<?php endwhile; endif; ?>
</div><!--#end content -->

<?php get_footer(); ?>
