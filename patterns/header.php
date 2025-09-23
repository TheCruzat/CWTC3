<?php
/**
 * Title: Header
 * Slug: cwtc3/header
 *
 * @package cwtc3
 * @since 1.0.0
 */

$flds = get_fields();
$opts = get_fields('options');
?>

<div class="fixed top-0 w-full bg-[rgba(255,255,255,0.9)] backdrop-blur-[10px] z-2">
	<div class="container max-w-7xl h-[calc(var(--headerHeight)*1)] mx-auto px-[var(--rails)] flex justify-between items-center">

		<?php loGo(true); ?>

		<div class="main-nav duration-200 ease-out relative z-1 flex items-center justify-center max-md:fixed max-md:top-[var(--headerHeight)] max-md:z-[1] h-full max-md:h-[calc(100vh-var(--headerHeight))] max-md:bg-[rgba(255,255,255,1.0)] max-md:w-full max-md:backdrop-blur-[10px] max-md:bottom-full max-md:right-[100%] max-md:border-[var(--cosmic-latte)] max-md:border-[0] max-md:border-b-[70px]">
			<?php
				wp_nav_menu([
					'menu' => 'Primary Nav',
					'container' => 'nav',
					'container_aria_label' => 'Site Navigation',
					'menu_class' => 'flex md:gap-[1rem] max-md:flex-col max-md:text-center text-xl max-md:text-3xl font-(family-name:--fontScript) text-[135%]'
				]);/**/
				?>
		</div>

		<button id="<?= esc_attr('mobile-menu', 'cwtc3'); ?>" class="block relative z-2 md:hidden! bg-[var(--hot)]!" aria-expanded="<?= esc_attr('false', 'cwtc3') ?>" aria-haspopup="<?= esc_attr('true', 'cwtc3') ?>" aria-controls="<?= esc_attr('primary-menu', 'cwtc3') ?>" aria-label="<?= esc_attr('Open Main Menu', 'cwtc3') ?>">
			<span></span>
			<span></span>
			<span></span>
			<?php svg('coffee-solid', 'w-[2rem] h-auto'); ?>
		</button>
	</div>
</div>
