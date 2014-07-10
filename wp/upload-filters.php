<?php
/**
 * Plugin Name: XML-RPC upload filter additions for Web UI Framework API Docs
 * Description: Adds custom filters for file types uploaded from the Web UI Framework API Docs
 */

add_filter( 'upload_mimes', function( $mimes ) {
	$mimes[ 'xml' ] = 'text/xml';
	$mimes[ 'json' ] = 'application/json';
	return $mimes;
});

?>
