<?php
/**
 * Title: Search Title
 * Slug: cwtc3/search-title
 *
 * @package cwtc3
 * @since 1.0.0
 */

global $wp_query;
// pr($wp_query->query['s']);
?>
<h1 class="flex items-center justify-center text-center w-full text-[var(--burnt-orange)]"><span class="inline-block mr-[1rem] text-[50%] leading-9 text-[var(--rich-black)]"><?= esc_html('search results for:', 'cwtc3'); ?></span>“<?= $wp_query->query['s'] ?>”</h1>
