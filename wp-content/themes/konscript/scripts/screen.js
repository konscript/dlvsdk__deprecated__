jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {	
	
		toggleFaq();
		fixCustomPostTypeMenu();
		
	});
	
	
	// show/hide faq
	function toggleFaq(){
		$('.single-faq .question').click(function() {	
			$(this).next('.answer').toggle(200, 'swing');
			return false;
		});			
	}
	
	// remove selection in primary menu, when custom post type selected
	function fixCustomPostTypeMenu(){
		var custom_post_type = $('#menu-main .dlvs-custom-post-type').length;

		if(custom_post_type > 0){
			$('#menu-main .current_page_parent').not('.dlvs-custom-post-type').removeClass('current_page_parent');
		}
	}	
	
})(jQuery);

