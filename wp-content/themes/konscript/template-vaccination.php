<?php /* Template Name: Vaccination*/ ?>
<?php get_header(); ?>
<?php the_submenu(); ?>

<section id="primary">
	<div id="content" role="main">
	<h1><?php post_type_archive_title(); ?></h1> 

	<?php echo the_content(); ?>
	
	<?php $args = array(
	'orderby'         => 'title',
	'order'           => 'ASC',
	'numberposts'     => -1,
	'post_type'       => 'vaccination'); ?>
	

	<?php $vaccinations = get_posts( $args ); ?> 
	<table id="vaccinations">
		<thead><tr><td>Vaccination</td><td>Pris</td><td>Antal</td><td>Beskyttelse</td></tr></thead>
		<tbody>
		<?php foreach($vaccinations as $vaccination){ ?>
			<tr>
				<td><a href="<?php echo get_permalink( $vaccination->ID ); ?>"><?php echo $vaccination->post_title; ?></a></td>
				<td><?php the_field("price", $vaccination->ID); ?></td>
				<td><?php the_field("quantity", $vaccination->ID); ?></td>
				<td><?php //echo $fields["vaccination-duration"][0]; ?></td>
			</tr>		 
		<?php } ?>
		</tbody>
	</table>

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
