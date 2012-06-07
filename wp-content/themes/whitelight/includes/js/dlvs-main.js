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
		//$( "a.button" ).button();
		
		// Booking: load iframe and disable form
		bookingNavigate();
		
		// booking iframe
		bookingIframe();		
		
		// vaccination lightbox
		vaccinationLightbox();
		
		// misc css styling
		miscStyles();
		
	});
	
	/*
	 * functions begin
	 **************************************************************************************/	

	// load iframe
	function bookingIframe(){		
		$('.template.booking a.button-book').click(function(){
			var booking_url = $(this).attr('href');
			
			$('.zebra').fadeOut('fast', function() {
				$('.template.booking iframe').attr('src', booking_url).show();
			});
			return false;
		});
	}

	// Booking: load iframe when clinic is selected
	function bookingNavigate() {
    $('#navigateStepBack').hide();
    
		$("form#booking").validate({
			rules: {
				fullname: {
				  required: true
				},			
				email: {
				  required: true,
				  email: true
				},
				phone: {
				  required: false,
				  digits: true,
	        minlength: 10,
		      maxlength: 11
				},
				clinic: {
				  required: true
				}
			}
		});    
    
    var inputFields = '.template.booking .form input,.template.booking .form select, .template.booking .form textarea';
	
		// action when click on next button
		$('#navigateStepNext').click(function() {
		
			// form is invalid
			if(!$("form#booking").valid()){
				$(this).effect("shake", { times:2, distance:4, direction: "left" }, 50);
			 return false;
			}
		
				// disable and fade form
				$(inputFields).attr('disabled', 'enabled');
				$('.template.booking form').fadeTo('fast', 0.5);
		
				// data
				var fullname = $('.form #fullname').val();
				var email = $('.form #email').val();
				var phone = $('.form #phone').val();
				var comments = $('.form #comments').val();
				var clinic_url = $('.form #clinic option:selected').data('url'); // URL
				var destination = $('.form #destination').val();
				var participants = $('.form #participants input:checked').val(); 
				//var participants = $('.form #participants option:selected').val(); 
				//var service = participants; // SERVICE	
				
				// remove leading zero from phone number
				phone = phone.substr(0,1) == '0' ? phone.substr(1) : phone;

				// url encode values				
				var booking_url = 
					clinic_url + 
					//'?service=service' + service + 
					'?l1=' + encodeURI(fullname) +
					'&l2=' + encodeURI(email) +
					'&l3=%2B44' + encodeURI(phone) +
					'&l4=' + encodeURI(comments) +
					'&l5=' + encodeURI(destination) + 
					'&l6=' + encodeURI(participants);
		
				// load iframe				
				$('.template.booking .iframe-placeholder').fadeOut('fast', function() {
					$('.template.booking iframe').attr('src', booking_url);
				})
        
        // change navigation buttons
        $(this).hide();
        $('#navigateStepBack').show();
		});
		
		// action when click on edit/back button
		$('#navigateStepBack').click(function() {
				
				// enable and fadein form
				$(inputFields).removeAttr('disabled');
				$('.template.booking form').fadeTo('fast', 1);				
		
				// disable iframe
        $('.template.booking iframe').attr('src', 'about:blank');
				$('.template.booking .iframe-placeholder').fadeIn('fast');
        
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
		$('.map-form [type=submit]').hide();
		
		// old-school change page on click
		$('#country-selector').change(function(){
			var url = $(this).val();
			window.location.href = url;
		});
			
		// search as you type on country finder
		//$('select#country-selector').selectToAutocomplete();	
	}

	/******************
	 * On single-country a list of vaccinations is shown. When clicked they will fetch the single-vaccination page with ajax 
	 ******************/			
	function vaccinationLightbox(){
				
		// close dialog when click outside
		$(".ui-widget-overlay").live("click", function () {
				$(".vaccinationModal").dialog( "close" );
		});		
		
		// bind modal window (jQueryUI dialog) to vaccination-links
		$('.vaccination-name a').click(function() {
		
			// set url
			var url = this.href + "?ajax=true";
			
			// create new modal window
			var vaccinationModalElm = $('<div></div>').addClass('vaccinationModal').attr('title', 'Vaccination details').appendTo('body');			
			
			// lightbox options
	    vaccinationModalElm.dialog({ 
	    	modal: true,
	    	draggable: false,
	    	resizable: false,
	    	width: 600,
				show: "fade",
				hide: "fade",
				position: ['center', 100]
    	});

			// load content into window
			vaccinationModalElm.load(url,	function(responseText, textStatus, XMLHttpRequest) {				
	      $(vaccinationModalElm).dialog('open');
	      
				// remove id attribute "content" ot remove fixed width 
				$(this).children('#content').removeAttr('id');
			
				// bind accordion 
				$( ".accordion" ).accordion({ header: 'h4', active: false, collapsible: true });		      
			});				

			// prevent the browser from following the link
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
	} // search faq end
	
	/******************
	 * CSS edits and styling
	 ******************/				
	function miscStyles(){
//		$('.page-template-template-front-php .clinics .clinic').click(function(){
//	 		 window.location.href = $(this).find('a').attr('href');
//		});
	}
	
})(jQuery);
