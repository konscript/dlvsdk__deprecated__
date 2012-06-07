<?php if(!$_GET["ajax"]){
	get_header();

	$args = array(
	  'post_type'=>'vaccination',
	  'title_li'=> '&nbsp;',
	  'echo' => false,  
	);
	$sidebar_menu = wp_list_pages( $args );
} ?>

<div id="content">
	<div class="page col-full">
		<?php if(!$_GET["ajax"]){ sidebar($sidebar_menu, false, false); } ?>
		<section id="main" class="col-left">

			<?php 
				echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/"><div class="button-book-title">Book your vaccination</div></a>';
			?>

			<?php if (have_posts()): while (have_posts()): the_post(); ?>
			    <div class="post">
			        <header><h1><?php the_title(); ?></h1></header>
			        <div class="post-content">
						<?php	the_content();	 ?>  
	            	</div>
					<div class="accordion">						 							
						<?php echo slidedown("Vaccine contents", get_field("vaccine_contents")); ?>							
						<?php echo slidedown("Who should be vaccinated?", get_field("who_should_be_vaccinated")); ?>
						<?php echo slidedown("Vaccination dosis", get_field("vaccination_dosis")); ?>
						<?php echo slidedown("Who should not be vaccinated?", get_field("who_should_not_be_vaccinated")); ?>
						<?php echo slidedown("Pregnancy and lactation", get_field("pregnancy_and_lactation")); ?>
						<?php echo slidedown("Duration of immunity", get_field("duration_of_immunity")); ?>
						<?php echo slidedown("Most frequent side effects", get_field("side_effects")); ?>							                 
					</div>														
			    </div><!--#end post-->
	        <?php endwhile; endif; ?>
		</section>
	</div>
</div>

<?php 
if(!$_GET["ajax"]){
	get_footer(); 
}	
?>
