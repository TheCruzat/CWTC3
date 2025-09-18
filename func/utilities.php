<?php
/**
 * My Jaunty Little Toolkit
 *
 * @package cwtc3
 * @since 1.0.0
 */


// let's have that slug then Daniel
function cook_slug($str) {
  $str = strtolower(trim($str));
  $str = preg_replace('/[^a-z0-9-]/', '-', $str);
  $str = preg_replace('/-+/', "-", $str);
  rtrim($str, '-');
  return $str;
}

// strip everything out of number (for phone)
function nu($i) {
    return preg_replace("/[^0-9]/", "", $i);
}

// shorthand content filters
function cn($i) {
	return apply_filters('the_content', $i);
}

// shorthand again to lose the content tag
function scn($i) { return strip_tags(cn($i), ['<br>','<br />','<i>','<em>','<strong>']); }

// shorthand again to include echo call
function ecn($i) { echo cn($i); }

// get theme directory
function thm() { 	return get_template_directory_uri();	}

// get site url
function url() { 	return site_url();						}

// get page / post ID
function pid() {
	global $post;
	if(isset($post)) return $post->ID;
}

// is the data okay?
function is_data_okay( $key, $data ) {
	if ( ! isset( $data ) ) { // RUN THE GAUNTLET
		return false;
	}
	if ( ! is_array( $data ) ) {
		return false;
	}
	if ( ! array_key_exists( $key, $data ) ) {
		return false;
	}
	if ( ! $data[ $key ] ) {
		return false;
	}
	return true;
}

// show it, show it real pretty
function pr($q) {
	echo '<pre>';
	print_r($q);
	echo '</pre>';
}

/**
 * Theme Specific to CWTC3
 */

// convert code symbols to escape strings
function shave($st) {
	$st = str_replace('<','&lt;',$st);
	$st = str_replace('>','&gt;',$st);
	$st = str_replace('/','&#47;',$st);
	$st = str_replace('"','&#34;',$st);
	$st = str_replace("'",'&#39;',$st);
		// $str = str_replace('&','&amp;',$str);
	$st = str_replace('“','&#34;',$st);
	$st = str_replace('”','&#34;',$st);
	$st = str_replace('‘','&#39;',$st);
	$st = str_replace('’','&#39;',$st);
	$st = addslashes($st);
	return $st;
}

// format tag for display
function tag_r($atts) {
	extract(shortcode_atts(array( "t" => 't must have value' ), $atts));
	return '<code>&lt;'.shave($t).'&gt;</code>';//$atts['t']
};
add_shortcode('tag','tag_r');

// inline-comment
function comm_r($atts) {
	extract(shortcode_atts(array( "c" => 'c must have value' ), $atts));
	global $post;
	$beg = '&lt;!--&nbsp;';
	$end = '&nbsp;--&gt;';
	$u_b = '';
	$u_e = '';
	if(has_tag('css',$post)) {
		$beg = '/*&nbsp;';
		$end = '&nbsp;*/';
	}
	$beg = $u_b . $beg . $u_e;
	$end = $u_b . $end . $u_e;

	return '<div style="font-family: var(--fontCode)" class="p-[2rem] text-[80%] border-dashed bg-[rgba(255,248,232,1)] transition-al border-[2px] mb-[24px]!"><p>'.esc_html($beg.$c.$end, 'cwtc3').'</p></div>';
};
add_shortcode('comm','comm_r');

// about portrait
function portrat_r($atts) {
	$i = get_field('about_headshot','Options');
	$c = count($i);

	$in = rand(1,$c)-1;

	$im = wp_get_attachment_image_src($i[$in]['img'],'about-port');
	$stt = '<div class="port-rat">';
	$stt .= '<img src="'.esc_url($im[0]).'" alt="" class="shot">';
	$stt .= '<img src="'.IMG.'about-frame.png'.'" alt="" class="frame">';
	$stt .= '</div>';
	return $stt;
};
add_shortcode('port-rat','portrat_r');
