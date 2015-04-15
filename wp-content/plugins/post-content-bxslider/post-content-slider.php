<?php
/*
	Plugin Name: Post Content bxSlider
	Description: Put post content as slide items in bxSlider.
	Version: 0.1.0
	Author: uicestone
	Author URI: https://cecilia.uice.lu
*/

add_action('init', function(){
	wp_register_style('bxslider', plugin_dir_url(__FILE__) . '/jquery.bxslider/jquery.bxslider.css');
	wp_register_script('bxslider', plugin_dir_url(__FILE__) . '/jquery.bxslider/jquery.bxslider.min.js', array('jquery'));
});

add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('bxslider');
	wp_enqueue_script('bxslider');
});

add_shortcode('slider', function($attr, $content){
	return '<div class="bxslider">' . do_shortcode($content) . '</div>';
});

add_shortcode('item', function($attr, $content){
	return '<div class="bxslider-item">' . do_shortcode($content) . '</div>';
});

add_shortcode('post', function($attrs_input){
	$attrs_default = array(
		'show_title'=>false,
		'show_thumbnail'=>false
	);
	$attrs = wp_parse_args($attrs_input, $attrs_default);
	$posts = get_posts($attrs);
	if(!$posts){
		return;
	}
	$post = $posts[0];
	
	$out = '<div class="post-in-page post-' . $post->ID . '">';
	
	if($attrs['show_thumbnail']){
		$out .= get_the_post_thumbnail($post->ID, false);
	}
	
	if($attrs['show_title']){
		$out .= '<h4>' . $post->post_title . '</h4>';
	}
	
	$out .= apply_filters('the_content', wpautop($post->post_content));
	
	$out .= '</div>';
	
	return $out;
});

add_shortcode('site_url', function(){
	return site_url();
});

/**
 * disable wpautop for pages
 */
add_action('pre_get_posts', function($query) {
	if($query->is_page){
		remove_filter( 'the_content', 'wpautop' );
	}
});

/**
 * disable rich text edit for "page"
 */
add_filter( 'user_can_richedit', function($c) {
	
	global $post_type;

	if (in_array($post_type, array('page'))){
		return false;
	}
	
	return $c;
});

/**
 * add post/page slug as a class in body
 */
add_filter('body_class', function ($classes){
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
});

