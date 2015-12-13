<?php
/**
 * Template Name: External Video
 * The template for displaying custom post type 'video' 
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

// Start a new loop
while ( have_posts() ) : the_post();

	$key="youtube_id"; 
	$ytid = get_post_meta( $post->ID, $key, true );

	echo "<!-- post id: " . $post->ID . " youtube_id: " . $ytid . " -->"; 

	if ( is_single() && $ytid != null ) :
		echo 
		'<div id="ytplayer-' . $post->ID . '"></div>

		<script>
		  // Load the IFrame Player API code asynchronously.
		  var tag = document.createElement(\'script\');
		  tag.src = "https://www.youtube.com/player_api";
		  var firstScriptTag = document.getElementsByTagName(\'script\')[0];
		  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		  // Replace the \'ytplayer\' element with an <iframe> and
		  // YouTube player after the API code downloads.
		  var player;
		  function onYouTubePlayerAPIReady() {
			player = new YT.Player(\'ytplayer-' . $post->ID . '\', {
			  height: \'390\',
			  width: \'640\',
			  videoId: \'' . $ytid . '\'
			});
		  }
		</script>';
		
		echo '<div class="video-script script-id-' . $post->ID . '">' .
			 the_content() . 
			 '</div><!-- .video-script -->';
	endif;

endwhile;


?>
