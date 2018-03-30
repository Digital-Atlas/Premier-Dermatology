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

    <script type="text/javascript">
    var clientId = '308274';
    YoTrack("forefrontderm", clientId, function(err, api) {
        /** *****************************************************************
         *  Payload as an object
         *******************************************************************/
        api.trackData({ name: "<?php echo $full_name;?>", email:"<?php echo $email; ?>", phone: "<?php echo $phone; ?>" }, function(err, data) {
            /* Payload submission complete */
            console.log("data", data); // Payload sent to dashboard as JSON Object
        });

    });
    </script> 

</div>

<?php
get_footer();
