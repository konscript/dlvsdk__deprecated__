<?php
/**
 * Homepage Streamer Panel
 */
	
?>
	<section id="streamer" class="home-section fix">
		<h1><span class="highlight"><?php echo __("Ny mobil app", "dlvs"); ?></span>
			<span><?php echo __(", helt gratis", "dlvs"); ?></span><br /> 
			<span><?php echo __("- tag lægen med på rejsen.","dlvs"); ?></span>
		</h1>
		<div class="phone">
			<img src="<?php bloginfo('template_directory'); ?>/images/dlvs/frontpage-iphone.png" alt="iPhone app" />
		</div>
		<div class="icons">
			Hent den i <br />
			<a href="http://itunes.apple.com/dk/app/l-gens-rejserad/id505336046?mt=8"><img src="<?php bloginfo('template_directory'); ?>/images/dlvs/app-iphone-small.png" alt="iPhone App Store" /></a>
			<a href="https://market.android.com/details?id=lbi.android.dlvs"><img src="<?php bloginfo('template_directory'); ?>/images/dlvs/app-android-small.png" alt="Android Market" /></a>
		</div>		
	</section>
	
	<?php wp_reset_query(); ?>