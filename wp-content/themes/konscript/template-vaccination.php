<?php /* Template Name: Vaccinations */ ?>
<?php get_header(); ?>
<?php sidebar(true, true, false); ?>

<section id="primary">
	<div id="content" role="main">
		<?php 
			echo '<a class="button-book" href="' . get_bloginfo('wpurl') . '/booking/"><div class="button-book-title">Book your vaccination</div></a>';
		?>
	
		<h1><?php the_title(); ?></h1>		
		<?php echo the_content(); ?>
	
		<?php $args = array(
		'orderby'         => 'title',
		'order'           => 'ASC',
		'numberposts'     => -1,
		'post_type'       => 'vaccination'); ?>
	
		<?php $vaccinations = get_posts( $args ); ?> 
		<table class="zebra">
			<thead><tr><td>Vaccination</td><td>Price</td><td>Quantity</td><td>Protection</td></tr></thead>
			<tbody>
			<?php foreach($vaccinations as $vaccination){ ?>
				<tr>
					<td><a href="<?php echo get_permalink( $vaccination->ID ); ?>"><?php echo $vaccination->post_title; ?></a></td>
					<td><?php the_field("price", $vaccination->ID); ?></td>
					<td><?php the_field("quantity", $vaccination->ID); ?></td>
					<td><?php the_field("duration_of_immunity", $vaccination->ID); //echo $fields["vaccination-duration"][0]; ?></td>
				</tr>		 
			<?php } ?>
			</tbody>
		</table>

	</div><!-- #content -->
</section><!-- #primary -->

<?php get_footer(); ?>
