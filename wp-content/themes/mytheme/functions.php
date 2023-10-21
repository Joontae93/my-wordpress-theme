<?php
/**
 * Functions.php File
 *
 * @package KJRoelke
 */

$theme_loader = require_once dirname( __DIR__, 3 ) . '/vendor/autoload.php';

$my_theme = new KJR\Theme_Loader();

/** Custom Filters */
add_filter(
	'excerpt_length',
	function ( $length ) {
		return 30;
	},
	PHP_INT_MAX
);