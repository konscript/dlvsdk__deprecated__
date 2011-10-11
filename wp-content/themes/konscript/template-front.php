<?php /* Template Name: Frontpage*/ ?>

<?php get_header(); ?>

<div id="content">	
	<div id="flash-banner">
		<object id="d1f1b4e1-d3d1-4cb6-927b-efa73ea74b86" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="216" width="920" style="visibility: visible; ">
		<param name="movie" value="<?php bloginfo('template_url'); ?>/img/banner.swf">
		<param name="loop" value="true">
			<object type="application/x-shockwave-flash" data="<?php bloginfo('template_url'); ?>/img/banner.swf" height="216" width="920" loop="true" id="mutetabId7184431">
			<a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"></a>
			</object>
		</object>
	</div>
	
	<div id="shortcuts">
		<div class="shortcut">
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/fane_rejse.jpg" /></div>
			<div>
				<h3>Going travelling?</h3>
				<a href="">Find recommended vaccinations</a>
			</div>
		</div>
		
		<div class="shortcut">
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/front_helbred.gif" /></div>
			<div>
				<h3>Vaccines</h3>
				<a href="">Prices and side effects</a>
			</div>
		</div>
		
		<div class="shortcut">
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/forside_rejseapotektet.gif" /></div>
			<div>
				<h3>Travel wiki</h3>
				<a href="">Advice on the run</a>
			</div>
		</div>			
	</div>

	<div id="column-left">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('left_column')) : else : ?>
		<p><strong>Widget Ready</strong></p>
		<p>This left_column is widget ready! Add one in the admin panel.</p>
	<?php endif; ?>
	</div>
		
	<div id="column-center">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('center_column')) : else : ?>
		<p><strong>Widget Ready</strong></p>
		<p>This center_column is widget ready! Add one in the admin panel.</p>
	<?php endif; ?>

	</div>
		
	<div id="column-right">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('right_column')) : else : ?>
		<p><strong>Widget Ready</strong></p>
		<p>This right_column is widget ready! Add one in the admin panel.</p>
	<?php endif; ?>
	</div>


</div><!--#end content -->

<?php get_footer(); ?>
