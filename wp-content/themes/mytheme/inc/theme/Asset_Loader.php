<?php
/**
 * Loads Styles / Scripts
 *
 * @package KJRoelke
 */

namespace KJR;

use KJR\Asset_Load_Type;

/**
 * Class to get page scripts/stylesheets
 */
class Asset_Loader {
	/** The filename
	 *
	 * @var $id;
	 */
	private string $id;

	/**
	 * The subdirectory
	 *
	 * @var $folder
	 */
	private string $folder;

	/**
	 * The user-defined dependencies
	 *
	 * @var $deps
	 */
	private array $deps;

	/**
	 * The Location of the files (asset.php & stylesheet/script) without trailing file types
	 *
	 * @var $location
	 */
	private string $location;

	/**
	 * The Asset File
	 *
	 * @var array|false $asset_file
	 */
	private array|false $asset_file;

	/**
	 * The Generated Version Flag
	 *
	 * @var $version
	 */
	private ?string $version;

	/**
	 * The Constructor
	 *
	 * @param string          $id the filename
	 * @param Asset_Load_Type $load_type loads style, script, or both
	 * @param string          $folder [optional] the subdirectory
	 * @param array           $deps [optional] Dependencies (if any)
	 * @param array           $js_load_strategy JS Strategy array (if $load_type === 'script')
	 */
	public function __construct( string $id, Asset_Load_Type $load_type, string $folder = '', array $deps = array(), $js_load_strategy = array( 'strategy' => 'defer' ), $enqueue = true ) {
		$this->id         = $id;
		$this->folder     = $folder;
		$this->location   = empty( $this->folder ) ? "/dist/{$this->id}" : "/dist/{$this->folder}/{$this->id}";
		$this->asset_file = $this->get_asset_file();
		if ( $this->asset_file ) {
			$this->deps    = $this->set_dependencies();
			$this->version = $this->asset_file['version'];
		} else {
			$this->deps    = array_unique( array_merge( $deps, array( 'global' ) ) );
			$this->version = null;
		}

		switch ( $load_type ) {
			case Asset_Load_Type::style:
				$this->enqueue_page_style( $enqueue );
				break;
			case Asset_Load_Type::script:
				$this->enqueue_page_script( $js_load_strategy, $enqueue );
				break;
			case Asset_Load_Type::both:
				$this->enqueue_page_style( $enqueue );
				$this->enqueue_page_script( $js_load_strategy, $enqueue );
				break;
		}
	}

	/**
	 * Returns the Asset File or False
	 */
	private function get_asset_file(): array|false {
		$file = get_stylesheet_directory() . $this->location . '.asset.php';
		if ( file_exists( $file ) ) {
			$file_contents = require_once $file;
			return $file_contents;
		} else {
			return false;
		}
	}

	private function set_dependencies(): array {
		$deps = array();
		if ( 'global' !== $this->id ) {
			array_unique( array_merge( $this->asset_file['dependencies'], array( 'global' ) ) );
		}
		return $deps;
	}

	/**
	 * Enqueue Page Style
	 *
	 * @param bool $enqueue whether to enqueue or register
	 */
	private function enqueue_page_style( bool $enqueue ) {
		$src     = get_stylesheet_directory_uri() . $this->location . '.css';
		$version = $this->version;
		if ( $enqueue ) {
			wp_enqueue_style(
				$this->id,
				$src,
				$this->deps,
				$version,
				false
			);
		} else {
			wp_register_style(
				$this->id,
				$src,
				$this->deps,
				$version,
				false
			);
		}
	}

	/** Enqueue Page Script
	 *
	 * @param array $js_load_strategy the Load strategy
	 * @param bool  $enqueue whether to enqueue or register
	 */
	private function enqueue_page_script( array $js_load_strategy, bool $enqueue ) {
		$src     = get_stylesheet_directory_uri() . $this->location . '.js';
		$version = $this->version;
		if ( $enqueue ) {

			wp_enqueue_script(
				$this->id,
				$src,
				$this->deps,
				$version,
				$js_load_strategy
			);
		} else {
			wp_register_script(
				$this->id,
				$src,
				$this->deps,
				$version,
				$js_load_strategy
			);
		}
	}
}
