<?php

/*
Plugin Name: Trove
Plugin URI: http://www.paulhagon.com/code/trove
Description: Plugin to allow reproduction of OCR'd text from digitised newspapers in Trove, a service of the National Library of Australia.
Version: 1.0.0
Author: Paul Hagon
Author URI: http://www.paulhagon.com
License: GPLv2+
*/



define('TROVE_VERSION', '1.0.0');
define('TROVE_PLUGIN_URL', plugin_dir_url( __FILE__ ));

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}



// Add shortcodes
function trove_shortcode( $atts ) {
	// Set up a default value
	extract( shortcode_atts( array(
		'newspaper' => '',
	), $atts ) );
	
	// Do something with the shortcode
	// use sprintf style....
	$trove_url = sprintf( 'http://api.paulhagon.com/trove/wordpress/newspaper/%s', $newspaper );

	// Start constructing the HTML for the response
	$html = '<blockquote class="trove-newspaper">';
	
	// Get the remote URL
	$response = wp_remote_get( $trove_url );
	if( is_wp_error( $response ) ) {
		$html .= '<p>Something went wrong!</p>';
	} else {
		// We got a successful response
		$json = json_decode( $response['body'] );
		
		// Check the status of the JSON response
		if($json->status == 'fail') {
			// There's been an error
			$html .= "<p>That article doesn't exist. Please enter a valid newspaper ID: $newspaper</p>";
		} else {
			// Add in newspaper, date, page.
			$html .= '<p class="article-meta"><span class="article-title">'. $json->article->title->value .'</span> <span class="article-date">'. $json->article->date .'</span> <span class="article-page">'. $json->article->page .'</span></p>';
			$html .= '<p class="article-heading">'. $json->article->heading .'</p>';
			$html .= $json->article->articleText;
			$html .= '<cite>Source: <a href="'. $json->article->troveUrl .'">Trove</a>';			
		}	
	}
	$html .= '</blockquote>';
	return $html;
}

add_shortcode( 'trove', 'trove_shortcode' );



// Insert CSS
function add_trove_stylesheet() {
	wp_register_style( 'trove', plugins_url( 'style.css', __FILE__ ) );
	wp_enqueue_style( 'trove' );
}

add_action( 'wp_enqueue_scripts', 'add_trove_stylesheet' );