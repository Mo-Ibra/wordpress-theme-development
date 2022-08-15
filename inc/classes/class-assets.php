<?php
/**
 * Enqueue theme assets
 *
 * @package Aquila
 */

namespace Aquila_Theme\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
	use Singleton;

	protected function __construct() {

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {

		/**
		 * Actions.
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	public function register_styles() {
		// Register styles.
        wp_enqueue_style('css-main', get_stylesheet_uri(), [], fileatime(AQUILA_DIR_PATH . '/style.css'));
        wp_enqueue_style('css-bootstrap', AQUILA_DIR_URI . '/assets/css/bootstrap.min.css');
	}

	public function register_scripts() {
        // Register Scripts
        wp_enqueue_script('js-main', AQUILA_DIR_URI . '/assets/js/main.js', '', fileatime(AQUILA_DIR_PATH . './assets/js/main.js'), true);
        wp_enqueue_script('js-popper', AQUILA_DIR_URI . '/assets/js/popper.min.js', '', fileatime(AQUILA_DIR_PATH . './assets/js/popper.min.js'), true);
        wp_enqueue_script('js-bootstrap', AQUILA_DIR_URI . '/assets/js/bootstrap.min.js', '', fileatime(AQUILA_DIR_PATH . './assets/js/bootstrap.min.js'), true);
	}
}