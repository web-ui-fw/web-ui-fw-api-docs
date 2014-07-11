<?php
// Remove pingback and EditURL <link> tags

ob_start();

function nearest_index( $regex, $haystack, $offset ) {
	$returnValue = strlen( $haystack );

	preg_match(
		$regex,
		$haystack,
		$matches,
		PREG_OFFSET_CAPTURE,
		$offset );

	if ( count( $matches ) > 0 ) {
		$returnValue = $matches[ 0 ][ 1 ];
	}

	return $returnValue;
}

function get_tag_interval( $regex, $haystack, $tag, $offset ) {
	$tagInterval = false;
	$embeddedTags = 1;
	$closingTagRegex = '@[<][/]' . $tag . '[>]@';
	$openingTagRegex = '@[<]' . $tag . '@';

	$startIndex = nearest_index( $regex, $haystack, $offset );

	if ( $startIndex >= 0 ) {
		$offset = $startIndex + 1;
		while( true ) {
			$closingIndex = nearest_index( $closingTagRegex, $haystack, $offset );
			$offset = nearest_index( $openingTagRegex, $haystack, $offset );

			if ( $closingIndex < $offset ) {
				$offset = $closingIndex;
				$embeddedTags--;
				if ( 0 == $embeddedTags ) {
					$tagInterval = array( $startIndex, $closingIndex + strlen( $tag ) + 3 );
					break;
				}
			} else {
				$embeddedTags++;
			}

			$offset++;
		}
	}

	return $tagInterval;
}

function hack_out_tag( $regex, $haystack, $tag ) {
	$tag_interval = get_tag_interval( $regex, $haystack, $tag, 0 );
	if ( $tag_interval ) {
		$haystack = substr( $haystack, 0, $tag_interval[ 0 ] ) .
			substr( $haystack, $tag_interval[ 1 ] );
	}
	return $haystack;
}

require( get_template_directory() . "/header.php" );

echo(
	preg_replace(

		// Remove pingback and EditURI <link> tags
		'/[<]link rel="(pingback|EditURI)"[^>]*[>]/',
		'',

		// Remove search toggle
		hack_out_tag(
			'/[<]div class="search-toggle"[>]/',

			// Remove search form
			hack_out_tag(
				'/[<]div id="search-container"/',
				ob_get_clean(),
				'div'
			),
			'div'
		)
	)
);

?>
