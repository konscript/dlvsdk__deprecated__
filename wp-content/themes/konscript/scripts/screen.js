jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {	
		contentSlider();
		toggleFaq();	
		showWorldMap();   
		travelguide();
	});
	
	// content slider on frontpage
	function contentSlider(){
		$("#featured > ul").tabs({fx:{opacity: "toggle", duration:"slow"}}).tabs("rotate", 10000, true);
	}	

	// show/hide faq
	function toggleFaq(){
		$('.slidedown .title').click(function() {	
			$(this).next('.content').toggle(200, 'swing');
			return false;
		});			
	}	
	
	// show world map to click on
	function showWorldMap(){
		$("#world_map_thumb").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic'
		});	
	}
	
	function travelguide(){
		// display submit button for js-enabled users
		$('#travelguide [type=submit]').hide();
			
		// search as you type on country finder
		$('select#country-selector').selectToAutocomplete();	
	}
	
})(jQuery);

