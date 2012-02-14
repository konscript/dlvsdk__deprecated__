<?php /* Template Name: Iframe */ ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> <?php the_title(); ?> &raquo; <?php bloginfo('name'); ?></title>
	
	<meta name="description" content="<?php if (have_posts()): while (have_posts()): the_post(); echo strip_tags(get_the_excerpt()); endwhile; endif; ?>" />
	
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed (<?php bloginfo('language'); ?>)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--Stylesheets-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheet/compiled/ie.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheet/compiled/print.css" type="text/css" media="print" charset="utf-8" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/stylesheet/compiled/main.css" type="text/css" media="screen" charset="utf-8" />
	
	<?php wp_head(); ?>
	
	<!--Scripts--> 
	<?php // NOTE: We are enqueing jQuery from Google CDN in the functions.php. If it doesn't load we grab the local version ?>
	<script>!window.jQuery && document.write('<script src="scripts/jquery-1.6.2.min.js"><\/script>')</script>

</head>
<body <?php body_class(); ?>>

	<?php echo the_content(); ?>

	<div class="hide">
		<?php wp_footer(); ?>
	</div>

</body>
</html>
