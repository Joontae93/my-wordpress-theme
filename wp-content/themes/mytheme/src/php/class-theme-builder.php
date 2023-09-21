<?php
/**
 * Theme Builder
 *
 * @package KJRoelke
 */

namespace KJR;

use KJR\Asset_Loader;
use KJR\Asset_Load_Type;


/**
 * Provides the functions to for the Loader to call
 */
class Theme_Builder {
	/** Custom Supports */
	public function add_theme_supports() {
		add_theme_support( 'post-formats', array( 'link', 'standard', 'video', 'audio' ) );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'primary-menu' => 'The Primary Nav',
				'footer-menu'  => 'The Footer Nav',
				'mobile-menu'  => 'Mobile-Device Menu',
			)
		);
	}


	public function enqueue_assets() {
		$asset_file     = get_theme_file_path( '/dist/global.asset.php' );
		$global_scripts = new Asset_Loader( 'global', Asset_Load_Type::both, '', array( 'bootstrap' ) );
		wp_localize_script(
			'global',
			'myData',
			array(
				'root_url' => get_site_url(),
				'day'      => gmdate( 'D', time() ),
				'year'     => gmdate( 'Y', time() ),
			)
		);
		wp_enqueue_style(
			'google-fonts',
			'https://fonts.googleapis.com/css2?family=Lusitana:wght@400;700&family=Raleway:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap',
			array(),
			null,
		);
		$bootstrap = new Asset_Loader( 'bootstrap', Asset_Load_Type::both, 'vendors' );
	}
}
