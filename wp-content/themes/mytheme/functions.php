<?php
/**
 * Functions.php File
 *
 * @package KJRoelke
 */

require_once __DIR__ . '/src/php/class-theme-loader.php';

/** Custom Filters */
add_filter(
	'excerpt_length',
	function ( $length ) {
		return 30;
	},
	PHP_INT_MAX
);
