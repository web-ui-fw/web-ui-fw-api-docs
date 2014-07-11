<?php

ob_start();

require( get_template_directory() . "/header.php" );

$contents = ob_get_contents();

ob_end_clean();

// Remove pingback and EditURL <link> tags
echo( preg_replace(
	'/[<]link rel="(pingback|EditURI)"[^>]*[>]/',
	'',
	$contents ) );

?>
