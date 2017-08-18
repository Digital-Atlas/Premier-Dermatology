(function($) {
	
	'use strict';	
	
	$(document).ready(function(){
	  $(".owl-carousel").owlCarousel(
	  {
			loop:false,
			margin:25,
			center: false,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				640:{
					items:2,
					nav:true
				},
				1024:{
					items:2,
					nav:true,
 				}
			},
			dots: false,
			navText : ['<span class="screen-reader-text">previous</span>','<span class="screen-reader-text">next</span>']

		}
	  );
	});
	
	
})(jQuery);

