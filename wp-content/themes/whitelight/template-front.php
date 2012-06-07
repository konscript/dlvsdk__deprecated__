<?php /* Template Name: Frontpage */
	  /* OLD DEPRECATED */
?>
<?php get_header(); ?>

<div id="content" class="no-sidebar">	

	<div id="tabs">
	
	<?php if(get_field('tabs')): ?>
		<?php 
			// define variables
			$tab_id = 0; 
			$tabs = "";
		?>	
		<?php while(the_repeater_field('tabs')): ?>    
			<?php 
				// increment tab id
				$tab_id++; 
			?>
				
			<!-- tab content -->
			<div id="tabs-<?=$tab_id;?>">
				<img src="<?php the_sub_field('background_image'); ?>" alt="<?php the_sub_field('title'); ?>" />
				<div class="inner">
					<!--<p class="header"><?php the_sub_field('title'); ?></p>-->
					<p class="body">
						<?php the_sub_field('description'); ?>
						<a href="<?php echo get_permalink(get_sub_field('link')->ID); ?>">Læs mere</a>
					</p>
				</div>
			</div>
				
			<?php 
				// tabs
				$tabs .= '<li><a href="#tabs-'.$tab_id.'"><img src="'.get_sub_field('icon').'" alt="'.get_sub_field('title').'"/><span class="title">'.get_sub_field('title').'</span></a></li>';
			?>			
		<?php endwhile; ?>	 
	<?php endif; ?>	
		 
	 <!-- tabs -->
		<ul	>
			<?php echo $tabs; ?>
		</ul>	 	 
	</div><!-- end #tabs -->

	<div class="frontpage-column" id="column-left">


		
	</div>
			
	<div class="frontpage-column" id="column-right">	

		<a class="button-book" href="<?php bloginfo('wpurl'); ?>/booking"><div class="button-book-title">Bestil tid</div><div class="button-book-meta">Nem og hurtig<br />online bestilling</div></a>
		<h3><?php the_field("title_right"); ?></h3>
		<?php the_field("content_right"); ?>		
	</div>
	
	<div class="clinics">
		<?php	$clinics = getClinics();
		foreach($clinics as $clinic):	?>
		<a href="<?php echo get_permalink($clinic->ID); ?>" class="clinic">
			<div class="title"><?php echo $clinic->post_title; ?></div>
			<div class="address"><?php the_field("address", $clinic->ID); ?></div>
		</a>
		<?php	endforeach;	?>
	</div>

</div><!--#end content -->
<?php get_footer(); ?>
