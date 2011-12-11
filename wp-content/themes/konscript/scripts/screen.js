jQuery.noConflict();
(function($){

	// execute when DOM is ready
	$(document).ready(function() {	
	
		travelguide();
		
		// search feature on FAQ archive
		searchFaq();		
			
		// accordion slidedown 
		$( ".accordion" ).accordion({ header: 'h4', active: false, collapsible: true });
		
		// add tabs on frontpage
		$("#tabs").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 7000, true);
		
		// process buttons (jquery ui)
		$( "a.button" ).button();
		button_book();
	});
	
	/*
	 * functions begin
	 **************************************************************************************/	


	/******************
	 * Search as you type: find country
	 ******************/		
	function travelguide(){
		// hide submit button for js-enabled users
		$('#travelguide [type=submit]').hide();
			
		// search as you type on country finder
		$('select#country-selector').selectToAutocomplete();	
	}


	/******************
	 * Booking button - open modalwindow with accordion menu inside
	 ******************/			
	function button_book()	{
		
		// bind accordion "click" function - change button inside jQueryUI dialog
		$( ".accordion" ).bind( "accordionchange", function(event, ui) {
	
			// an option was opened (do nothing on close)
			if(ui.newHeader.length > 0){
				
				$('.accordion').accordion("resize");

				var link = $(ui.newHeader).find("a");
				var link_ref = link.attr("href");
				var link_text = link.text();
				
				// add button to dialog
				$( "#dialog" ).dialog( "option", "buttons", [
						{
								text: "Book " + link_text,
								click: function() { 
									// follow link
									window.location = link_ref;
								}
						}
				]);		
			}
		});
		
		// bind modal window (jQueryUI dialog) to button-book		
		$('a.button-book').live('click', function() {
			var url = this.href;
			var dialog = $("#dialog");
			if ($("#dialog").length == 0) {
				dialog = $('<div id="dialog" title="Booking - choose your clinic:"></div>').hide().appendTo('body');
			
				// load remote content (ajax)
				dialog.load(
						url,
						function(responseText, textStatus, XMLHttpRequest) {
					    dialog.dialog({ 
					    	modal: true,
					    	draggable: false,
					    	resizable: false,
								open: function(){
										$('.ui-widget-overlay').hide().fadeIn();
								},
								show: "fade",
								hide: "fade"
				    	});
						}
					);				    				    
			}else{
				dialog.dialog( "open" );
			} 

			//prevent the browser to follow the link
			return false;
		}); 	
	}

	/******************
	 * FAQ: search through questions and answers
	 ******************/			
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

			// hide and close all
			$(".accordion h4, .faq h3").hide();				
			$('.accordion').accordion( "activate" , false );						
		
			// find matches
			var matches = $(".accordion h4:contains("+search_word+")");
			var contentMatches = $(".accordion div:contains("+search_word+")").prev('h4');
			matches = matches.add(contentMatches);									
						
			// show matches
			matches.show();			
			matches.parent('.accordion').prev('h3').show();						
		});
				
	/******************
	 * FAQ: clear search results
	 ******************/			
		$('#clearSearch').click(function() {		
			// hide answers
			$('.accordion').accordion( "activate" , false );
			
			// show containers and headings
			$(".accordion h4, .faq h3").fadeIn();
			
			// clear input field
			$("#searchFaq").val("");
			return false;
		});
		
		// extending jquery - case-insensitive ":contains"
		jQuery.expr[':'].contains = function(a, i, m) {
		  return jQuery(a).text().toUpperCase()
			  .indexOf(m[3].toUpperCase()) >= 0;
		};		
	}
	
})(jQuery);
