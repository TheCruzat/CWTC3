<?php
/**
 * @package cwtc3
 * @since 1.0.0
 */


// set environment type
define( 'WP_ENVIRONMENT_TYPE', 'development' );

// uploads directory
define( 'UPLOADS', 'media' );

// theme settings
require_once('func/settings.php');

// script / style imports
require_once('func/scriptsandstyles.php');

// thumbnail settings
require_once('func/thumbnails.php');

// custom post types + taxonomy
require_once('func/cpt.php');

// php utilities for theme
require_once('func/utilities.php');

// shortcodes for theme
require_once('func/shortcodes.php');

// layout chonks
require_once('func/components.php');

// custom patters -- possibly unnecessary?
// require_once('patterns/patterns.php');

// custom blocks
require_once('blocks/blocks.php');
