jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {	
		travelguide();
		searchFaq();		
		
		// accordion slidedown 
		$( ".accordion" ).accordion({ header: 'h4', active: false, collapsible: true });

		
		// add tabs on frontpage
		$("#tabs").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 10000, true);			
	
	});
	
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
			
			// clear when input is empty
			if(search_word == ""){
				$('#clearSearch').trigger('click');
				return false;
			}			
			
			// length of word must be above 3 to trigger search
			if(search_word.length < 3){
				return false;
			}			

			// hide all
			$(".accordion h4").hide();				
		
			// find matches
			var matches = $(".accordion h4:contains("+search_word+")");
			var contentMatches = $(".accordion div:contains("+search_word+")").prev('h4');
			matches = matches.add(contentMatches);			
						
			// show matches
			matches.show();
			
			// activate answers
			//$('.accordion').accordion( "activate" , false );
		});
		
		// clear search results
		$('#clearSearch').click(function() {		
			// hide answers
			$('.accordion').accordion( "activate" , false );
			
			// show containers and regions
			$(".faq h4").fadeIn();												
			
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
