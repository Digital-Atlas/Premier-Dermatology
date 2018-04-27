<?php
/*
Template Name: Book Appointment Completed
*/

get_header(); ?>

<?php
// Hero
get_template_part( 'template-parts/section', 'hero' );

?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
	<?php
		
	// Default
	section_default();
	function section_default() {
				
		global $post;
		
		$attr = array( 'class' => 'section default', 'aria-label' => 'main content');
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
	
	</main>

    <?php
	    // Parse URL for data to pass along

	    $url = $_SERVER['REQUEST_URI'];
	    $parsed_array = parse_url(urldecode($url));

	    $string_array = explode('&',$parsed_array['query']);

	    $full_name = $string_array[0];
	    $email = $string_array[1];
	    $phone = $string_array[2];
	   	$address = $string_array[3];
	    $address2 = $string_array[4];
	    $city = $string_array[5];
	    $state = $string_array[6];
	    $zip_code = $string_array[7];
	    $preferred_time = $string_array[8];                        
    ?>

    <script type="text/javascript">
    YoTrack("forefrontderm", "308274", function(err, api) {
        /** *****************************************************************
         *  Payload as an object
         *******************************************************************/
        api.trackData({ 
        	name: "<?php echo $full_name;?>", 
        	email:"<?php echo $email; ?>", 
        	phone: "<?php echo $phone; ?>",
 			address: "<?php echo $address; ?>",
            address2: "<?php echo $address2; ?>",
            city: "<?php echo $city; ?>",
            state: "<?php echo $state; ?>",
            zip_code: "<?php echo $zip_code; ?>",
            preferred_time: "<?php echo $preferred_time; ?>"

        }, function(err, data) {
            /* Payload submission complete */
            console.log("data", data); // Payload sent to dashboard as JSON Object
        });

    });
    </script>

</div>

<?php
get_footer();
