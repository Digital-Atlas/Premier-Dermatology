<?php
/*
Template Name: Teledermatology
*/

get_header('teledermatology'); 

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
	.footer-logo, .site-footer ul, .site-footer .widget h4 { display: none; }
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
	.site-content{ top: 0 !important; padding-top: 0 !important; }


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
	}
	@media screen and (min-width: 640px) and  (max-width: 1123px) {
		.page-template-page-teledermatology .hero-unit{ padding:30px 0 180px 0 !important; }
	}
	@media only screen and (max-width: 641px) {
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
<section class="row small-12 default-padding text-center" style="margin-top: 0px; background-color:#fcee4d; padding: 15px;">
	<h4 style="margin-bottom:0;">You can find the latest information about COVID-19 (coronavirus) 
		<a href="https://pdskin.com/message-corona-virus/" target="_blank">here.</a>
	</h4>
</section>
<?php
get_footer();
