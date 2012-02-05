
	</div><!--#end container-->
	<div id="footer-container">
		<div id="footer">			
			<div class="text">
				<?php //echo get_num_queries()." queries."; ?> 						
         Gladsaxevej 376, 2860 Søborg, Denmark • Phone: +45 70254080 • Fax: +45 70259041 • Email: info@dlvs.dk
       </div>
       <div class="logo">
       	<img src="<?php bloginfo('template_url'); ?>/img/dlvs-12-grayscale.png" alt="UK Travel Vaccination Service" />
       </div>
		</div><!--#end footer-->
	</div><!--#end footer-->	
</div><!--#end wrapper-->

<div class="hide">
	<?php wp_footer(); ?>
	
	<?php
	/*
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery-ui-autocomplete.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.select-to-autocomplete.js"></script>	
	*/
	?>

	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.validate.min.js"></script>		
	<?php if(is_front_page()): ?>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/continents-map/continents-map.js"></script>    		
	<?php endif; ?>  

	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-25539846-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>	
</div>

</body>
</html>
