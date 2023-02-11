<?php declare( strict_types=1 );
/*
 * Plugin Name: Highlight.js Syntax Highlighter
 * Plugin URI:  https://github.com/tfrommen/highlightjs/
 * Description: A simple Highlight.js-based syntax highlighter plugin for WordPress.
 * Author:      Thorsten Frommen
 * Author URI:  https://tfrommen.de
 * Version:     2.0.0
 * License:     MIT
 */

namespace tfrommen\HighlightJs;

defined( 'ABSPATH' ) or die();

/**
 * Filter name.
 *
 * @since 1.1.0
 *
 * @var string
 */
const FILTER_SHOULD_LOAD = 'highlightjs.should_load';

/**
 * Bootstraps the plugin.
 *
 * @since   1.0.0
 * @wp-hook plugins_loaded
 *
 * @return void
 */
function bootstrap(): void {

	add_action( 'wp_footer', function (): void {

		/**
		 * Filters the condition for the plugin to load.
		 *
		 * @since 1.1.0
		 *
		 * @param bool $should_load Whether or not the plugin should load.
		 */
		$should_load = apply_filters( FILTER_SHOULD_LOAD, is_singular( 'post' ) && has_block( 'code' ) );
		if ( ! $should_load ) {
			return;
		}

		$path = 'assets/js/highlight.pack.js';
		wp_enqueue_script(
			'highlightjs',
			plugin_dir_url( __FILE__ ) . $path,
			[],
			filemtime( plugin_dir_path( __FILE__ ) . $path ),
			true
		);
		wp_add_inline_script(
			'highlightjs',
			'hljs.initHighlightingOnLoad();'
		);

		$path = 'assets/css/theme.min.css';
		wp_enqueue_style(
			'highlightjs',
			plugin_dir_url( __FILE__ ) . $path,
			[],
			filemtime( plugin_dir_path( __FILE__ ) . $path ),
			'screen'
		);
	} );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
