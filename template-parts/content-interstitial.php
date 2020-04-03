<?php
$phone = '855-535-7175';
if(is_singular('location')){
	$status = get_post_meta(get_the_ID(), 'covid_status')[0];
	$phone = get_field('phone');
} else {
	$status = get_option('covid_status');
}

$hours = [];

if( have_rows('opening_hours') ):
	while ( have_rows('opening_hours') ) : the_row();
		$hours[substr(get_sub_field('day'), 0, 3)] = get_sub_field('time'); 
	endwhile;
endif;	

$days = parse_office_hours( get_field('office_hours'));

$interstitial = [
	"CLOSED" => "For the safety of our staff and patients, our office is temporarily&nbsp;closed.",
	"CLOSED_TELEDERM" => "For the safety of our staff and patients, our office is temporarily closed. However, we are offering <a href='/teledermatology/'>Teledermatology</a>, appointments at this time to help assist you from the comfort of your own&nbsp;home.",
	"OPEN" => "Our clinic is currently open and seeing patients. If you need to book an appointment, please call <a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a>. We continue to provide dermatologic care during this challenging time, however if you are experiencing a fever, shortness of breath or have come into contact with a <div class='nowrap'>COVID-19</div> patient who has tested positive, we request that you reschedule your&nbsp;appointment.",
	"OPEN_TELEDERM" => "Our location is currently open and seeing patients. If you need to book an appointment, please call <a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a>. We are also proud to announce that we are offering teledermatology at this time to help assist you from the comfort of your own home. If you are experiencing a fever, shortness of breath or have come into contact with a <div class='nowrap'>COVID-19</div> patient who has tested positive we request that you schedule a teledermatology visit or reschedule your&nbsp;appointment.",
	"REDUCED_HOURS_TELEDERM" => "
	Our clinic is currently open but we do have reduced hours. We are currently open from ".$days[date('N')][0]." - ".$days[date('N')][1].". Call <a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a> to book an appointment today! We are also proud to announce that we are offering teledermatology at this time from ".$days[date('N')][0]." - ".$days[date('N')][1]." and even on the weekends to help assist you from the comfort of your own home! If you are experiencing a fever, shortness of breath or have come into contact with a COVID-19 we request that you schedule a teledermatology visit or reschedule your&nbsp;appointment.",
	"EMERGENCIES_ONLY_TELEDERM" => "During the <div class='nowrap'>COVID-19</div> pandemic, our office is OPEN for urgent care only. We are also offering teledermatology for any skin concern. If you are experiencing a fever, shortness of breath or have come into contact with a <div class='nowrap'>COVID-19</div> we request that you schedule a teledermatology visit or reschedule your appointment. We can be reached at&nbsp;<a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a>.",
	"BRAND_OPTION_A" => "For the safety of our staff and patients, our offices are temporarily&nbsp;closed.",
	"BRAND_OPTION_B" => "We are sorry for the inconvenience, but unfortunately some of our offices are closed at this time. Please check your local clinic to see hours of&nbsp;operation.",
	"OPEN_TELEDERM_ORDINANCE" => "During the COVID-19 pandemic, our office is OPEN and seeing patients. We are also offering teledermatology for many skin concerns. In complying with WI Emergency Order #12, if in the past two weeks you have traveled outside your local community in WI, or have a fever/cough or known/suspected COVID-19 exposure, you will need to reschedule your appointment.",
	"EMERGENCIES_ONLY" => "During the <div class='nowrap'>COVID-19</div> pandemic, our office is OPEN for urgent care only. We can be reached at&nbsp;<a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a>.",
	"BRAND_TELEDERM" => "We are proud to announce that our locations are now offering teledermatology at this time to help assist you from the comfort of your own home. If you are experiencing a fever, shortness of breath or have come into contact with a COVID-19 patient who has tested positive we request that you schedule a teledermatology visit or reschedule your appointment. Please visit your local clinic to confirm hours of operation. ",
	"GRAND_RAPIDS_EAST_PARIS" => "We apologize for the inconvenience but our Grand Rapids location has been closed. Please visit our neighboring location on Cascade Road which is less than a mile away. Or call us at (616) 678-2070 to schedule an appointment today.",
	"EAST_LANSING" => "Our clinic is currently open but we do have reduced hours. We are currently open Monday (for Mohs) from 8am to 3pm. Call <a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a> to book an appointment today! We are also proud to announce that we are offering teledermatology at this time that is available even on the weekends to help assist you from the comfort of your own home! If you are experiencing a fever, shortness of breath or have come into contact with a COVID-19 we request that you schedule a teledermatology visit or reschedule your appointment.",
	"CRANBERRY_TOWNSHIP" => "Our clinic is currently open but we do have reduced hours. We are currently open on Wednesday and Thursday from 7am to 5pm. Call <a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a> to book an appointment today! We are also proud to announce that we are offering teledermatology at this time that is available even on the weekends to help assist you from the comfort of your own home! If you are experiencing a fever, shortness of breath or have come into contact with a COVID-19 we request that you schedule a teledermatology visit or reschedule your appointment.",
	"CORP_DRIVE" => "Our clinic is currently open but we do have reduced hours. We are currently open on Monday and Tuesday from 7am to 5pm. Call <a href='tel:+1".$phone."' rel='nofollow' class='nowrap'>".$phone."</a> to book an appointment today! We are also proud to announce that we are offering teledermatology at this time that is available even on the weekends to help assist you from the comfort of your own home! If you are experiencing a fever, shortness of breath or have come into contact with a COVID-19 we request that you schedule a teledermatology visit or reschedule your appointment.",
];

if($status != 'NONE' && !empty($status)) {
?>
<div id="interstitial">
	<div class="content">
		<div class="title">Our Response To <div class="nowrap">COVID-19</div></div>
		<?php echo $interstitial[$status]; ?><br>
		<?php if(strpos($status, "TELEDERM") !== false) { ?> <a href="tel:+1<?php echo $phone; ?>" class="button">CALL NOW TO SCHEDULE</a> <?php } ?>
		<a class="close close-interstitial" href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/icons/x.svg" ?>" width="26" height="26" alt="close" /></a>
	</div>
</div>
<?php } ?>