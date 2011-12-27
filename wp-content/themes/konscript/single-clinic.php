<?php get_header(); ?>
<?php include("menus/clinic.php"); ?>
	<div id="content">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<div class="post clinic">
				<a class="button-book" href="<?php bloginfo('wpurl'); ?>/booking/clinic/<?php echo basename(get_permalink()); ?>"><div class="button-book-title">Book your vaccination!</div></a>

				<h1><?php the_title(); ?></h1>
				<div class="post-content">									
					<?php							
					// some text about the clinic
					echo the_content();					
					?>     					
					
					<p class="header">Address</p>
					<?php the_field('address'); ?>
					<p>Phone: <?php the_field('phone_number'); ?></p>
					
					<p class="header">Opening hours</p>
					<table id="opening_hours">
						<?php while(the_repeater_field('opening_hours')): ?>					
							<tr><td><?php the_sub_field('day_of_week'); ?></td><td><?php the_sub_field('hours'); ?></td></tr>									
						<?php endwhile; ?>
					</table>									               
				</div>
			</div><!--#end post-->
		<?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
