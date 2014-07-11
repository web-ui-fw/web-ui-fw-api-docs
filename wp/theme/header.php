<?php
// Remove pingback and EditURL <link> tags

ob_start();

require( get_template_directory() . "/header.php" );

echo( preg_replace(
	'/[<]link rel="(pingback|EditURI)"[^>]*[>]/',
	'',
	ob_get_clean() ) );

?>
