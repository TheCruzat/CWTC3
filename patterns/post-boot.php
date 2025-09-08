<?php
/**
 * Title: Post Boot
 * Slug: cwtc3/post-boot
 *
 * @package cwtc3
 * @since 1.0.0
 */

$flds = get_fields();
?>

<?php if(is_data_okay('shoes', $flds)) {
		$shoe_count = count($flds['shoes']);
		$shoe_cols = '';
		foreach($flds['shoes'] as $coun => $shoe) {
			if($coun > 0) $shoe_cols .= '_';
			$shoe_cols .= '1fr';
		} ?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<section class="" style="font-family: 'Courier Prime'">
	<div class="bg-[var(--battleship-gray)] text-white my-[0] p-[var(--rails)] grid grid-cols-[<?= esc_attr($shoe_cols, 'cwtc3'); ?>]">
	<?php foreach($flds['shoes'] as $shoe) { ?>
		<div>
		<h3 class="block text-[1.5rem]! mb-[0.5rem]"><?= esc_html($shoe['title'], 'cwtc3') ?></h3>
		<?php if(is_data_okay('links', $shoe)) { ?>
		<ul class="text-[1rem]">
			<?php foreach($shoe['links'] as $link) {
				echo '<li><a href="' . esc_url($link['url']) . '" target="_blank">' . esc_html($link['label'], 'cwtc3') . '</a></li>';
			} ?>
		</ul>
	<?php } ?>
		</div>
	<?php } ?>
	</div>
</section>
<!-- /wp:group -->
<?php } ?>

<?php if(is_data_okay('owner_shouts', $flds)) { ?>
<!-- wp:group {"layout":{"type":"constrained"}} -->
<section class="shouts text-[1rem] my-[0]!" style="font-family: 'Courier Prime'">
	<div class="bg-[rgba(0,0,0,0.6)] text-white my-[0]!  p-[var(--rails)]">
		<?= cn($flds['owner_shouts']); ?>
	</div>
</section>
<!-- /wp:group -->
<?php } ?>

<?php /* if(is_data_okay('settice', $flds)) { ?>
<section class="bg-[rgba(0,0,0,0.6)] text-white my-[0]">
	<?= cn($flds['settice']); ?>
</section>
<?php } */ ?>
