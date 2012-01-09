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
		
		// Booking: load iframe and disable form
		bookingNavigate();
		
	});
	
	/*
	 * functions begin
	 **************************************************************************************/	

	// Booking: load iframe when clinic is selected
	function bookingNavigate() {
    $('#navigateStepBack').hide();
    
    var inputFields = '.template.booking .form input,.template.booking .form select, .template.booking .form textarea';
	
		// action when click on next button
		$('#navigateStepNext').click(function() {
				
				// disable and fade form
				$(inputFields).attr('disabled', 'enabled');
				$('form').fadeTo('fast', 0.5);
		
				// data
				var name = $('.form #name').val();
				var email = $('.form #email').val();
				var phone = $('.form #phone').val();
				var comments = $('.form #comments').val();
				var clinic_url = $('.form #clinic option:selected').data('url'); // URL
				var destination = $('.form #destination').val();
				var participants = $('.form #participants option:selected').val(); 
				var service = participants; // SERVICE	
				
				// remove leading zero from phone number
				phone = phone.substr(0,1) == '0' ? phone.substr(1) : phone;

				// url encode values				
				var booking_url = 
					clinic_url + 
					'?service=service' + service + 
					'&l1=' + encodeURI(name) +
					'&l2=' + encodeURI(email) +
					'&l3=%2B44' + encodeURI(phone) +
					'&l4=' + encodeURI(comments) +
					'&l5=' + encodeURI(destination);											
		
				// load iframe				
        $('.template.booking iframe').attr('src', booking_url);
        
        // change navigation buttons
        $(this).hide();
        $('#navigateStepBack').show();
		});
		
		// action when click on edit/back button
		$('#navigateStepBack').click(function() {
				
				// enable and fadein form
				$(inputFields).removeAttr('disabled');
				$('form').fadeTo('fast', 1);				
		
				// disable iframe
        $('.template.booking iframe').attr('src', 'about:blank');
        
        // change navigation buttons
        $(this).hide();
        $('#navigateStepNext').show();
		});		
	}

	/******************
	 * Search as you type: find country
	 ******************/		
	function travelguide(){
		// hide submit button for js-enabled users
		$('#travelguide [type=submit]').hide();
		
		// old-school change page on click
		$('#country-selector').change(function(){
			var url = $(this).val();
			window.location.href = url;
		});
			
		// search as you type on country finder
		//$('select#country-selector').selectToAutocomplete();	
	}

	/******************
	 * Booking button - open modalwindow with accordion menu inside
	 ******************/			
	function button_book()	{
		
		// bind accordion "click" function - change button inside jQueryUI dialog
		$( ".accordion" ).bind( "accordionchange", function(event, ui) {
	
			// an option was opened (do nothing on close)
/*
			if(ui.new	er.length > 0){
				
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
*/
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
