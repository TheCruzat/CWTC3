<?php
/**
 * Functions for little layout bits
 *
 * @package cwtc3
 * @since 1.0.0
 */

// page title
function page_title($tit = null) {
	if($tit) {
		$title = $tit;
	} else {
		$title = get_the_title();
	}
	echo '<h1 class="page-title min-md:max-w-75/100 min-lg:max-w-66/100 text-[length:var(--h1)]/[var(--lineHeightHeader)] text-[var(--title-color)] mb-4 md:mb-8 xl:mb-12 relative">'.esc_html($title).'</h1>';
}


// svg that svg
function svg($src = null, $class = null) {
	if(!$src) {
		echo "Error, filename required";
	} else {
		$path = thm() . '/assets/svg/' . $src;
		$path = str_replace(['.svg','.SVG'],'', $path);
		$path .= '.svg';
		$svg = file_get_contents($path);
		if($class) {
			$dom = new DOMDocument();
			$dom->loadXML($svg);
			foreach($dom->getElementsByTagName('svg') as $element) {
			    $element->setAttribute('class', esc_attr($class));
			}
			$dom->saveHTML();
			$svg = $dom->saveHTML();
		}
		echo $svg;
	}
}


// let's have that logo Daniel
function loGo($homelink = null) {
	if($homelink == true) {
		$tag = 'a';
		$tag_sub = ' href="'.esc_url(url()).'" title="'.esc_attr(get_bloginfo('site_title')).'"';
	} else {
		$tag = 'div';
		$tag_sub = '';
	} ?>
	<<?= $tag . $tag_sub ?> class="block relative z-2 flex flex-row items-center pt-[1%] flex text-[var(--rich-black)]">
		<span class="md:absolute md:text-center md:top-[0] md:left-[2%] text-[1rem] text-[var(--burnt-orange)] md:text-[1.125rem] text-right mr-[0.5rem] w-[50px] md:w-[60px] leading-4"><?php esc_html_e('coffee with', 'cwtc3'); ?></span>
		<?php svg('the-cruzat', 'w-[160px] md:w-[240px] rotate-[-1.5deg] md:rotate-[-4deg] md:ml-7'); ?>
	</<?= $tag ?>>
<?php }


// let's have that bg img Daniel
function bg_img($id, $size = 'full') {
	$bg_img = get_the_post_thumbnail_url($id, $size);
	$bg_img = str_replace(url(), '', $bg_img);
	return $bg_img;
}


// card factory
function drawCard($i) {

	$terms = get_the_terms($i->ID, 'post_tag');
	$termstr = '';
	foreach($terms as $coun => $term) {
		if($coun > 0) {
			$termstr .= ", ";
		}
		$termstr .= $term->name;
	}

	$str = '<!-- wp:group {"tagName":"a","layout":{"type":"constrained"}} -->
	<a href="' . get_permalink($i->ID) . '" class="relative rounded-[0.75rem] overflow-hidden md:flex w-full md:items-end text-center h-[360px] md:h-[420px] max-md:block max-md:mb-[calc(var(--rails)*0)]" style="background:url(' . esc_url(bg_img($i->ID, 'large')) . ') 50% 50% / cover no-repeat;" class="md:h-[60vh]">
		<img src="' . esc_url(bg_img($i->ID, 'large')) . '" alt="' . esc_attr($i->post_title, 'cwtc3') . '" class="md:hidden h-full object-cover w-full" />
		<div class="max-md:absolute max-md:left-[0] max-md:bottom-[0] w-full flex flex-col md:items-center md:justify-end min-h-[0px]">
			<h2 class="bg-[var(--rich-black)] text-[1.5rem]! text-[var(--cosmic-latte)] w-full leading-9 mb-[0rem]! px-[var(--rails)] py-[0.75rem] leading-9">' . esc_html($i->post_title, 'cwtc3') . '</h2>
			<p class="backdrop-blur-[10px] bg-[var(--darkDrop)] w-full text-center text-[var(--cosmic-latte)] font-[family-name:var(--fontScript)] text-[100%] pt-[0.75rem] pb-[1rem] leading-6">' . esc_html($termstr, 'cwtc3') . '</p>
		</div>

	</a>
	<!-- /wp:group -->';
	return $str;
}
