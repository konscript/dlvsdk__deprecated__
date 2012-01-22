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

	<div id="content">
		<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<div class="post clinic">

				<h1><?php the_title(); ?></h1>
				<div class="post-content">									
					<?php							
					// some text about the clinic
					echo the_content();					
					?>     					
					
					<div class="contact">	
						<p class="header">Contact</p>
						<p><img src="<?php bloginfo('template_url'); ?>/img/icon-address.png">Address: <?php the_field('address'); ?>, <?php the_field('city'); ?></p>					
						<p><img src="<?php bloginfo('template_url'); ?>/img/icon-telephone.png">Phone: <?php the_field('phone_number'); ?></p>
					</div>	
				
					<div class="opening_hours">	
						<p class="header">Opening hours</p>
						<table class="zebra">
							<?php while(the_repeater_field('opening_hours')): ?>					
								<tr><td><?php the_sub_field('day_of_week'); ?></td><td><?php the_sub_field('hours'); ?></td></tr>									
							<?php endwhile; ?>
						</table>			
					</div>
					
					<div class="gmap"><?php the_field('map'); ?></div>
				</div>
			</div><!--#end post-->
		<?php endwhile; endif; ?>
	</div><!--#end content -->

<?php get_footer(); ?>
