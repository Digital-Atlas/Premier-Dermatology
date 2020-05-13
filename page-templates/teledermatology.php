<?php
/*
Template Name: Teledermatology
*/

get_header(); 

$heading = sprintf( '<h1>%s</h1>', get_post_meta( get_the_ID(), 'hero_heading', true ) );
$subheading = get_post_meta( get_the_ID(), 'hero_subheading', true );
?>
<style>
	.page-template-teledermatology .center { text-align: center; }
	.page-template-teledermatology .main-info h2 { margin-bottom: 30px; }
	
	.page-template-teledermatology .home { position: relative; z-index: 1; }
	.page-template-teledermatology .section.hero h1 { white-space: nowrap; }
	@media screen and (min-width: 801px) {
		.page-template-teledermatology .main-info { margin-top: 80px; margin-bottom: 30px; }
		.page-template-teledermatology .form-container { 
			margin: -130px 100px 60px 100px;
			background: white;
			z-index: 8;
			position: relative; 
		}
	
	.page-template-teledermatology .gform_fields {
		display:flex !important;
		flex-wrap: wrap;
	}
	.page-template-teledermatology .gform_fields li {
		width: 50%;
		flex: 0 0 50%;
	}
	.page-template-teledermatology form { max-width: 900px; }
	.page-template-teledermatology .gform_fields li input { width: 100% !important; }
	.page-template-teledermatology .gform_fields li select { width: 100% !important; }
	.page-template-teledermatology .gform_wrapper .gform_footer { text-align: center; margin-top: 26px;}
	.page-template-teledermatology #field_8_27, .page-template-teledermatology #field_8_28 {
		width: 25%;
		flex: 0 0 25%;
	}
	}
	.bg-green { background-color: #a1c05f; padding: 60px 60px 36px 100px;color: #fff; }
	.bg-green p, .bg-green h2, .bg-white p, .bg-white h2 { color: #fff; }
	.bg-white { background-color: #307DA1; padding: 60px 100px 36px 60px; }
	/*.footer-logo, .site-footer ul, .site-footer .widget h4 { display: none; }*/
	.site-footer { min-height: auto; }
	.patient-forms { background-color: #ccc; padding: 60px 0; }
	.info-item img { display:block; margin: 0 auto;}
	.patient-forms btn {
		display: block;
	}

	/*.main.form-button-wrapper{  }*/


	.main.facetime{ padding-bottom:50px !important; padding-top:20px !important; display: flex; }
	.main.facetime .columns{ padding:0; padding: 0 140px !important; text-align: left;}
	/*.main.facetime .columns.right{ text-align:right; }*/
	/*.main.facetime .columns.left{ padding-right:30px !important; padding-top:30px !important; }*/
	.main.facetime:not(.zoom) .columns.left{ padding-right:30px !important; padding-top:30px !important; }

	.main.facetime .columns{ text-align: left !important; }
	.main.facetime.zoom .columns p{ margin: 10px 0 10px; }
	/*.main.facetime .columns.right{ text-align:right; }*/
	/*.main.facetime:not(.zoom) .columns.left{ padding-right:30px !important; padding-top:30px !important; }*/


	.main.facetime .button{
		color: #fff;
	    display: inline-block; 
	    font-family: Century Gothic,sans-serif;
	    text-decoration: none;
	    text-transform: uppercase;
	    background: #86a641;
	    letter-spacing: 2px;
	    line-height: 24px;
	    font-size:14px;
	    border: none;
	    outline: none;
	    padding: 10px 40px;
	    border-radius: 100px;
	    text-align: center;
	    position: relative;
	}
	.page-template-page-teledermatology .hero-unit{ margin-top: 50px !important; padding: 50px 0 180px 0 !important; }
	.page-template-page-teledermatology .hero-intro #mdg_link_how_it_works{ display:none !important; }
	.site-content{ top: 243px !important; padding-top: 243px !important; }


	.page-template-teledermatology .faq{background-color: #ffffff; padding: 70px 140px !important; }
	.page-template-teledermatology .faq .faq-wrapper{border-bottom: 2px solid #53b1c1; margin: 25px 0; text-align: left; position:relative; padding-right:20px; padding-bottom:20px;}
	.page-template-teledermatology .faq .faq-wrapper h3{font-size: 19px;}
	.page-template-teledermatology .faq .faq-wrapper p{font-size: 17px;}
	.page-template-teledermatology .faq .faq-wrapper ul{font-size: 17px; list-style:inside;}
	.page-template-teledermatology .faq .faq-wrapper .more-content{max-height:0; overflow: hidden; transition: max-height 1s;transition-timing-function: linear;}
	.page-template-teledermatology .faq .faq-wrapper button{position: absolute; top: 0; right: 0; transform: rotate(90deg); color: #53b1c1; font-size: 30px; background-color:transparent;outline: 0 !important;box-shadow: 0 0 0 0 rgba(0, 0, 0, 0) !important;}
	.page-template-teledermatology .faq .faq-wrapper.active button{transform: rotate(-90deg);}
	.page-template-teledermatology .faq .faq-wrapper.active .more-content{max-height:1000px;}


	@media screen and (max-width: 800px) {
		.site-footer { padding: 0; }
		.site-footer .widget { margin: 0; }
		.bg-green { padding: 30px; }
	    .bg-white { padding: 30px; }
	}


	@media screen and (max-width: 63.9375rem) {
		.info-item { padding: 20px; }
		.warning img { display: block; margin: 0 auto !important; } 
		#footer-connect p { font-size: 10px !important; }
	}
	@media screen and (max-width: 1023px) {
		.main.facetime .columns{
			padding:30px !important;
		}
		
	}
	@media screen and (min-width: 801px) and  (max-width: 1123px) {
		.main.facetime .columns.right{ padding: 0 60px !important; }
	}
	@media screen and (min-width: 640px) and  (max-width: 800px) {
		.gform_wrapper .top_label input.medium, .gform_wrapper .top_label select.medium{ width:100%; }
		.site-content{ top: 0px !important; padding-top: 0px !important; }
	}
	@media screen and (min-width: 640px) and  (max-width: 1123px) {
		.page-template-page-teledermatology .hero-unit{ padding:30px 0 180px 0 !important; }
	}
	@media only screen and (max-width: 641px) {
		.site-content{ top: 0px !important; padding-top: 0px !important; }
		.main.facetime{ flex-direction:column-reverse; padding: 30px !important; }
		.main.facetime .columns .button{ width:auto !important; }
		.main.facetime .columns.right{ padding-top: 0 !important; }
		.main.facetime .columns.left{padding-right: 0 !important; padding-top: 0 !important; padding: 20px 0 !important;}
		.main.facetime.zoom .columns{ padding-right: 0 !important; padding-top: 30px !important; padding-bottom: 30px !important; }
		.main.facetime .columns{ padding: 0 !important; }
		.page-template-page-teledermatology .h1{ font-size:2.5rem !important; line-height:3rem !important; }
		.page-template-page-teledermatology .hero-unit{ margin-top:0 !important; padding:0 !important; }
		.page-template-page-teledermatology .hero-unit .hero-summary{ margin-bottom:425px; }
		.hero-unit { background-image: url(https://forefrontdermatology.com/images/teledermatology-hero_mobile.png) !important; height: 115vw; min-height: 500px; background-position: center bottom;}
		.hero-unit { background-position: -410px 0; }
		h2 { font-size: 24px;}
	}
	@media screen and (max-width: 800px){
		.page-template-teledermatology .faq{ padding: 30px 10px !important; }
	}
</style>
<div class="home">
<section class="section hero" id="hero" role="region" aria-labelledby="banner" style="background: url('https://pdskin.com/wp-content/uploads/2020/03/premier-dermatology-cosmetic-young-woman.jpg') 70% 0px / cover no-repeat;">
<div class="flex">
   <div class="wrap">
	  <div class="row">
		 <div class="small-12 columns">
			<div class="panel" style="max-width: 63%">
			   <h1 style="white-space: nowrap;"><?php echo $heading;  ?></h1>
			   <h5><?php echo $subheading;  ?></h5>
			</div>
		 </div>
	  </div>
   </div>
</div>
</section>
</div>

<div id="primary" class="content-area form-container">

	<main id="main" class="site-main" role="main">
	<?php
			
	
	// Default
	section_default();
	function section_default() {
				
		global $post;
		
		$attr = array( 'class' => 'section default' );
		_s_section_open( $attr );		
			print( '<div class="column row"><div class="entry-content">' );
		
				while ( have_posts() ) :
		
					the_post();
					
					the_content();
						
				endwhile;
		
			echo '</div></div>';
		_s_section_close();	
	}
	
	?>
	<div class="wrap center main-info" >
		<h2 class="title">Get Skincare Advice And Answers Faster. Call&nbsp;<a href="tel:+18157414343" rel="nofollow" class="nowrap">(815) 741-4343</a></h2>
		<div class="row">
			<div class="large-4 medium-4 columns">
				<div class="info-item">
					<img src="https://pdskin.com/wp-content/uploads/2020/03/schedule.svg" alt="Schedule"  height="35" width="32" /><br>
					<h2>Schedule</h2>
					<p>Fill out the form above or call <a href="tel:+18157414343" rel="nofollow" class="nowrap">(815) 741-4343</a>  and a team member will call you back to schedule your appointment. </p>
				</div>
			</div>
			<div class="large-4 medium-4 columns">
				<div class="info-item">
					<img src="https://pdskin.com/wp-content/uploads/2020/03/consultation.svg" alt="Consultation" height="35" width="35" /><br>
					<h2>Consultation</h2>
					<p>At the time of your appointment, your dermatologist will contact you via your mobile number or email to start your virtual visit. Apple, Android, PC, or Mac devices can be used for these visits.</p>
				</div>
			</div>
			<div class="large-4 medium-4 columns">
				<div class="info-item">
					<img src="https://pdskin.com/wp-content/uploads/2020/03/feel-better.svg" alt="Feel Better" height="35" width="33" /><br>
					<h2>Feel Better</h2>
					<p>Get peace of mind with a complete review of your skin condition and guidance to help ease your mind.</p>
				</div>
			</div>
		</div>
	<div>
</main>
</div>
<section class="row small-12 no-padding text-center main white-bg facetime zoom" role="main" aria-label="Patient Forms">
    <div class="large-6 columns left">
        <h2>How To Use Zoom For Your Appointment?</h2>
        <img class="facetime-cta" src="https://pdskin.com/wp-content/uploads/2020/04/zoom-phone.png">
		<p>Here are directions for using the Zoom app to start a visit with your doctor.</p>
		<a href="https://pdskin.com/PDF/Zoom-Mobile-User-Guidelines-Forefront-Dermatology.pdf" target="_blank" class="button big">VIEW ZOOM USER GUIDE</a>
    </div>
    <div class="large-6 columns right">
        <h2>How To Use FaceTime For Your Appointment?</h2>
        <img class="facetime-cta" src="https://pdskin.com/wp-content/uploads/2020/04/bitmap@3x-1.png">
		<p>Here are directions for using the Apple FaceTime app to start a visit with your doctor.</p>
		<a href="https://pdskin.com/PDF/FaceTime-User-Guide-Forefront-Dermatology.pdf" target="_blank" class="button big">VIEW FACETIME USER GUIDE</a>
    </div>
</section>

<?php /*
<div class="content-area">
	<main class="patient-forms" role="main">
		<div class="wrap">
			<div class="row">
				<div class="large-6 columns">
					<h2>Patient Forms</h2>
					<p>Lorem Ispum</p>
				</div>
				<div class="large-6 columns">
					<a class="btn">Download Patient Forms</a>
					<a class="btn" href="mailto:patientforms@ffd.com">Email COmpleted Forms</a>
				</div>
			</div>
		<div>
	</main>
</div>
*/ ?>
<div class="site-main row" style="background-color:#307DA1;">
		<div class="large-6 columns bg-green">
			<h2>Teledermatology is covered by Medicare, Medicaid, and most insurance companies.</h2>
			<p>You should call your insurance carrier to confirm if Teledermatology is a covered benefit. </p>
		</div>
		<div class="large-6 columns bg-white">
			<h2>$99 Uninsured Established Patient Teledermatology Rate</h2>
			<!-- <p>FaceTime is required in order for this to be a visit.</p> -->
		</div>
</div>
<section class="row small-12 no-padding text-center main faq" role="main" aria-label="Contact Us">
    <div class="large-12 columns">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-wrapper">
        	<h3>What is teledermatology?</h3>
        	<div class="more-content">
        		<p>Teledermatology is an alternative way for a dermatologist, to provide a dermatology diagnosis & treatment plan if appropriate. You conduct a live video via your smart phone, tablet, or laptop that allows you to address most skin concerns you may have with your dermatologist. While not all dermatology needs can be met through teledermatology, this option can be a valuable tool for patients who would like to see and talk with a doctor from the comfort and safety of their own home.</p>
        		
        	</div>
        	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>What conditions or types of appointments does teledermatology work best for?</h3>
        	<div class="more-content">
	        	<p>The types of appointments that an online dermatology consultation are most effective for include:</p>
	        	<ul>
	        		<li>Skin conditions of the face, like acne or rosacea, characterized by pimples and/or redness</li>
	        		<li>Hand dryness or itching, as well as hand rashes from excessive hand-washing</li>
	        		<li>Most rashes, such as eczema, psoriasis, hives, dandruff, and itching</li>
	        		<li>Excessive sweating (hyperhidrosis)</li>
	        		<li>Fungal infections like athlete’s foot or ringworm</li>
	        		<li>Warts (when topical options can be prescribed)</li>
	        		<li>Cold sores on the lips</li>
	        		<li>Anti-aging skincare questions</li>
	        		<li>Certain types of hair loss, provided they are not accompanied by scarring, excessive scaling, or pus drainage</li>
	        	</ul>
	        </div>
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>What types of conditions or visits are not well-suited for an online dermatology consultation?</h3>
        	<div class="more-content">
	        	<p>Conditions and examinations that are better suited for in-person visits include:</p>
	        	<ul>
	        		<li>Full body skin cancer checks</li>
	        		<li>Evaluations of single lesions, like a dark spot or a changing mole, that requires a close, in-person evaluation, possibly with a magnifying scope (dermatoscope)</li>
	        		<li>Certain types of hair loss that are accompanied by scarring, excessive scaling, or pus drainage</li>
	        		<li>Autoimmune conditions like lupus or dermatomyositis</li>
	        		<li>Large skin ulcers</li>
	        		<li>Infected wounds</li>
	        		<li>Severe rashes that are accompanied by painful skin, blisters, fever, sores on the lips/mouth/eyes/genital areas, feeling ill, oozing, or drainage</li>
	        		<li>Any skin condition that is causing extreme discomfort or pain</li>
	        	</ul>
	        </div>
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>How is a new patient visit different from an established patient visit?</h3>
        	<div class="more-content">
        		<p>Although similar, a new patient online dermatologist consultation usually takes a bit longer than an established patient visit. This is because we need to discuss your medications, allergies, medical history, and family history in addition to any current concerns. Depending on your insurance coverage, there can also be cost differences between a new patient and an established patient.</p>
        	</div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">

        	<h3>Can I receive care for more than one area of concern during the visit?</h3>
        	<div class="more-content">
	        	<p>In general, if there is a major concern, it is best to give this the full attentionit deserves. If there are minor concerns that you would like to discuss with your dermatologist afterward, you can do so, provided there’s enough time.</p>
	        	<p>For example, if you would like to discuss a bothersome rash, but also have some warts, it would be best to direct the doctor’s attention to the rash first, and then, time permitting, discuss the warts.</p>
	        	<p>If you have several, more minor concerns, it may be possible to address all ofthem in the same visit. For example, if you have hand dermatitis from hand-washing, plus a small area of eczema, and a cold sore, these might all be addressed together, time permitting.</p>
	        	<p>Ultimately, concerns need to be prioritized by both the patient and the doctor to optimize the visit in the safest and most effective manner.</p>
	        </div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>Can an Accutane follow–up be conducted via telederm?</h3>
        	<div class="more-content">
	        	<p>Yes, the Accutane follow-up with the doctor can be conducted via teledermatology. However, the doctor will still require a monthly pregnancy test for females, and may request blood tests as well.</p>
	        </div>
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>Can prescriptions be prescribedduring a teledermatology appointment?</h3>
        	<div class="more-content">
	        	<p>Prescriptions can be sent to your pharmacy following a dermatology diagnosis online. For example, if your doctor discusses your acne and a treatment plan is developed, prescriptions for the appropriate topical medications and/or oral pills will then be sent to the pharmacy, usually electronically.</p>
	        	<p>However, there are some conditions and/or medications that require an in-person visit prior to issuing a prescription.</p>
	        </div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>What type of setting is best for my visit?</h3>
        	<div class="more-content">
        		<p>The best setting for a teledermatology visit is a private, well-lit, quiet room. It is best to face a window, rather than have your back to the window. This will optimize the lighting, allowing your doctor to easily view the area of concern. Sitting at a desk or a table can also be useful to avoid unnecessary movement. If possible, having someone with you who has the ability to hold your smartphone allows better visibility for hard to reach areas of concern.</p>
        	</div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>What should I wear formy visit?</h3>
        	<div class="more-content">
        		<p>Wear appropriate, comfortable clothing that allows you to present the area of concern.</p>
        	</div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>How long will the visit take?</h3>
        	<div class="more-content">
        		<p>Althoughthe time required for your visit will vary depending on your dermatologistand the skin concern, teledermatology visits generally take from 10 to 20 minutes.</p>
        	</div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>Will I need to come in for an office visit, too?</h3>
        	<div class="more-content">
	        	<p>In some cases, your dermatologist will decide that your condition requires an in-person evaluation, following the teledermatology visit. Typical examples include:</p>
	        	<ul>
	        		<li>Concerns about skin cancer</li>
	        		<li>Lack of improvement in a condition after completing the recommended treatment</li>
	        		<li>The need to evaluate a condition in more detail in order to make a properdiagnosis</li>
	        	</ul>
	        </div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>Do I need a referral for a telederm visit?</h3>
        	<div class="more-content">
        		<p>If your insurance coverage normally requires you to attain a referral for an in-person visit to a skin specialist, a referral will be needed for your telemedicine dermatologist visit. If your primary care doctor is unable to issue a referral for your telemedicine visit, we recommend that you call the member services number listed on your insurance ID card, so that your insurance provider can issue the referral.</p>
        	</div>	
        	<button>></button>
        </div>
		<div class="faq-wrapper">
        	<h3>Is my telederm visit covered by insurance?</h3>
        	<div class="more-content">
        		<p>Coverage is always decided by your individual insurance policy, although most major insurance companies have announced that they will cover telemedicine visits.In fact, many are covering such visits with no required co-pays or co-insurance from members during the pandemic. Check with your insurance provider for details.</p>
        	</div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>If I don’t have health insurance, what can I expect to pay for a telederm visit?</h3>
        	<div class="more-content">
        		<p>If you are an uninsured new patient, the cost of your telederm consultation will be $135. If you are an uninsured established patient, the cost will be $99.</p>
        	</div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>How do I know my conversation, photos, and video images will be kept private?</h3>
        	<div class="more-content">
	        	<p>When you see a dermatologist online, the video and audio communications during your telehealth visit are encrypted in transit (as the data crosses the Internet).This means the video and audio data pass through our service providers’ data centers for routing purposes only. The data is neither stored by these providers, nor by Forefront.</p>
	        	<p>In addition, our IT security team reviews telehealth security news and developments daily, and works with our telehealth service providers and our cybersecurity consulting partners to ensure we follow industry-leading practices.</p>
	        </div>	
        	<button>></button>
        </div>
        <div class="faq-wrapper">
        	<h3>What type of device is best for a telederm visit?</h3>
        	<div class="more-content">
	        	<p>We recommend a smartphone or tablet given its portability for your visit rather than a desktop computer with a camera. Your dermatologist may need to view your area of concern from different angles and this can be accomplished better with a portable device.</p>
	        </div>	
        	<button>></button>
        </div>
    </div>
</section>
<section class="row small-12 default-padding text-center" style="margin-top: 0px; background-color:#fcee4d; padding: 15px;">
	<h4 style="margin-bottom:0;">You can find the latest information about COVID-19 (coronavirus) 
		<a href="https://pdskin.com/message-corona-virus/" target="_blank">here.</a>
	</h4>
</section>
<script>
		(function($) {
		// alert("readdyyyyy")
		$('.faq-wrapper button').on('click', function(){
			var button = $(this)
			var container = button.closest('.faq-wrapper');
			container.hasClass('active') ? container.removeClass('active') : container.addClass('active')
		})
	})(jQuery);
</script>
<?php
get_footer();
