<?php
/**
 * Global stuff for all blocks
 *
 * @package cwtc3
 * @since 1.0.0
 */

if(function_exists('get_fields')) {
	$flds = get_fields();
}

if( is_data_okay('anchor', $block) ) $block_id = $block['anchor']; else $block_id = $block['id'];

$block_class = 'mt-[0]!'; //'relative ec-block px-4 md:px-16 lg:px-24 xl:px-32 py-[var(--blockSpace)]!'; // mb-[4rem]! md:mb-[8rem]! lg:mb-[12rem]!';
if(isset($extra_class) && $extra_class !== '' && $extra_class !== null) $block_class .= ' ' . $extra_class;

$block_params = [
	'id' => $block_id,
	'class' => $block_class
];

$block_atts = get_block_wrapper_attributes($block_params);
