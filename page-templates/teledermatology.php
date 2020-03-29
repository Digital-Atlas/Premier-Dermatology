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


	@media screen and (max-width: 800px) {
		.site-footer { padding: 0; }
		.site-footer .widget { margin: 0; }
		.bg-green { padding: 30px; }
	    .bg-white { padding: 30px; }
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
