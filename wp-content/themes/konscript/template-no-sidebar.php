<?php /* Template Name: No Sidebar */ ?>
<?php get_header(); ?>

<div id="content" class="no-sidebar">	
    <?php if (have_posts()): while (have_posts()): the_post(); ?>

        <div class="post">
            <h1><?php the_title(); ?></h1>
            <div class="post-content">
                <?php echo the_content(); ?>
            </div>
	    </div><!--#end post-->
	    		    
    <?php endwhile; endif; ?>
</div><!--#end content -->

<?php get_footer(); ?>
