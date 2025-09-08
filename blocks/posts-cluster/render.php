<?php
/**
 * ACF Block Template: Posts Cluster
 *
 */

include(dirname(__FILE__) . '/../block-meta.php');

$con_class = "md:min-h-[60vh] mt-[0]! md:grid md:grid-cols-2 xl:grid-cols-3 gap-[var(--rails)] p-[var(--rails)]"; // "md:grid md:grid-cols-3 md:gap-[4rem]";


?>

<section <?= $block_atts ?>>
	<div class="<?= $con_class; ?>">
		<?php //

		if(is_data_okay('pc_posts', $flds)) {

			foreach($flds['pc_posts'] as $feat) {

			// $terms = get_the_terms($feat->ID, 'post_tag');
			// $termstr = '';
			// foreach($terms as $coun => $term) {
			// 	if($coun > 0) {
			// 		$termstr .= ", ";
			// 	}
			// 	$termstr .= $term->name;
			// }
			// pr(bg_img($feat->ID));glide__slide  bg-[rgba(188,93,46,0.8)] px-[var(--rails)]
			// mysql2date('n-j-Y', $feat->post_date) . ' : ' .

			echo drawCard($feat);

			/* ?>

		<!-- wp:group {"tagName":"a","layout":{"type":"constrained"}} -->
		<a href="<?= get_permalink($feat->ID); ?>" class="relative rounded-[0.75rem] overflow-hidden md:flex w-full md:items-end text-center h-[360px] md:h-[420px] max-md:block max-md:mb-[calc(var(--rails)*1.5)]" style="background:url(<?= esc_url(bg_img($feat->ID, 'large')) ?>) 50% 50% / cover no-repeat;" class="md:h-[60vh]">
			<img src="<?= esc_url(bg_img($feat->ID, 'thumbnail')) ?>" alt="<?= esc_attr($feat->post_title, 'cwtc3') ?>" class="md:hidden h-full object-cover w-full" />
			<div class="max-md:absolute max-md:left-[0] max-md:bottom-[0] w-full flex flex-col md:items-center md:justify-end min-h-[0px]">
				<h2 class="bg-[var(--rich-black)] text-[1.5rem]! text-[var(--cosmic-latte)] w-full leading-9 mb-[0rem] px-[var(--rails)] py-[0.75rem] leading-9"><?= esc_html($feat->post_title, 'cwtc3') ?></h2>
				<p class="backdrop-blur-[10px] bg-[var(--darkDrop)] w-full text-center text-[var(--cosmic-latte)] font-[family-name:var(--fontScript)] text-[100%] pt-[0.75rem] pb-[1rem] leading-6"><?= esc_html($termstr, 'cwtc3'); ?></p>
			</div>

		</a>
		<!-- /wp:group -->

		*/ ?>

			<?php	}

			} ?>
		<?php // ?>
	</div>
</section>

