<?php
/*
Template Name: New Blog Page
*/

get_header(); ?>
<style>
.section.blogs{

}

.section.blogs .flex{
	display:flex;
}
.section.blogs .panel{
	margin:60px 0;
}
.section.blogs .flex .col-right{
	flex:2;
}
.section.blogs .flex .col-right h2{
	font-size:2rem;
}
.section.blogs .flex .col-right p{
	margin-bottom:0;
}
.section.blogs .flex .col-right a{
	text-decoration:underline;
}
.section.blogs .flex .col-right a:hover{
	text-decoration:none;
}
.section.blogs .flex .col-left{
	/*flex:1;*/
	width: 350px;
}
.section.blogs .nav-container{
	/*display:flex;
	justify-content:space-around;*/
	margin: 60px 0;
	padding: 0 30px;
	text-align: center;
}
.section.blogs .nav-container a{
	color: #307da1;
    font-size: 16px;
    font-weight: 600;
    display: inline-block;
    text-align: center;
    padding: 8px;
    border: 1px solid #307da1;
    text-transform: capitalize;
    width: 150px;
    margin: 0 20px;
}

.section.blogs .nav-container a:hover{
	color: #ffffff;
    background-color:#307da1;

}
@media only screen and (max-width: 750px) {
  	.section.blogs .flex{
		flex-direction:column;
	}
	.section.blogs .flex .col-left{
		padding-right: .9375rem;
    	padding-left: .9375rem;
    	width:100%;
	}
	.section.blogs .flex .col-left img{
    	width:100%;
    	padding-bottom:30px;
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







	// set the "paged" parameter (use 'page' if the query is on a static front page)
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
	$args = array (
	    'nopaging'               => false,
	    'paged'                  => $paged,
	    'posts_per_page'         => '10',
	    'post_type'              => 'post',
	);

	// The Query
	$query = new WP_Query( $args );
	?>
	<section class="section blogs" id="hero" role="region" aria-labelledby="banner">
		<div class="flex">
		   <div class="wrap">
			  <div class="row">
				 <div class="small-12 columns blog-collection">

	<?php

	// The Loop
	if ( $query->have_posts() ) {
	    while ( $query->have_posts() ) {
	        $query->the_post();
	 ?>


						<div class="panel flex">
							<div class="col-left">
								<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
								
							</div>
							<div class="column col-right">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div><p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More ></a></p></div>
								
							</div>


					


						</div>
	    <?php } ?>
					</div>
					
				  </div>
				  <div class="nav-container">
						<?php previous_posts_link( '< Previous Page' ); next_posts_link( 'Next Page >', $query->max_num_pages );?>
				  </div>
			   </div>
			</div>
		</section>

	    <?php

	} else {
	    echo '<h1 class="page-title screen-reader-text">No Posts Found</h1>';
	}
	wp_reset_postdata();
	?>




	
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
