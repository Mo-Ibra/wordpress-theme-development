<?php
/**
 * Theme Functions.
 *
 * @package Aquila
 */


if ( ! defined( 'AQUILA_DIR_PATH' ) ) {
	define( 'AQUILA_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

function aquila_get_theme_instance() {
	\AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();

function learn_enqueue_scripts() {

    /* Styles CSS */
    wp_enqueue_style('css-main', get_stylesheet_uri(), [], fileatime(get_template_directory() . '/style.css'));
    wp_enqueue_style('css-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    
    /* JavaScript */
    wp_enqueue_script('js-main', get_template_directory_uri() . '/assets/js/main.js', '', fileatime(get_template_directory() . './assets/js/main.js'), true);
    wp_enqueue_script('js-popper', get_template_directory_uri() . '/assets/js/popper.min.js', '', fileatime(get_template_directory() . './assets/js/popper.min.js'), true);
    wp_enqueue_script('js-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', fileatime(get_template_directory() . './assets/js/bootstrap.min.js'), true);
    
}

add_action('wp_enqueue_scripts', 'learn_enqueue_scripts');