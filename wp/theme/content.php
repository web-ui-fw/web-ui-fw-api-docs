<?php

/*
 * The parent theme's content template uses is_search() to decide whether to display the entire
 * post or just the excerpt. So, when we're looking at a category, we want the parent theme's
 * content template to think this is a search.
*/

global $wp_query;

$origIsSearch = $wp_query->is_search;

if ( is_category() ) {
	$wp_query->is_search = true;
}

require( get_template_directory() . "/content.php" );

if ( is_category() ) {
	$wp_query->is_search = $origIsSearch;
}

?>
