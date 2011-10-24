jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {	
		contentSlider();
		toggleFaq();	
	});
	
	// content slider on frontpage
	function contentSlider(){
		$("#featured > ul").tabs({fx:{opacity: "toggle", duration:"slow"}}).tabs("rotate", 10000, true);
	}	

	// show/hide faq
	function toggleFaq(){
		$('.single-faq .question').click(function() {	
			$(this).next('.answer').toggle(200, 'swing');
			return false;
		});			
	}
	
})(jQuery);

