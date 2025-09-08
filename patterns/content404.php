<?php
/**
 * Title: 404 Content
 * Slug: cwtc3/content-404
 *
 * @package cwtc3
 * @since 1.0.0
 */

$opt = get_fields('options');
?>
<div class="content-set text-center my-[calc(var(--rails)*2)]!">
	<?php if(is_data_okay('page_404_title', $opt)) echo '<h1 class="page-title text-[length:var(--h1)] text-[var(--title-color)] relative text-center">'.esc_html($opt['page_404_title']).'</h1>';; ?>
</div>

<div class="entry-content wp-block-404-content is-layout-flow wp-block-post-content-is-layout-flow mb-[calc(var(--rails)*2)]!">
<?php
if(is_data_okay('page_404_content', $opt)) ecn($opt['page_404_content']);

?>
</div>
<h2 class="h3 font-script text-center my-[calc(var(--rails)*0)]!">more dunks for yall punks</h2>
<?= sc_featured_posts(); ?>
