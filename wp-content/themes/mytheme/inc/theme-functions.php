<?php
/**
 * Theme Functions
 *
 * @package KJRoelke
 */

use KJR\Asset_Loader;
use KJR\Asset_Load_Type;

/** Custom Filters */
add_filter(
	'excerpt_length',
	function ( $length ) {
		return 30;
	},
	PHP_INT_MAX
);


/**
 * Enqueue Page Style
 *
 * @param string $id the filename
 * @param string $folder [optional] the subdirectory
 * @param array  $deps [optional] Dependencies (if any)
 */
function kjr_enqueue_page_style( string $id, string $folder = '', array $deps = array() ) {
	new Asset_Loader( $id, Asset_Load_Type::style, $folder, $deps );
}
/**
 * Enqueue Page Script
 *
 * @param string $id the filename
 * @param string $folder [optional] the subdirectory
 * @param array  $deps [optional] Dependencies (if any)
 */
function kjr_enqueue_page_script( string $id, string $folder = '', array $deps = array() ) {
	new Asset_Loader( $id, Asset_Load_Type::script, $folder, $deps );
}

/**
 * Enqueue Page Script & Style
 *
 * @param string $id the filename
 * @param string $folder [optional] the subdirectory
 * @param array  $deps [optional] Dependencies (if any)
 */
function kjr_enqueue_page_assets( string $id, string $folder = '', array $deps = array() ) {
	new Asset_Loader( $id, Asset_Load_Type::both, $folder, $deps );
}


/**
 * Returns the proper HTML Markup
 *
 * @param string $cta the button text
 * @param string $style the css class to add after `btn__`
 * @param string $href if `$is_external,` include the full url, else can use slug-only version
 * @param bool   $is_external whether or not the link is external
 * @return string the markup
 */
function kjr_button(
	string $cta,
	string $style,
	string $href,
	bool $is_external = false
): string {
	if ( $is_external ) {
		return "<a class='btn__$style' href='$href' rel='noreferrer noopener' target='_blank'><span class='btn__text'>$cta</span></a>";
	} else {
		return "<a class='btn__$style' href='/$href'><span class='btn__text'>$cta</span></a>";
	}
}
