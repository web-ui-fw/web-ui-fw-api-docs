<?php

ob_start();

require( get_template_directory() . "/category.php" );

$output = ob_get_contents();

ob_end_clean();

$output = preg_replace(
	'/[<]h1 class="archive-title"[>][^:]*: *([^<]*)/',
	'<h1 class="archive-title">$1',
	$output );

echo( $output );

?>
