<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); 

 ?>

<style>


.section.hero h2 {
    color: #fff;
    display: inline-block;
    font-size: 20px;
    margin-top: 5px;
    padding-top: 10px;
    border-top: 3px solid #fff;
}


	#main { 
		background-color: #dadfe6; 
	}

	.column { 
		padding: 0 !important; 
	}

	#ajax-content { 
		max-width: 980px; 
		margin: 0 auto; 
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	#ajax-content .featured-image { 
		float:left; 
		width: 100%; 
		max-width: 450px; 
		margin: 0 15px 15px 0; 
		text-align:center; 
	}

	.entry-content { 
		padding:45px; 
		background-color: #fff;  
	}

</style>


<section class="section hero" id="banner" role="region" aria-labelledby="banner">
	<div class="wrap">
		<div class="column row">
			<div class="table">
				<div class="cell"><h1>Blog</h1><h2>Keep up-to-date on skincare tips and health news.</h2></div>
			</div>
		</div>
	</div>
</section>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
		
		
		<div class="wrap">


			<div id="ajax-content"><div id="loader" style="text-align:center;"><img src="<?php echo THEME_IMG . '/loading.svg'; ?>" alt="Loading..." /></div></div>

			<script>

			// Reference: https://css-tricks.com/using-the-wp-api-to-fetch-posts/


			function nl2br (str, is_xhtml) {   
			    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
			    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
			}


			jQuery( function( $ ) {
			  //$( '#button' ).on( 'click', function ( e ) {
			   // e.preventDefault();
			    $.ajax( {
			      type: 'GET',
			      dataType: 'JSON',
			      url: 'https://forefrontdermatology.com/wp-json/ep/v1/blog_posts/10',

					beforeSend: function() {
					     $('#loader').show();
					  },

					complete: function(){
					     $('#loader').hide();
					  },  	
					  		      
					success: function ( data ) {
						//console.log(data);

					$.each(data, function(i, item) {

					    var post = data[i];

						const post_object = {
						    title: post.title,
						    content: nl2br(post.content),
						    image: post.featured_image.web
						}

						const markup = `
							<article class="row column small-12">
								<div class="entry-content">
									<header class="entry-header">
										<h2 class="entry-title">${post_object.title}</h2>
										<div class="featured-image"><img src="${post_object.image}" alt="" /></div>
									</header>
									
									<div class="body-content">
										${post_object.content}
									</div>
								</div>
							</article>
						`;		


						$('#ajax-content').append(markup);	    
				});

			      },
			      cache: false
			    } );
			  } );
			//} );

			</script>
		

		</div>

	</main>

</div>
	
	

<?php
get_footer();
