<?php
/**
 * All of the custom Gutenberg blocks
 *
 * @package cwtc3
 * @since 1.0.0
 */

/**
 * Load Blocks
 */
function load_custom_blocks() {

	// register_block_type( get_template_directory() . '/blocks/header-navigation/block.json' );
	register_block_type( get_template_directory() . '/blocks/posts-cluster/block.json' );

}
add_action( 'init', 'load_custom_blocks' );

/**
 * Create custom block category for ACF blocks
 */
function custom_block_categories( $block_categories, $editor_context ) {
	if ( ! empty( $editor_context->post ) ) {
		array_push(
			$block_categories,
			array(
					'slug'  => 'cwtc3_page_blocks',
					'title' => __( 'CWTC III Page Blocks', 'cprf' ),
					'icon'  => 'text-page',
			),
		);
	}
	return $block_categories;
}
// add_filter( 'block_categories_all', 'custom_block_categories', 10, 2 );
