<?php
/**
 * A technically WordPress-illegal file of custom post types and
 * custom taxonomies to add to this theme. Make sure to take this
 * with you if you're upgrading the theme in the future.
 *
 * @package cwtc3
 * @since 1.0.0
 */

// namespace CPRF;

function cpt_team() {
	$slug = 'team';

	// Modify all the i18ized strings here.
	$labels = [
		'menu_name'          => __( 'Team', 'cprf' ),
		'name'               => _x( 'Team', 'post type general name', 'cprf' ),
		'singular_name'      => _x( 'Team', 'post type singular name', 'cprf' ),
		'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'cprf' ),
		'add_new'            => _x( 'Add New', 'thing', 'cprf' ),
		'add_new_item'       => __( 'Add New Team Member', 'cprf' ),
		'new_item'           => __( 'New Team Member', 'cprf' ),
		'edit_item'          => __( 'Edit Team Member', 'cprf' ),
		'view_item'          => __( 'View Team Member', 'cprf' ),
		'all_items'          => __( 'All Team Members', 'cprf' ),
		'search_items'       => __( 'Search Team Members', 'cprf' ),
		'parent_item_colon'  => __( 'Parent Team Members:', 'cprf' ),
		'not_found'          => __( 'No team members found.', 'cprf' ),
		'not_found_in_trash' => __( 'No team members found in Trash.', 'cprf' ),
		'featured_image' => __( 'Featured Image', 'cprf' ),
		'set_featured_image' => __( 'Set Featured Image', 'cprf' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'cprf' ),
		'use_featured_image' => __( 'Use as Team Member\'s Image', 'cprf' ),
		'insert_into_item' => __( 'Insert into Team Member', 'cprf' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'cprf' ),
		'items_list' => __( 'Team Members list', 'cprf' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'cprf' ),
		'filter_items_list' => __( 'Filter Team Members list', 'cprf' ),
	];

	// Definition of the post type arguments. For full list see:
	// https://developer.wordpress.org/reference/functions/register_post_type/
	$args = [
		'labels'              => $labels,
		'description'         => '',
		'menu_icon'           => 'dashicons-groups',
		'public'              => true,
		'publicly_queryable' 	=> false,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'revisions' ],
	];

	register_post_type( $slug, $args );
}

// add_action( 'init', 'cpt_team', 0 );
