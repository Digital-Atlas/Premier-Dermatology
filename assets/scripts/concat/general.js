(function($) {
	
	'use strict';	
	
	
	
	// Load Foundation
	$(document).foundation();
	
 	
	
	// Resize function
	$(window).on('load resize', function(e){
	  	if( $(window).width() > 1024) {
		  $( '.nav-primary li:has(ul)' ).doubleTapToGo();
		}  
		else {
			$( '.nav-primary li:has(ul)' ).doubleTapToGo( 'unbind' );
		}
	});
	
 	
	var $all_oembed_videos = $("iframe[src*='youtube'], iframe[src*='vimeo']");
	
	$all_oembed_videos.each(function() {
	
		var _this = $(this);
				
		if (_this.parent('.embed-container').length === 0) {
		  _this.wrap('<div class="embed-container"></div>');
		}
		
		_this.removeAttr('height').removeAttr('width');
 	
 	});
	
	
	// Open external links in new window (exclue mail and foobox)
	
	$('a').not('svg a, [href*="mailto:"], [class*="foobox"]').each(function () {
		var isInternalLink = new RegExp('/' + window.location.host + '/');
		if ( ! isInternalLink.test(this.href) ) {
			$(this).attr('target', '_blank');
		}
	});
	
	
	
	// Down arrows
	
	
	$( '.down-arrow' ).append( '<span class="scroll-down scroll-arrow svg"><svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.679902627"><g id="HOME" transform="translate(-696.000000, -640.000000)" fill="#FFFFFF"><path d="M727.765922,662.678155 C728.096378,663.008611 728.261585,663.421671 728.261585,663.876094 C728.261585,664.330477 728.096378,664.743536 727.765922,665.074033 L716.860545,675.979329 C716.530089,676.309785 716.075747,676.475033 715.662647,676.475033 C715.208264,676.475033 714.795164,676.309785 714.464708,675.979329 C713.803796,675.318416 713.803796,674.244404 714.464708,673.583492 L724.172105,663.876094 L714.464708,654.168656 C713.803796,653.507744 713.803796,652.433731 714.464708,651.772778 C715.12562,651.111866 716.199633,651.111866 716.860545,651.772778 L727.765922,662.678155 Z M719.999979,684.612754 C708.640261,684.612754 699.387246,675.359739 699.387246,663.999979 C699.387246,652.640261 708.640261,643.387287 719.999979,643.387287 C731.359698,643.387287 740.612713,652.640261 740.612713,663.999979 C740.612713,675.359739 731.359698,684.612754 719.999979,684.612754 L719.999979,684.612754 Z M719.999979,640 C706.78141,640 696,650.78141 696,663.999979 C696,677.21859 706.78141,688 719.999979,688 C733.218549,688 743.999959,677.259912 743.999959,663.999979 C743.999959,650.740088 733.218549,640 719.999979,640 L719.999979,640 Z" id="next" transform="translate(719.999979, 664.000000) rotate(-270.000000) translate(-719.999979, -664.000000) "></path></g></g></svg></span>' ); 
	
	
	$(window).scroll(function () {
		$('.section').each(function () {
			if (($(this).offset().top - $(window).scrollTop()) < -150) {
				$(this).find('.scroll-down').stop().fadeTo(100, 0);
			} else {
				$(this).find('.scroll-down').stop().fadeTo('fast', 1);
			}
		});
	});
	
	
	
	$('.scroll-down').on('click', function(){
 		
		var section = $(this).parent('.section').next('.section');
		
		$.smoothScroll({
				offset: 0,
				scrollTarget: section,
			});
		
    }); 
	
	
	$('.home .hero a[href^=#]').on('click', function(){
 		
		var section = $('#why-us');
		
		$.smoothScroll({
				offset: 0,
				scrollTarget: section,
			});
		
    }); 

	
})(jQuery);

