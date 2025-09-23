<?php
/**
 * Title: Footer
 * Slug: cwtc3/footer
 *
 * @package cwtc3
 * @since 1.0.0
 */

$opts = get_fields('options');
// pr($opts['about_headshots']);
// pr($opts['social_links']);

$hsr = array_rand($opts['about_headshots']);
$hs = wp_get_attachment_image_url($opts['about_headshots'][$hsr], 'thumbnail');
?>
<?php if(get_post_type(pID()) == 'post' || is_404() || ( get_post_type(pID()) == 'page' && !is_front_page() )) {
	echo do_shortcode('[search-block]');
	echo do_shortcode('[tags-block]');
	?><hr class="h-[0px] bg-[transparent] text-[transparent] mt-[calc(var(--rails)*2)]!" /><?php
} ?>

<div class="backdrop-blur-[4px] bg-[rgba(188,93,46,0.1)] max-md:text-center">
	<div class="container max-w-[var(--wp--style--global--content-size)] mx-auto md:h-full md:grid md:grid-cols-[150px_1fr_auto] items-center p-[calc(var(--rails)*1)] max-md:p-[calc(var(--rails)*2)]">
		<span class="overflow-hidden inline-block w-[120px] rounded-full max-md:mb-[1rem]"><img width="120" height="120" src="<?= esc_url($hs) ?>" alt="<?= esc_attr('Dan Cruzat is a builder', 'cwtc3'); ?>" /></span>
		<div class="footer-blurb text-[1rem] max-w-[300px] max-md:mx-auto max-md:mb-[2rem]"><?= cn($opts['about_info']) ?></div>
		<?php if(is_data_okay('social_links', $opts)) { ?>
		<div class="max-md:max-w-[200px] max-md:mx-auto">
			<?= do_shortcode('[button label="Portfolio" url="https://builtby.thecruzat.com" new="true" class="w-full mb-4 footer"]'); ?>
			<div class="flex gap-[0.25rem] px-[1rem]">
			<?php foreach($opts['social_links'] as $link) {
				if($link['icon'] !== 'home') $iconclass = 'fab fa-'.$link['icon']; else $iconclass = 'fa fa-'.$link['icon'];
				echo '<a class="text-[125%] text-[var(--seal-brown)] hover:text-[var(--burnt-orange)] hover:bg-[var(--cosmic-latte)] duration-750 hover:duration-150 ease-in-out w-[38px] text-center rounded-[0.25rem]" href="'.esc_attr($link['link'], 'cwtc3').'" title="'.esc_html($link['label'], 'cwtc3').'" target="_blank"><i class="'.$iconclass.'"></i></a>';
			} ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php /*<div class="h-[var(--footerHeight)] max-md:hidden"></div>*/ ?>
<div class="md:fixeed md:z-[2] md:bottom-[0] w-[100%] max-md:text-center bg-[var(--rich-black)] md:h-[var(--footerHeight)] text-[var(--battleship-gray)]">
	<div class="md:flex md:justify-between items-center container max-w-7xl mx-auto h-full px-[var(--rails)] max-md:py-[calc(var(--rails)*2)]! text-[0.875rem]">
		<div class="max-md:mb-[0.25rem]">
			<?= cn($opts['footer_content']); ?>
		</div>
		<div>
			<i class="fa fa-bomb"></i> <?php esc_html_e('"Don\'t start none, won\'t be none"', 'cwtc3'); ?> <i class="fa fa-bomb"></i>
		</div>
	</div>
</div>
