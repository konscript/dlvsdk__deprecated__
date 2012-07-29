<?php /* Template Name: Vaccinations */ ?>
<?php get_header(); ?>

<div id="content">
	<div class="page col-full">
		<?php sidebar(true, true, false); ?>
		<section id="main" class="col-left">
			<a class="button-book" href="<?php echo get_bloginfo('wpurl'); ?>/booking/"><div class="button-book-title">Bestil vaccination</div></a>
			<header><h1><?php the_title(); ?></h1></header>
			<?php echo the_content(); ?>
		
			<?php $args = array(
			'orderby'         => 'title',
			'order'           => 'ASC',
			'numberposts'     => -1,
			'post_type'       => 'vaccination'); ?>
		
			<?php $vaccinations = get_posts( $args ); ?> 
			<table class="zebra">
				<thead><tr><td>Vaccination</td><td>Pris</td><td>Antal</td><td>Beskyttelse</td></tr></thead>
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
		</section>
	</div>
</div>

<?php get_footer(); ?>
