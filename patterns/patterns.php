<?php
/**
 * Custom pattern registration
 *
 * @package cwtc3
 * @since 1.0.0
 */

/**
 * Register Patterns
*/
function load_custom_patterns() {
    // register_block_pattern(
    //     'bbtc-tws/content404',
    //     array(
    //         'title'      => __( 'Content 404', 'cwtc3' ),
    //         'categories' => array( 'text' ),
    //         'content'    => file_get_contents( get_template_directory() . '/patterns/content404.php' ),
    //     )
    // );
	register_block_pattern(
	    'cwtc3/post-brain',
	    array(
	        'title'      => __( 'Post Brain', 'cwtc3' ),
	        'categories' => array( 'text' ),
	        'content'    => file_get_contents( get_template_directory() . '/patterns/post-brain.php' ),
	    )
	);
}
// add_action( 'init', 'load_custom_patterns');
