<?php
/*
Template Name: New Book Appointment 
*/

get_header(); ?>
<style>

html:not(.note) .page-template-book-appointment-new #content{padding-top:0 !important;}
.note .page-template-book-appointment-new #content{padding-top:240px !important;}
.page-template-book-appointment-new h2{
	font-size:30px;
}
.page-template-book-appointment-new a.btn{
	margin-right: 20px;
    padding: 10px 60px 10px 40px;
}
.page-template-book-appointment-new .booking-apt a.btn{
	padding: 10px 42px 10px 42px;
}
.page-template-book-appointment-new .booking-apt a.btn:after{
	display:none;
}


.page-template-book-appointment-new .hero{height:530px;}
.page-template-book-appointment-new .hero .flex{
	display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}
.page-template-book-appointment-new .hero .book-apt{
	max-width:70%;	
}
.page-template-book-appointment-new .hero .book-apt a.btn{
	margin-right:20px;
	margin-top: 10px;
    margin-bottom: 10px;

}

.page-template-book-appointment-new .hero h1{
	margin-bottom:60px;
	text-transform: none;
}


.page-template-book-appointment-new .directions-title{
	background-color: #f6f6f6;
	text-align:center;
	padding: 60px 60px 36px 100px;
}
.page-template-book-appointment-new .directions-title h2{
	max-width: 850px;
    margin: 0 auto;
}

.page-template-book-appointment-new .directions h2,
.page-template-book-appointment-new .directions p{ color: #444; }
.page-template-book-appointment-new .directions{ background-color: #307DA1; }
.page-template-book-appointment-new .directions{ 
	background-color: #f6f6f6;
    padding: 60px 60px 36px 100px;
    color: #fff;
}
.page-template-book-appointment-new .booking-apt{
	margin-top: 0px; 
	padding: 60px 60px 60px 100px;
	display: flex;
}

.page-template-book-appointment-new .carousel-book-apt{
	overflow: hidden;
	display:flex;
}
.page-template-book-appointment-new .carousel-book-apt .item{
	display:inline;
	min-width:100%;
}
.page-template-book-appointment-new .carousel-book-apt .item img{
	max-width:225px;
	margin:0 auto;
	display: block;
}
.page-template-book-appointment-new .carousel-section{
	position:relative;
}
.page-template-book-appointment-new .carousel-section .carousel-arrows{
	position: absolute;
	width:100%;
	top:50%;
}
.page-template-book-appointment-new .carousel-section .carousel-arrows .arrow.left{
	position: absolute;
	left:90px;
	font-size:40px;
	color:#444;
	font-style: normal;
}
.page-template-book-appointment-new .carousel-section .carousel-arrows .arrow.right{
	position: absolute;
	right:90px;
	font-size:40px;
	color:#444;
	font-style: normal;
}
.page-template-book-appointment-new .carousel-section .nav-dots{
	width: 100px;
    margin: 0 auto;
}
.page-template-book-appointment-new .carousel-section .nav-dots i{
	color:#444;
	font-style: normal;
}

.page-template-book-appointment-new .booking-apt .columns{
	text-align:left;
	flex:1;
}
.page-template-book-appointment-new .booking-apt .columns p{
	margin-bottom:0;
}
.page-template-book-appointment-new .booking-apt .columns ul{
	margin-bottom:30px;
}
.page-template-book-appointment-new .booking-apt .columns:last-of-type{
	flex:2;
}


.page-template-book-appointment-new .commitment{
	margin-top: 0px; 
	padding: 60px 60px 60px 100px;
	display: flex;
	position: relative;
}
section.commitment:before{
	content: "";
    display: block;
    position: absolute;
    bottom: 0;
    left: -115px;
    background: url('https://pdskin.com/wp-content/uploads/2020/05/green-circles-1.png');
    background-position: 100%;
    background-repeat: no-repeat;
    background-size: contain;
    width: 260px;
    height: 100%;
}
.page-template-book-appointment-new .commitment .columns{
	text-align:left;
	flex:1;
}
.page-template-book-appointment-new .commitment .columns h2{font-size: 30px;}
.page-template-book-appointment-new .commitment .columns p{}
.page-template-book-appointment-new .commitment div:first-of-type{
	max-width:230px;
}
.page-template-book-appointment-new .commitment div:first-of-type img{
	max-width:100%;
}
.page-template-book-appointment-new .commitment div:last-of-type{
	display:flex;
	flex-direction:column;
	justify-content: center;
}



.page-template-book-appointment-new .zocdoc{
	margin-top: 0px;
	padding: 60px 60px 60px 100px;
	display: flex;
	background-color: #a1c05f;
	background-image: url('https://pdskin.com/wp-content/uploads/2020/05/footer-cta-1.png');
}
.page-template-book-appointment-new .zocdoc .columns{}
.page-template-book-appointment-new .zocdoc .columns h2{color:#ffffff;font-size: 30px;}
.page-template-book-appointment-new .zocdoc .columns a{
	background-color:#307da1;
    color: #ffffff;
    padding: 10px 40px;
    font-weight: 800;

}
.page-template-book-appointment-new .zocdoc .columns:first-of-type{
	text-align:left;
}
.page-template-book-appointment-new .zocdoc .columns:last-of-type{
	max-width: 370px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
#owl-carousel-book-apt { width: 400px; overflow: hidden; margin:0 auto; background-color:#f6f6f6; }
#owl-carousel-book-apt .item img{
    display: block;
    width: 400px;
    height: auto;
    padding: 29px 75px 45px;
}

#owl-carousel-book-apt .owl-buttons{
	position: absolute;
    top: 0;
    left: 70px;
    height: calc(100% - 45px);
    width: calc(100% - 140px);
    border: 5px solid #6d7278;
    border-radius: 24px;
}
#owl-carousel-book-apt .owl-buttons:before{
	content: '';
    height: 25px;
    position: absolute;
    top: -1px;
    background-color: #6d7278;
    width: 100%;
    margin: 0 auto;
    left: 0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
#owl-carousel-book-apt .owl-buttons:after{
	content: '';
    height: 25px;
    position: absolute;
    bottom: -1px;
    background-color: #6d7278;
    width: 100%;
    margin: 0 auto;
    left: 0;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
#owl-carousel-book-apt .owl-buttons div{
	position: absolute;
    color: #c8cdd2;
    font-size: 40px;
    top: -10px;
    height: calc(100% + 20px);
}
#owl-carousel-book-apt .owl-buttons div:hover{
    color: #307da1;
    cursor: pointer;
}
#owl-carousel-book-apt .owl-buttons .owl-prev{
	
    left:-80px;
    /*height: 100%;*/
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: #f6f6f6;
    padding: 0 46px 0 5px;
    font-weight:800;
}
#owl-carousel-book-apt .owl-buttons .owl-next{
    right:-80px;
    /*height: 100%;*/
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: #f6f6f6;
    padding: 0 5px 0 46px;
    font-weight:800;
}
#owl-carousel-book-apt .owl-pagination{
	position: relative;
    bottom: -10px;
    text-align: center;
}
#owl-carousel-book-apt.owl-theme .owl-controls .owl-page {
    display: inline-block;
}
#owl-carousel-book-apt.owl-theme .owl-controls .owl-page span {
    background: none repeat scroll 0 0 #c8cdd2;
    border-radius: 20px;
    display: block;
    height: 12px;
    margin: 5px 7px;
    width: 12px;
}
#owl-carousel-book-apt.owl-theme .owl-controls .owl-page.active span {
    background: none repeat scroll 0 0 #307da1;
}

.mob-hide{display:initial;}
@media only screen and (max-width: 1109px) {
	.page-template-book-appointment-new .booking-apt,
	.page-template-book-appointment-new .directions,
	.page-template-book-appointment-new .commitment,
	.page-template-book-appointment-new .zocdoc,
	.page-template-book-appointment-new .teledermatology{
		padding: 60px 30px;
	}

}
@media only screen and (max-width: 1021px) and (min-width: 701px) {
	.note .page-template-book-appointment-new #content{
		padding-top: 0 !important;
	}
	.page-template-book-appointment-new .directions-title{
		padding: 60px 40px 10px 40px;
	}
	.page-template-book-appointment-new .hero .book-apt a.btn,
	.page-template-book-appointment-new a.btn{
		margin-right: 0;
	    margin-top: 20px;
	    margin-bottom: 0;
	    width: 300px;
    	padding: 10px 30px 10px 30px;
	}
	.page-template-book-appointment-new .zocdoc .columns:last-of-type{
		display: flex;
	    flex-direction: column;
	    justify-content: center;
	}
	#owl-carousel-book-apt{
		margin-top: 30px;
    	margin-bottom: 30px;
	}

}
@media only screen and (max-width: 700px) {
	.note .page-template-book-appointment-new #content{
		padding-top: 0 !important;
	}
	.mob-hide{
		display:none;
	}
	.page-template-book-appointment-new .booking-apt,
	.page-template-book-appointment-new .commitment,
	.page-template-book-appointment-new .zocdoc{
		flex-direction: column;
	}
	.page-template-book-appointment-new .hero .book-apt{
		max-width:100%;
	}
	.page-template-book-appointment-new .hero{
		height:auto;
		padding: 30px 10px;
	}
	.page-template-book-appointment-new .booking-apt,
	.page-template-book-appointment-new .commitment{
		padding: 60px 10px;
	}
	.page-template-book-appointment-new .directions{
		padding: 30px 10px 60px;
	}
	.page-template-book-appointment-new .zocdoc{

	}
	.page-template-book-appointment-new .carousel-section .carousel-arrows{
		width:90%;
	}
	.page-template-book-appointment-new .commitment div:first-of-type{
		margin: 0 auto;
	}
	.page-template-book-appointment-new h2{
		margin-top: 40px;
	}
	.page-template-book-appointment-new .directions-title{
		padding: 60px 10px 10px 10px;
	}
	.page-template-book-appointment-new .hero h1{
		margin-bottom:30px;
		margin-right: 55px;
		font-size:44px;
	}
	.page-template-book-appointment-new .teledermatology{
		padding:20px 0 0 !important;
	}
	.page-template-book-appointment-new .site-main p{
		margin-bottom:0;
	}
	.page-template-book-appointment-new .hero .book-apt a.btn,
	.page-template-book-appointment-new a.btn{
		margin-right: 0;
	    margin-top: 20px;
	    margin-bottom: 0;
	    width: 300px;
    	padding: 10px 30px 10px 30px;
	}
	.page-template-book-appointment-new #owl-carousel-book-apt{
		    width: 100%;
		    margin-top: 60px;
	}
	.page-template-book-appointment-new .directions h2,
	.page-template-book-appointment-new .directions p{ text-align:center; }
	.page-template-book-appointment-new .zocdoc .columns a{
		display: block;
		width:300px;
	}
	.page-template-book-appointment-new .zocdoc .columns h2{
		margin-top:0;
	}
	.page-template-book-appointment-new .zocdoc .columns{
		padding:0 !important;
	}
	.page-template-book-appointment-new .hero h1{
		font-size:30px;
	}
	.page-template-book-appointment-new h2,
	.page-template-book-appointment-new .commitment .columns h2,
	.page-template-book-appointment-new .zocdoc .columns h2{
		font-size:26px;
	}
	.page-template-book-appointment-new .directions h2{
		font-size:24px;
		margin-top: 40px;
	}
	.page-template-book-appointment-new .zocdoc .columns a{
		padding: 10px 20px;
	}
	.page-template-book-appointment-new .booking-apt .columns ul{
		margin-bottom: 10px;
	}
	.page-template-book-appointment-new .directions h2:first-child{
		margin-top:20px;
	}
	.page-template-book-appointment-new .directions-title h2,
	.page-template-book-appointment-new .directions h2,
	.page-template-book-appointment-new .directions p{
		text-align:left;
	}

}
@media only screen and (max-width: 325px) {
	.page-template-book-appointment-new .zocdoc .columns a,
	.page-template-book-appointment-new .hero .book-apt a.btn, .page-template-book-appointment-new a.btn{
		width: auto;
		font-size:14px;
	}

}


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	<?php
		
	// Default
	//section_default();
	function section_default() {
				
		global $post;
		
		$attr = array( 'class' => 'section default' );
		_s_section_open( $attr );		
			print( '<div class="column row">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
		
			echo '</div>';
		_s_section_close();	
	}
	?>







	<section class="section hero" id="hero" role="region" aria-labelledby="banner" style="background: url('https://pdskin.com/wp-content/uploads/2020/05/hero-book-appointment@3x-scaled-1.jpg') 70% 0px / cover no-repeat;">
		<div class="flex">
		   <div class="wrap">
			  <div class="row">
				 <div class="small-12 columns">
					<div class="panel teledermatology book-apt">
					   <h1>Introducing a better way to book your appointment.</h1>
					   <p>
					   	<a class="btn" href="https://phreesia.me/premierderm-selfschedule-default"><span>BOOK APPOINTMENT ONLINE</span></a>
					   	<!-- <a class="btn" href="https://phreesia.me/premierderm-selfschedule-telederm"><span>SET UP VIRTUAL VISIT</span></a> -->
					   </p>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	</section>
	<section class="row small-12 default-padding text-center booking-apt">
		<div class="columns">
			<img src="https://pdskin.com/wp-content/uploads/2020/05/bitmap@3x-1.jpg"/>
		</div>
		<div class="columns">
			<h2>Healthier skin starts with smoother scheduling</h2>
			<p>Forget about waiting around until office hours so you can call to book an appointment. In fact, there’s no reason to call, or sit on hold, at all. Our convenient online booking option allows you to:</p>
			<ul>
				<li>Choose your doctor and preferred office location</li>
				<li>Find the day and time that work best for you</li>
				<li>Avoid phone trees, holding, or waiting for a returned call</li>
				<li>Book whenever you’re ready—24/7/365</li>
				<li>Take control of the entire booking and check-in process</li>
			</ul>
			<a class="btn" href="https://phreesia.me/premierderm-selfschedule-default"><span>BOOK NOW WITH EASE</span></a>
		</div>
	</section>
	<section class="site-main row directions-title">
		<div class="large-12 columns">
			<h2>Convenient. Streamlined. Safe. <br class="mob-hide">Our New Online <span style="white-space:nowrap;display:inline;">Pre-Visit</span> Experience</h2>
		</div>
	</section>
	<section class="site-main row directions">
		<div class="large-6 columns bg-green">
			<h2>Online Scheduling & Booking</h2>
			<p>Our online scheduling and booking process respects your time. Whether you’re a new patient or an existing one, you can instantly book your preferred doctor, day, and time, utilizing a secure, three-factor authentication. That means no new password or user name to remember—or worse, to forget.</p>
			<h2>Check-in prior to your visit</h2>
			<p>Even better, you can check-in prior to your visit and then skip the waiting room altogether. Just use our pre-visit option to complete patient forms, note any demographic changes, fill in your health history, and even take care of your co-pay. You’ll save time and avoid unnecessary exposure to others on the day of your visit.</p>
			<h2>No Contact Experience</h2>
			<p>We’ve made the entire check-in process a no-contact experience. Simply complete the online pre-visit process and utilize our two-way texting service once you arrive. That way, you can go directly from the safety of your car, straight into a disinected exam room. You’ll bypass the paperwork, other patients, and any touching of pens, paper, or clipboards.</p>
		</div>
		<div class="large-6 columns bg-white">
			<div id="owl-carousel-book-apt" class="owl-carousel owl-theme">
			   <div class="item"><img src="https://pdskin.com/wp-content/uploads/2020/05/slide-3-1.jpg" alt="Iphone Demo"></div>
			   <div class="item"><img src="https://pdskin.com/wp-content/uploads/2020/05/slide-4-1.jpg" alt="Iphone Demo"></div>
			   <div class="item"><img src="https://pdskin.com/wp-content/uploads/2020/05/slide-5-1.jpg" alt="Iphone Demo"></div>
			</div>
		</div>
	</section>
	<section class="row small-12 default-padding text-center commitment">
		<div class="columns">
			<img src="https://pdskin.com/wp-content/uploads/2020/05/circle-icon-img-1.png"/>
		</div>
		<div class="columns">
			<h2>We’ve made your safety our top priority</h2>
			<p>Rest assured, we’re taking every precaution to protect your health. From our investment in technology to enable a touchless check-in and a parking lot waiting room experience, to donning PPE, to extra disinfecting steps to ensure cleanliness, to virtual visits for specific conditions, our goal is to make sure your visit with us is the healthiest, most stress-free, and convenient experience possible.</p>
		</div>
	</section>
	<section class="row small-12 default-padding text-center zocdoc">
		<div class="columns">
			<h2>Used Zocdoc to book your last appointment? Schedule your appointment&nbsp;here.</h2>
		</div>
		<div class="columns">
			<a href="https://www.zocdoc.com/wl/pdskin/search" target="_blank">BOOK ZOCDOC APPOINTMENT</a>
		</div>
	</section>


	
	</main>


</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<script>
	// document.addEventListener("DOMContentLoaded", function() {
		(function($) {
		console.log("readdyyyyy")
  		$('#owl-carousel-book-apt').owlCarousel({
 			  loop:true,
		      navigation : true, 
		      slideSpeed : 300,
		      singleItem:true,
		      paginationSpeed : 400,
		      items : 1,
		      navigationText: ["<",">"],
		      navigationDots: true,
		      responsive : {
			    0 : {
			        items : 1
			    }
			}
		 
		  });
	})(jQuery);


	// $( document ).ready(function() {
		
	// });
</script>
	


<?php
get_footer();
