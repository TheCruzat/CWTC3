<?php
/**
 * Title: Home Hero
 * Slug: cwtc3/home-hero
 *
 * @package cwtc3
 * @since 1.0.0
 */

$opts = get_fields('options');
// pr(get_fields()['blurb']);

?>
<div class="md:min-h-[60vh] md:bg-[rgba(0,0,0,0.5)] mt-[0]! md:flex md:flex-wrap">

	<?php foreach($opts['featured_posts'] as $feat) {
		$terms = get_the_terms($feat->ID, 'post_tag');
		$termstr = '';
		foreach($terms as $coun => $term) {
			if($coun > 0) {
				$termstr .= ", ";
			}
			$termstr .= $term->name;
		}
		// pr(bg_img($feat->ID));glide__slide  bg-[rgba(188,93,46,0.8)]
		?>

		<!-- wp:group {"tagName":"a","layout":{"type":"constrained"}} -->
		<a href="<?= get_permalink($feat->ID); ?>" class="md:flex w-full md:w-[50%] md:items-end md:text-center md:min-h-[60vh]" style="background:url(<?= esc_url(bg_img($feat->ID, 'large')) ?>) 50% 50% / cover no-repeat;" class="md:h-[60vh]">
			<div class="w-full px-[var(--rails)] backdrop-blur-[10px] bg-[rgba(0,0,0,0.8)] flex flex-col md:items-center md:justify-center h-[150px]">
				<h2 class="text-[2rem]! text-[var(--alabaster)] leading-15"><?= esc_html($feat->post_title, 'cwtc3') ?></h2>
				<p class="text-[var(--burnt-orange)]"><?= esc_html(mysql2date('n-j-Y', $feat->post_date) . ' : ' . $termstr); ?></p>
			</div>

		</a>
		<!-- /wp:group -->

	<?php } ?>

</div>
