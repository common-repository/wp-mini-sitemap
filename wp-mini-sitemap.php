<?php

/*

Plugin Name: WP Mini Sitemap
Description: Add shortcode [minisitemap depth=""] and a short unordered list sitemap of subpages of the current page will be generated.
Author: Aubrey Portwood
Plugin URI: http://bitbucket.org/enethrie/wp-mini-sitemap
Author URI: http://enethrie.com/
Version: 0.1

	WP-Ref:
	
	http://codex.wordpress.org/Function_Reference/wp_list_pages
	http://codex.wordpress.org/Shortcode_API

*/

function wpMiniSitemap($atts){

	global $post;

	extract( shortcode_atts( array(
		'depth' => '0',
		'child_of' => ''
	), $atts ) );
	
	if($child_of=='') 
		$child_of=$post->ID;
	
	$list = '<ul class="wpminisitemap">';
		$list .= wp_list_pages(array(
			'title_li'=>'',
			'echo'=>'0',
			'depth'=>$depth,
			'child_of'=>$child_of
		));
	$list .= '</ul>';
	
	return $list;
	
}

add_shortcode('minisitemap','wpMiniSitemap');

?>