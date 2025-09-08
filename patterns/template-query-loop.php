<?php
/**
 * Title: List of posts, 1 column
 * Slug: cwtc3/template-query-loop
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts, 1 column, with featured image and post date.
 *
 * @package cwtc3
 * @since 1.0.0
 */
?>

<!-- wp:query {"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[]},"align":"full","layout":{"type":"default"}} -->

	<!-- wp:post-template {"align":"full","layout":{"type":"default"}, "className":"query-list md:grid md:grid-cols-2 xl:grid-cols-3 md:gap-[var(--rails)]"} -->

		<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
		<div class="listing-item wp-block-group alignfull mt-[0]! rounded-[0.75rem] overflow-hidden">
			<!-- wp:group -->

			<div class="mt-[0]! relative">
				<!-- wp:post-featured-image {"isLink":true,"sizeSlug":"large","className":"<?= 'h-[360px] md:h-[420px] overflow-hidden relative object-cover mb-[0]!'; ?>"} /-->
				<!-- <div class="mt-[0]! h-full flex pr-[var(--rails)] items-center "> -->
					<div class="absolute bottom-[0] left-[0] mt-[0]! w-full">
						<!-- wp:post-title {"level":"3","isLink":true,"className":"bg-[var(--rich-black)] text-[1.5rem]! text-[var(--cosmic-latte)] text-center w-full leading-9 mb-[0rem] py-[0.75rem] px-[var(--rails)] mt-[0]!"} /-->
						<div class="mt-[0]! backdrop-blur-[10px] bg-[var(--darkDrop)]">
							<!-- wp:post-terms {"term":"post_tag","separator":", ","className":"term-set block text-[100%] text-center w-full text-[var(--cosmic-latte)] font-[family-name:var(--fontScript)] pt-[0.75rem] pb-[1rem] leading-6"} /-->
						</div>
					</div>
				<!-- </div> -->
			</div>
		</div>
		<!-- /wp:group -->
	<!-- /wp:post-template -->
<!-- /wp:query -->
