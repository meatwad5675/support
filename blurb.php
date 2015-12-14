<?php
/**
 * Template Name: Blurb
 * The template for displaying custom post type 'blurb' 
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

// Start a new loop
while ( have_posts() ) : the_post();

	$key="blurb_type"; 
	echo "<!-- post id: " . $post->ID . " blurb_type: " . get_post_meta( $post->ID, $key, true ) . " -->"; 

	// Info blurb
	if ( is_single() && get_post_meta( $post->ID, $key, true ) == 'info' ) :
		echo '<p class="blurb-content info">';

	endif;

	// Notice blurb
	if ( is_single() && get_post_meta( $post->ID, $key, true ) == 'notice' ) :
		echo '<p class="blurb-content notice">';
	endif;

	// Warning blurb
	if ( is_single() && get_post_meta( $post->ID, $key, true ) == 'warning' ) :
		echo '<p class="blurb-content warning">';
	endif;

	echo get_the_content() . "</p><!-- .blurb-content -->";
endwhile;


?>
