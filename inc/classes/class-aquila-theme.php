<?php

/**
 * Bootstraps the Theme.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{

	use Singleton;

	protected function __construct()
	{

		Assets::get_instance();
		Menus::get_instance();

		// load class.
		$this->set_hooks();
	}

	protected function set_hooks()
	{
		/**
		 * Actions
		 */
		add_action('after_setup_theme', [$this, 'setup_theme']);
	}

	public function setup_theme()
	{

		// Add Title
		add_theme_support('title-tag');

		// Add Custom Logo
		add_theme_support('custom-logo', [
			'header-text' => ['site-title', 'site-description'],
			'height' => 100,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
		]);

		// Add Custom Background
		add_theme_support('custom-background', [
			'background-color' => '#fff',
			'default-image' => '',
			'default-repeat' => 'no-repeat',
		]);

		// Post Thumbnail
		add_theme_support('post-thumbnails');

		// Enables Selective Refresh for Widgets
		add_theme_support('customize-selective-refresh-widgets');

		// Add feed links in feed tag.
		add_theme_support('automatic-feed-links');

		// Allows the use of HTML5 markup
		add_theme_support('html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		]);

		add_editor_style();
		add_theme_support('wp-block-styles');

		global $content_width;

		if (!isset($content_width)) {
			$content_width = 1920;
		}
	}
}
