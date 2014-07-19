<?php

function twentyfourteen_post_nav(){}
function twentyfourteen_posted_on(){}

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

function wuf_modify_query_order( $query ) {
	$query->set( 'orderby', 'title' );
	$query->set( 'order', 'ASC' );
	return $query;
}
add_action( 'pre_get_posts', 'wuf_modify_query_order' );
?>
