<?php /* Template Name: News*/ ?>
<?php get_header(); ?>
<?php 
$sidebar_menu = wp_list_categories(array(
	'title_li' => '&nbsp;',
	'echo' => false
)); ?>

<div id="content">
	<div class="page col-full">
		<?php sidebar($sidebar_menu, false, false); ?>
		<section id="main" class="col-left">

			<header><h1><?php the_title(); ?></h1></header>
			
			<?php query_posts( 'posts_per_page=0' ); ?>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="post">
					<h2><?php the_title(); ?></h2>
					<span><em><?php the_time('F jS, Y') ?></em></span>
					<div class="entry">
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>">Read more</a>
					</div>
				</div>
			<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
