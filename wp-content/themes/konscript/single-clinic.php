<?php get_header(); ?>
<?php include("menus/clinic.php"); ?>
	<div id="content">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<div class="post clinic">
				<h1><?php the_title(); ?></h1>
				<div class="post-content">
					<?php
					// some text about the clinic
					echo the_content();				 	
					?>                    
				</div>
			</div><!--#end post-->
		<?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
