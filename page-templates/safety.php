<?php
/*
Template Name: Safety
*/

get_header(); 

$heading = sprintf( '<h1>%s</h1>', get_post_meta( get_the_ID(), 'hero_heading', true ) );
$subheading = get_post_meta( get_the_ID(), 'hero_subheading', true );
$status = get_option('hero_status'); 
$location = isset($_GET['l'])?$_GET['l']:'';
?>
<style>
    .safety-wrapper { background: #EFE1D0; }
    .safety-wrapper h1 { text-align: center; margin-top: 60px; text-transform: none;  }
    .safety-wrapper .intro { text-align: center; max-width: 850px; margin: 20px auto 60px auto; font-size: 21px; line-height: 1;}
	.safety-wrapper .content .safety-list {display: -webkit-box;display: -moz-box;display: -ms-flexbox;display: -webkit-flex;display: flex; -webkit-flex-wrap: wrap;-ms-flex-wrap: wrap;flex-wrap: wrap; margin-left: -40px; margin-right: -40px; }
    .safety-wrapper .content .safety-list .item { width: calc(50% - 160px);  -webkit-flex-grow: 0;-webkit-flex-shrink: 0;-webkit-flex-basis: calc(50% - 160px);-webkit-box-flex: 0;-moz-box-flex: 0;-webkit-flex: 0 0 calc(50% - 160px);-ms-flex: 0 0 calc(50% - 160px);flex: 0 0 calc(50% - 160px); margin-left: 80px; margin-right: 80px; margin-bottom: 80px; }
    .safety-wrapper .content .safety-list .info-item img { margin: 0 auto 20px auto; display: block; }
    .safety-wrapper .content .safety-list .info-item p { font-size: 16px; line-height: 24px; letter-spacing: 0.25px; color: #000000; }
    .safety-wrapper .content .safety-list .info-item h2 { font-size: 30px; line-height: 36px; color: #000;}
    .safety-wrapper .content .safety-list .info-item.with-cta {padding-top: 140px; }
    .safety-wrapper .content .safety-list .info-item.with-cta h2.h1 { text-transform: none; font-size: 44px; margin-bottom: 20px; }
    .pre-visit .wrap { padding-top: 60px; padding-bottom: 60px; }
    .pre-visit .wrap ul { margin-left: 20px; }
    .pre-visit .wrap ul { margin-bottom: 20px; }
    .pre-visit .padding-left-90 { padding-left: 90px; }
    @media screen and (max-width: 60.5625em) {
        .safety-wrapper .content .safety-list { display: block; margin: 0; }
        .safety-wrapper .content .safety-list .item { width: 100%; margin-left: 0; margin-right: 0; }
        .pre-visit .padding-left-90 { padding-left: 0px; }
        .wrap { margin: 20px; }
        .safety-wrapper .content .safety-list .info-item.with-cta {padding-top: 40px;padding-bottom: 40px; }
    }
</style>
<section class="safety-wrapper">  
    <div class="content wrap">
      <div class="row">
        <h1>Your safety is our priority.</h1>
        <div class="intro">
        <?php if(!empty($location)): ?>
         <p>There is no higher priority for us than the health and safety of our patients and staff. At <?php echo get_the_title($location); ?>], we are taking these safety measures based on Illinois and local regulations. If you need expert dermatology care for your skin, hair and nails, we want you to be assured that we’re taking every precaution to ensure you safety and make your visit with us the healthiest, most stress-free, and convenient experience possible.</p>
        <?php else: ?>
        <p>There is no higher priority for us than the health and safety of our patients and staff. All of our clinics are taking these safety measures based on Illinois and local regulations. If you need expert dermatology care for your skin, hair and nails, we want you to be assured that we’re taking every precaution to ensure you safety and make your visit with us the healthiest, most stress-free, and convenient experience possible. </p>
        <?php endif; ?>
        </div>
        </div>
       <div class="safety-list">
            <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-ppe.svg" alt="ppe" />
                    <h2>Personal Protective Equipment (PPE)</h2>
                    <p>Our staff are donning personal protective equipment including mask, eye protection and gloves. </p>
                </div>
            </div>
           <?php if(strpos($status, 'WITH_MASK') !== false): ?>
           <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-patient-masking.svg" alt="Patient Masking" width="135" />
                    <h2>Patient Masking</h2>
                    <p>For the safety of our patients and staff, we are requiring all patients to wear masks in our clinic<?php if(empty($location)) echo 's'; ?>. Patients with specific health issues that could be impacted by wearing a mask should notify reception upon entry.</p>
                </div>
            </div>
           <?php endif; ?>
            <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-cleaning.svg" alt="Cleaning" />
                    <h2>Stringent Cleaning</h2>
                    <p>We have always been dedicated to keeping our clinic<?php if(empty($location)) echo 's'; ?> clean. As an extra precaution during this time, we have increased the frequency of cleaning and disinfecting of all surfaces beyond our already stringent standards.</p>
                </div>
            </div>
           <?php if($status == 'SAFETY_PHREESIA' || $status == 'SAFETY_PHREESIA_WITHOUT_PARKING_LOT'): ?>
           <div class="item">
                <div class="info-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-no-contact.svg" alt="No Contact" />
                    <h2>No Contact Check-in </h2>
                    <p>Our online check-in system allows you to fill out your paper forms, make payments, and scan your insurance card prior to your visit. This eliminates contact with pens, paper and clipboards, and your exposure to the waiting room area.  </p>
                </div>
            </div>
           <?php endif; ?>
            <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-social-distancing.svg" alt="Personal Equipment" />
                    <h2>Social Distancing </h2>
                    <p>Social distancing is being adhered in our waiting room<?php if(empty($location)) echo 's'; ?>. We are also restricting visitors and only allowing companions for minors and anyone needing assistance.  </p>
                </div>
            </div>
             <?php if($status != 'SAFETY_WITHOUT_PARKING_LOT' && $status != 'SAFETY_PHREESIA_WITHOUT_PARKING_LOT'): ?>
            <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-parking-lot.svg" alt="Cleaning" />
                    <h2>Parking Lot Waiting rooms </h2>
                    <p>Our clinic<?php if(empty($location)) echo 's'; ?> is utilizing our parking lot as a waiting room<?php if(empty($location)) echo 's'; ?>. Prior to your visit, we will advise you to either call us upon arrival or check-in, provide the receptionist with your phone number and our office will call or text you when your doctor is ready to see you.</p>
                </div>
            </div>
           <?php endif; ?>
            <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-scheduling.svg" alt="creening at Scheduling" />
                    <h2>Screening at Scheduling </h2>
                    <p>When scheduling an appointment, we will ask additional screening questions, such as, if you have traveled recently, have a cough, or have had a fever within the past 14 days. If the answer is yes to any of these questions, we ask that you reschedule your appointment for a later date or book a teledermatology visit. </p>
                </div>
            </div>
            <div class="item">
                <div class="info-item">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pd-skin-health-protocol.svg" alt="Health Protocols and Safeguards" />
                    <h2>Health Protocols and Safeguards </h2>
                    <p>Following guidelines from trusted sources, including the World Health Organization (WHO) and the Centers for Disease Control (CDC), we're taking comprehensive measures to ensure that our clinic<?php if(empty($location)) echo 's'; ?> remains safe and ready to serve you. Patients should feel safer knowing our staff is practicing frequent and thorough hand-washing.  </p>
                </div>
           </div>
           <div class="item">
                <div class="info-item with-cta">
                     <?php if(!empty($location)): ?>
                     <h2 class="h1">It’s safe to come in,<br><?php echo get_the_title($location); ?>.</h2>
                    <?php else: ?>
                    <h2 class="h1">It’s safe to come in.</h2>
                    <?php endif; ?>
                    <p><a class="btn" href="https://phreesia.me/premierderm-selfschedule-default"><span>BOOK NOW WITH EASE ></span></a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(empty($location)): ?>
<section class="section pre-visit">
   <div class="wrap">
      <div class="row">
         <div class="small-12 large-6 columns">
            <h2>Our New Online Pre-visit Experience Makes It Easy </h2>
             <p>Forget about waiting around until office hours so you can call to book an appointment. In fact, there’s no reason to call, or sit on hold, at all. Our convenient online booking option allows you to:</p>
             <ul>
                <li>Choose your doctor and preferred office location</li>
                <li>Find the day and time that work best for you</li>
                <li>Avoid phone trees, holding, or waiting for a returned call</li>
                <li>Book whenever you’re ready—24/7/365</li>
                <li>Take control of the entire booking and check-in process</li>
            </ul>
         </div>
         <div class="small-12 large-6 columns padding-left-90">
           <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pre-visit-experience.jpg" alt="Pre-visit Experience" /> 
         </div>
      </div>
   </div>
</section>
<section class="section footer-cta" id="cta">
   <div class="wrap">
      <div class="row" data-equalizer="b6hkaz-equalizer" data-equalize-on="large" data-resize="8ia7a4-eq" data-mutate="ko1oej-eq" data-events="mutate">
         <div class="small-12 large-6 columns">
            <div class="table" data-equalizer-watch="" style="height: 136px;">
               <div class="cell">
                  <h3>Access the care you need, safely.</h3>
               </div>
            </div>
         </div>
         <div class="small-12 large-6 columns">
            <div class="table" data-equalizer-watch="" style="height: 136px;">
               <div class="cell">
                  <p><a class="btn" href="https://phreesia.me/premierderm-selfschedule-default"><span>BOOK NOW WITH EASE ></span></a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
endif;
get_footer();
