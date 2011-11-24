jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {	
		contentSlider();
		toggleFaq();	
		travelguide();
		searchFaq();
	});
	
	// content slider on frontpage
	function contentSlider(){
		if($("#featured > ul .ui-tabs-nav-item").size() > 0){
			$("#featured > ul").tabs({fx:{opacity: "toggle", duration:"slow"}}).tabs("rotate", 10000, true);
		}
	}	

	// show/hide faq
	function toggleFaq(){
		$('.slidedown .title').click(function() {	
			$(this).next('.content').toggle(200, 'swing');
			return false;
		});			
	}	
	
	function travelguide(){
		// display submit button for js-enabled users
		$('#travelguide [type=submit]').hide();
			
		// search as you type on country finder
		$('select#country-selector').selectToAutocomplete();	
	}
	
	function searchFaq(){
		
		// during text input
		$('#searchFaq').keyup(function() {
							
			var search_word = $(this).val();
			
			// clear on empty
			if(search_word == ""){
				$('#clearSearch').trigger('click');
				return false;
			}			
			
			// length of word must be above 3 to trigger search
			if(search_word.length < 3){
				return false;
			}			

			// hide all
			$(".slidedown").hide();
			//$(".faq h3").hide();			
		
			// find matches
			var matches = $(".slidedown .content:contains("+search_word+"), .slidedown .title:contains("+search_word+")").parent(".slidedown");
			
			// show containers
			matches.show();
			
			// fadein answers
			matches.children().fadeIn();

		});
		
		// clear search results
		$('#clearSearch').click(function() {
			// hide questions
			$(".slidedown .content").hide();
			
			// show containers and regions
			$(".slidedown").fadeIn();
			$(".faq h3").show();						
			
			// clear input field
			$("#searchFaq").val("");
			return false;
		});
		
		// make jquery :contains case-insensitive
		jQuery.expr[':'].contains = function(a, i, m) {
		  return jQuery(a).text().toUpperCase()
			  .indexOf(m[3].toUpperCase()) >= 0;
		};		
	}
	
})(jQuery);


