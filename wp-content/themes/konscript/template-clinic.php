<?php /* Template Name: Clinic*/ ?>
<?php get_header(); ?>
<?php get_submenu(); ?>

<section id="primary">
	<div id="content" role="main">
	<h1><?php post_type_archive_title(); ?></h1> 

	<?php $args = array(
	'orderby'         => 'title',
	'order'           => 'ASC',
	'numberposts'     => -1,
	'post_type'       => 'clinic'); ?>

	<?php $clinics = get_posts( $args ); ?> 

	<?php
		// get destination param
		$destination = urldecode($wp_query->query_vars['destination']);
	?>
	
		<?php echo the_content(); ?>

		<?php foreach($clinics as $clinic){ ?>

			<?php
				// append destination param to url
				$url = empty($destination) ? get_permalink( $clinic->ID ) : get_permalink( $clinic->ID ) . "destination/".$destination;
			?>	 	
	
			<p><a href="<?php echo $url; ?>"><?php the_title(); ?></a></p>

		<?php } ?>



	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
