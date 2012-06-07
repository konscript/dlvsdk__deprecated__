jQuery.noConflict();
(function($){

  var loadingText = "Loading ..."; // pre-loader text, shown when map is loading
  var loadingErrorText = "No map!"; // loading error text
  var tooltipArrowHeight = 4;	/* height of the arrow under the 'bubble';
						   set tooltipArrowHeight=0, when you remove a 'bubble' or arrow in the CSS file */
  var visibleListId = '#map-visible-list';	/* ID of the second list of regions;
  									   don't forget a hash (#) before it;
    									   also requires changes in the CSS file; */
  var agentsListId = '#addresses'; /* ID for the list of agents addresses;
    							don't forget a hash (#) before it */

  // MULTIPLE-CLICK MODE
  var searchLink = 'search.php'; // url to the search engine script;
  var searchLinkVar = 'region'; // variable passing to the search engine;
  var searchName = 'Search'; // text of the search engine link


  $.multipleClickAction = function(e){
    var clickedRegions=[];
    $('#continents').find('.active-region').each(function(){ // searching for activated regions (DO NOT EDIT!)
       var liUrl=$(this).children('a').attr('href'); // get urls of activated regions (DO NOT EDIT!) 

       // links settings

       var slicedUrl=liUrl.slice(1); // by default, removes hash (#) from the link url
       /* when you're using a safe urls, like: 'search.php?region=africa'
          you have to 'cut-off' parameters from the link url, by this function:

          var slicedUrl=liUrl.slice(liUrl.indexOf('?')+8); // removes: '?region=' ... +8 is the number of cut-off characters
       */


       // fill an array of activated regions (DO NOT EDIT!)
       clickedRegions.push(slicedUrl);
    });

    // creates a link to the search engine with the names of selected regions
    $('#search-link').attr('href',searchLink+'?'+searchLinkVar+'='+clickedRegions.join('|'));

   }


  // STANDARD FEATURES

     // click on the region
    $.defaultClickAction = function(e){
        // get link liUrl of the clicked region (DO NOT EDIT!)
        var liUrl = $(e).children('a').attr('href'); if($(agentsListId).length>0){ window.location.hash=liUrl; } else{

        // by default, clicking on the region moves to the page in the link
        window.location.href = liUrl;

        }
        // displays the agent address of the actived region
        $(agentsListId).find('li').hide();
        $(liUrl+','+liUrl+' li').show();
    }

    // double click on the activated region
    $.doubleClickedRegion = function(e){
        // deactivates selected region
        $(e).removeClass('active-region');

        // hide addresses of agents
        $(agentsListId).find('li').hide();
    }


/* --------------------------------------------------------
   the map starts here

DO NOT EDIT! 

World continents, CSS & jQuery clickable map | http://winstonwolf.pl/clickable-maps/world-continents.html
script version: 3.6 by Winston Wolf | http://winstonwolf.pl
Copyright (C) 2011 Winston_Wolf | All rights reserved

really, DO NOT EDIT THIS! */
$('#map-continents').prepend('<span id="loader">'+loadingText+'</span>').addClass('script');
/*$('#continents').find('a').hide();*/$(agentsListId).find('li').hide();if($('#map-continents').hasClass('multiple-click')){if(searchLink==''){var searchLink='search.php';}
if(searchLinkVar==''){var searchLinkVar='region';}
if(searchName==''){var searchName='Search';}
$('<a href="'+searchLink+'" id="search-link">'+searchName+'</a>').insertAfter('#continents');}
if($('#map-continents').hasClass('visible-list')){$('#map-continents').after('<div id="'+visibleListId.slice(1)+'"><ul></ul></div>');}
var mapUrl=$('#continents').css('background-image').replace(/^url\("?([^\"\))]+)"?\)$/i,'$1');var mapImg=new Image();$(mapImg).load(function(){var clickedRegions=[];$('#loader').fadeOut();$('#continents').find('li').each(function(c){var liid=$(this).attr('id');var liUrl=$(this).children('a').attr('href');var code=null;var spans=0;switch(liid){case'c2':case'c5':spans=23;break;case'c4':spans=18;break;default:spans=12;}
var tooltipLeft=$(this).children('a').outerWidth()/-2;var tooltipTop=$(this).children('a').outerHeight()*-1-tooltipArrowHeight;if($('#map-continents').hasClass('no-tooltip')){var tooltipTop=0;}
$(this).prepend('<span class="map" />').append('<span class="bg" />').attr('tabindex',c+1);for(var i=1;i<spans;i++){$(this).find('.map').append('<span class="s'+i+'" />');}
$(this).children('a').css({'margin-left':tooltipLeft,'margin-top':tooltipTop});if($('#map-continents').hasClass('visible-list')){var liHref=$(this).children('a').attr('href');var liText=$(this).children('a').text();$(visibleListId+' ul').append('<li class="'+liid+'"><a href="'+liHref+'">'+liText+'</a></li>');}
if($(this).children('a').hasClass('active-region')||liUrl==window.location.hash&&liUrl!=""){$(this).addClass('active-region focus');$(agentsListId).find('li').hide();$(liUrl+','+liUrl+' li').show();$('.'+$(this).attr('id')).children('a').addClass('active-region');$('#search-link').attr('href',searchLink+'?'+searchLinkVar+'='+liUrl.slice(1));}}).hover(function(){$.MapHoveredRegion($(this));},function(){$.MapUnHoveredRegion($(this));}).focus(function(){$.MapHoveredRegion($(this));}).blur(function(){$.MapUnHoveredRegion($(this));}).keypress(function(e){code=(e.keyCode?e.keyCode:e.which);if(code==13)$.MapClickedRegion($(this));}).click(function(e){$.MapClickedRegion($(this));});if($('#map-continents').hasClass('visible-list')){$(visibleListId).find('a').each(function(){var itemId='#'+$(this).parent().attr('class');$(this).hover(function(){$.MapHoveredRegion(itemId);},function(){$.MapUnHoveredRegion(itemId);}).focus(function(){$.MapHoveredRegion(itemId);}).blur(function(){$.MapUnHoveredRegion(itemId);}).keypress(function(e){code=(e.keyCode?e.keyCode:e.which);if(code==13)$.MapClickedRegion(itemId);}).click(function(e){$.MapClickedRegion(itemId);});});}}).error(function(){$('#loader').text(loadingErrorText);$('#continents').find('span').hide();$('#map-continents,#continents').css({'height':'auto','left':'0','margin':'0 auto'});}).attr('src',mapUrl);$.MapClickedRegion=function(e){var listItemId='.'+$(e).attr('id');var liUrl=$(e).children('a').attr('href');if(typeof liUrl!="undefined"){if($('#map-continents').hasClass('multiple-click')){if($(e).hasClass('active-region')){$(e).removeClass('active-region');$(listItemId).children('a').removeClass('active-region');}else{if(liUrl.length>=2){$(e).addClass('active-region');$(listItemId).children('a').addClass('active-region');}}
$.multipleClickAction(e);}else{if($(e).hasClass('active-region')){$.doubleClickedRegion(e);$(listItemId).children('a').removeClass('active-region');$(e).attr('href','');}else{$('#continents,'+visibleListId).find('.active-region').removeClass('active-region');$('#continents').find('.focus').removeClass('focus');if($(e).hasClass('active-region')){$(e).removeClass('active-region focus');$(listItemId).children('a').removeClass('active-region');}else{$(e).addClass('active-region focus').children('a').show();$(listItemId).children('a').addClass('active-region');}
$.defaultClickAction(e);$(e).children('a').show();}}}}
$.MapHoveredRegion=function(e){var liUrl=$(e).children('a').attr('href');if(typeof liUrl!='undefined'&&liUrl!=""){$('#continents').find('.active-region').children('a').hide();$(e).children('a').show();$(e).addClass('focus');$('.'+$(e).attr('id')).children('a').addClass('focus');}
else{$(e).hide();}}
$.MapUnHoveredRegion=function(e){/*$(e).children('a').hide();*/if($(e).hasClass('active-region')==false){$(e).removeClass('focus');}
$('.'+$(e).attr('id')).children('a').removeClass('focus');}
var loaderLeft=$('#loader').outerWidth()/-2;var loaderTop=$('#loader').outerHeight()/-2;$('#loader').css({'margin-left':loaderLeft,'margin-top':loaderTop});
// end of the map
})(jQuery);
