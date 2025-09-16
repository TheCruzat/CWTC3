<?php
/**
 * Title: Full Hero
 * Slug: cwtc3/full-hero
 *
 * @package cwtc3
 * @since 1.0.0
 */

?>

<section class="full-hero relative md:h-[var(--contentHeight)] pt-[var(--headerHeight)] my-[0]! md:flex md:items-end md:justify-center">
	<div style="background:url(<?= esc_url(bg_img(pID())) ?>) 50% 50% / cover no-repeat fixed;" class="max-md:hidden z-[0] absolute top-[0] bottom-[0] left-[0] right-[0]"></div>
	<!-- wp:post-featured-image {"aspectRatio":"3/2","className":"md:hidden mb-[0]!","slugName":"full"} /-->
	<div class="relative z-[1] text-[var(--cosmic-latte)] md:w-full md:text-center backdrop-blur-[10px]">
		<div class="bg-[var(--rich-black)]">
		<!-- wp:post-title {"level":"1","className":"relative leading-11 md:leading-14 px-[var(--rails)] max-w-[var(--wp--style--global--content-size)] mx-auto p-6 md:p-3"} /-->
		</div>
		<div class="bg-[var(--rich-black)] md:bg-[var(--darkDrop)] font-[family-name:var(--fontScript)] text-[135%] text-[var(--cosmic-latte)]] max-md:py-2 max-md:px-[var(--rails)] md:p-2">
		<?= do_shortcode('[post-tags class="inline"]'); ?>
		</div>
	</div>
</section>
