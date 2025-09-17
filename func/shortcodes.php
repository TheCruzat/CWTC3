<?php
/**
 * Shortcodes for theme
 *
 * @package cwtc3
 * @since 1.0.0
 */

// button shortcode
function sc_button($atts) {
	$a = shortcode_atts( [
		'label' => 'label required',
		'id' => null,
		'class' => null,
		'slug' => null,
		'url' => null,
		'new' => null
	], $atts );

	$class = '';

	if($a['slug'] || $a['url']) {
		$tag = 'a';
		$class .= 'button';
		if($a['class']) {
			$class .= ' ';
		}
		if($a['slug']) {
			$url = site_url().'/'.$a['slug'];
		}
		if($a['url']) {
			$url = $a['url'];
		}

	} else {
		$tag = 'button';
	}

	if($a['class']) {
		$class .= $a['class'];
	}


	$str = '';

	$str .= '<'.$tag;
	if($a['id']) {
	 $str .= ' id="'.esc_attr($a['id'], 'cwtc3').'"';
	}
	if($class != '') {
	 $str .= ' class="'.$class.'"';
	}
	if($url) {
	 $str .= ' href="'.esc_url($url).'"';
	 if($a['new']) {
	 	$str .= ' target="_blank"';
	 }
	}
	$str .= '>' . esc_html( $a['label'], 'cwtc3' ) . '</'.$tag.'>';

	return $str;

}
add_shortcode('button','sc_button');


// copyright year shortcode for footer
function sc_copyright_year($atts) {
	$a = shortcode_atts( [
		'prefix' => 'Copyright',
		'symbol' => '&copy;',
		'start-year' => null
	], $atts );

	$start = '';
	$year = date('Y');
	if($a['start-year'] !== null && $a['start-year'] !== $year) $start = $a['start-year'] . '-';

	$str = $a['prefix'] . ' ' . $a['symbol'] . $start . $year;

	return $str;
}
add_shortcode('copyright-year', 'sc_copyright_year');


// footer spacer
add_shortcode('footer-span', function() { return '<span class="px-[0.25rem]">:</span>'; });


// site title as shortcode for footer
function sc_site_title() { return esc_html( get_bloginfo('site-title'), 'cwtc3' ); }
add_shortcode('site-title', 'sc_site_title');


// current page url
function sc_curr_url($atts) {
	global $wp;
	$a = shortcode_atts( [
		'path' => null
	], $atts );
	$current_url = home_url( add_query_arg( array(), $wp->request ) );
	if($a['path'] == true) {
		$current_url = str_replace(url(), '', $current_url);
	}
	return $current_url;
}
add_shortcode('curr-url', 'sc_curr_url');


// inline menu for footer
function sc_footer_inline_menu() {
	$fnav = get_field('footer_nav', 'options');
	$tn = count($fnav);
	$str = ''; // '<nav class="footer-nav">';
	foreach($fnav as $c => $nav) { $n = $nav['link'];
		$str .= '<a class="hover:text-[#fff] hover:bg-[#000] transition duration-300" href="'.esc_url($n['url']).'">'.esc_html($n['title'], 'cwtc3').'</a>';
		if($c < ($tn - 1)) $str .= do_shortcode('[footer-span]');
	}
	// $str .= '</nav>';
	return $str;
}
add_shortcode('footer-inline-nav', 'sc_footer_inline_menu');


// tags block
function sc_tags_block($atts) {
	$a = shortcode_atts( [
		'tax' => 'post_tag',
		'class' => 'is-layout-constrained px-[var(--rails)] my-[var(--rails)]!',
		'search' => null
	], $atts );
	$tags = get_tags($a['tax']);
	$tcount = count($tags);
	$tagstr = '<div class="'.$a['class'].'"><div class="p-[var(--rails)] text-[var(--burnt-orange)] bg-[rgba(255,248,232,0.75)] backdrop-blur-[10px] border-[2px] border-[#fff] rounded-[0.5rem]">';

	$tagstr .= '<div>';
	foreach($tags as $ct => $tag) {
		$link = get_term_link($tag);
		if($ct > 0 && $ct < $tcount) $tagstr .= ', ';
		$tagstr .= '<a class="font-[family-name:var(--fontScript)] text-[115%] text-[var(--burnt-orange)] hover:text-[var(--rich-black)] duration-750 hover:duration-150 ease-in-out" href="'.esc_url($link).'">'.esc_html($tag->name, 'cwtc3').'</a>';
	}
	$tagstr .= '</div>';
	$tagstr .= '</div></div>';
	return $tagstr;
}
add_shortcode('tags-block', 'sc_tags_block');


// search block
function sc_search_block($atts) {
	$str = '
	<div class="is-layout-constrained px-[var(--rails)] my-[var(--rails)]!">

			<form action="/" method="get" class="grid grid-cols-[auto_60px] rounded-[6px] overflow-hidden">
				<input aria-label="Search" class="bg-white px-[1.5rem] py-[0.5rem] text-center" type="text" name="s" id="search" />
				<button aria-label="Submit Search" class="inverse-grey rounded-[0]! cursor-pointer flex w-full justify-center px-[0]!" type="submit"><i class="fa fa-search"></i></button>
			</form>

    </div>';
    return $str;
}
add_shortcode('search-block', 'sc_search_block');


// tags for post, use in post
function sc_post_tags($atts) {
	$a = shortcode_atts( [
		'tax' => 'post_tag',
		'id' => null
	], $atts );
	if(is_data_okay('id', $a)) {
		$id = $a['id'];
	} else {
		global $post;
		$id = $post->ID;
	}
	if($terms = get_the_terms($id, $a['tax'])) {
		$termstr = '';
		foreach($terms as $coun => $term) {
			$link = get_term_link($term);
			if($coun > 0) {
				$termstr .= ", ";
			}
			$termstr .= '<a href="'.esc_url( $link ).'">' . esc_html( $term->name, 'cwtc3' ) . '</a>';
		}
		return $termstr;
	} else {
		// return "This block is for a post with tags.";
	}
}
add_shortcode('post-tags', 'sc_post_tags');


function wrapCards($cards) {
	$str = '<!-- wp:group {"tagName":"div","layout":{"type":"flow"}} -->';
	$str .= '<div class="md:min-h-[40vh] mt-[0]! md:grid md:grid-cols-2 xl:grid-cols-3 gap-[var(--rails)] gap-y-[calc(var(--rails)*2)] p-[var(--rails)] max-w-[100%]!">';
	foreach($cards as $card) {
		$str .=  drawCard($card);
	}
	$str .= '</div>';
	$str .= '<!-- /wp:group -->';
	return $str;
}



// featured posts set in global options
function sc_featured_posts() {
	$feats = get_field('featured_posts', 'options');
	return wrapCards($feats);
}
add_shortcode('featured-posts', 'sc_featured_posts');


// recent posts like a mufucker
function sc_recent_posts($atts) {
	$a = shortcode_atts( [
		'count' => 6
	], $atts );
	$rece = get_posts([
		'numberposts'	=> $a['count']
	]);

	return wrapCards($rece);
}
add_shortcode('recent-posts', 'sc_recent_posts');

