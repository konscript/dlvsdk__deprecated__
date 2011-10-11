<?php /* Template Name: Vaccination*/ ?>
<?php get_header(); ?>
<?php get_submenu(); ?>

<section id="primary">
	<div id="content" role="main">
	<h1><?php post_type_archive_title(); ?></h1> 

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
			<?php $fields = get_post_custom($vaccination->ID); ?>			
			
			<tr>
				<td><a href="<?php echo get_permalink( $vaccination->ID ); ?>"><?php echo $vaccination->post_title; ?></a></td>
				<td><?php echo $fields["vaccination-price"][0]; ?></td><td><?php echo $fields["vaccination-quantity"][0]; ?></td>
				<td><?php echo $fields["vaccination-duration"][0]; ?></td>
			</tr>		 
		<?php } ?>
		</tbody>
	</table>

	<?php //echo the_content(); ?>
	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
