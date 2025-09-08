<?php
/**
 * Styles and Scripts for themes
 *
 * @package cwtc3
 * @since 1.0.0
 */

function cwtc3_load_scripts() {
	// wp_enqueue_script('slider-script', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/glide.min.js', false, '1.0', 'defer');
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', false, '1.0', 'defer');
	wp_enqueue_style('fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', false);
	// wp_enqueue_style('gfonts', 'https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Special+Elite&display=swap', false);
	wp_enqueue_style('tailwind', get_template_directory_uri() . '/cwtc3-tw.css', false, '1.0');
	// wp_enqueue_style('slider-style', 'https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.core.min.css', false, '1.0');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'cwtc3_load_scripts' );

