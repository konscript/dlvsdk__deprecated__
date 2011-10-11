		<div id="footer-container">
			<div id="footer">
				<div class="text">
                    Gladsaxevej 376 • 2860 Søborg • Tlf: 70 25 40 80 • Fax: 70 25 90 41 • Email: info@dlvs.dk
                </div>
                <div class="logo">
                	<img src="<?php bloginfo('template_url'); ?>/img/ELCG_DK_LOGO_BUND.gif" />
                </div>
			</div><!--#end footer-->
		</div><!--#end footer-->	
	</div><!--#end container-->
</div><!--#end wrapper-->

<div class="hide">
	<?php wp_footer(); ?>
	<script t
	ype="text/javascript">

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
<?php echo get_num_queries()." queries."; ?> 
</body>
</html>
