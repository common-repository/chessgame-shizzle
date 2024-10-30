<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/*
 * Add chessgames to main RSS Feed.
 *
 * @since 1.0.8
 */
function chessgame_shizzle_rss_feed( $qv ) {

	if ( isset($qv['feed'] ) && ! isset($qv['post_type']) ) {
		if (get_option( 'chessgame_shizzle-rss', 'true') === 'true') {
			$qv['post_type'] = array( 'post', 'cs_chessgame' );
			return $qv;
		}
	} else if ( isset($qv['feed'] ) && isset($qv['post_type']) ) {
		if (get_option( 'chessgame_shizzle-rss', 'true') === 'true') {
			$qv['post_type'][] = 'cs_chessgame';
			return $qv;
		}
	}
	return $qv;
}
add_filter('request', 'chessgame_shizzle_rss_feed');