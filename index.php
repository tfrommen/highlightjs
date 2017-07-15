<?php # -*- coding: utf-8 -*-
/*
 * Plugin Name: highlight.js Syntax Highlighter
 * Plugin URI:  https://github.com/tfrommen/highlightjs/
 * Description: A simple highlight.js-based syntax highlighter plugin for WordPress.
 * Author:      Thorsten Frommen
 * Author URI:  https://tfrommen.de
 * Version:     1.0.0
 * License:     MIT
 */

namespace tfrommen\HighlightJs;

defined( 'ABSPATH' ) or die();

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );

/**
 * Bootstraps the plugin.
 *
 * @since   1.0.0
 * @wp-hook plugins_loaded
 *
 * @return void
 */
function bootstrap() {

	add_action( 'wp_footer', function () {

		if ( ! is_singular( 'post' ) ) {
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
		wp_add_inline_style(
			'highlightjs',
			'pre>code{margin:-1.6em;padding:1.6em !important}'
		);
	} );
}
