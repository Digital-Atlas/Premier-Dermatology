<?php
get_header(); ?>



<?php

// Hero
section_hero();
function section_hero() {
		
	$heading = sprintf( '<h1>%s</h1>', get_the_title() );
	
	$content = $heading;
	$attr = array( 'class' => 'section hero', 'role' => 'region', 'aria-labelledby' => 'banner' );
	_s_section_open( $attr );
	printf( '<div class="column row"><div class="table"><div class="cell">%s</div></div></div>', $content );	
	_s_section_close();		
}
?>

<?php
the_content();

?>
<?php
get_footer();
