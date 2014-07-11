<?php

ob_start();

require( get_template_directory() . "/category.php" );

echo( preg_replace(
	'/[<]h1 class="archive-title"[>][^:]*: *([^<]*)/',
	'<h1 class="archive-title">$1',
	ob_get_clean() ) );

?>
