<?php if(!$_GET["ajax"]){
	get_header();

	$args = array(
	  'post_type'=>'vaccination',
	  'title_li'=> '&nbsp;',
	  'echo' => false,  
	);
	$sidebar_menu = wp_list_pages( $args );
	sidebar($sidebar_menu, false, false);
} ?>

	<div id="content">

		<?php if (have_posts()): while (have_posts()): the_post(); ?>
		    <div class="post">
		        <h1><?php the_title(); ?></h1>
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
	</div><!--#end content -->

<?php 
if(!$_GET["ajax"]){
	get_footer(); 
}	
?>
