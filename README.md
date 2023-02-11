# Highlight.js Syntax Highlighter

[![Version](https://img.shields.io/packagist/v/tfrommen/highlightjs.svg)](https://packagist.org/packages/tfrommen/highlightjs)
[![Status](https://img.shields.io/badge/status-active-brightgreen.svg)](https://github.com/tfrommen/highlightjs)
[![Downloads](https://img.shields.io/packagist/dt/tfrommen/highlightjs.svg)](https://packagist.org/packages/tfrommen/highlightjs)
[![License](https://img.shields.io/packagist/l/tfrommen/highlightjs.svg)](https://packagist.org/packages/tfrommen/highlightjs)

> A simple Highlight.js-based syntax highlighter plugin for WordPress.

## Installation

Install with [Composer](https://getcomposer.org):

```shell
composer require tfrommen/highlightjs
```

Or:

1. [Download ZIP](https://github.com/tfrommen/highlightjs/releases/latest).
1. Upload contents to the `/wp-content/plugins/` directory on your web server.
1. Activate the plugin through the _Plugins_ menu in WordPress.
1. See syntax highlighting for all code snippets wrapped in `<pre><code>` tags (e.g., a `core/code` block).

### Requirements

This plugin **requires PHP 7.4** or higher.

## Usage

Please refer to the [Highlight.js documentation](https://highlightjs.org/).

### Filters

In order to customize certain aspects of the plugin, it provides you with several filters.
For each of these, a short description as well as a code example on how to alter the default behavior is given below.
Just put the according code snippet in your theme's `functions.php` file or your _customization_ plugin, or to some other appropriate place.

#### `\tfrommen\HighlightJs\FILTER_SHOULD_LOAD` (`highlightjs.should_load`)

This filter lets you customize the condition for the plugin to load.
The default value is the result of `is_singular( 'post' ) && has_block( 'code' )`, meaning the plugin only loads for single posts that include at least one `core/code` block.

If you want to load the plugin for all single posts, no matter what blocks are included in the content:

```php
<?php
/**
 * Filters the condition for the plugin to load.
 *
 * @param bool $should_load Whether or not the plugin should load.
 */
add_filter( \tfrommen\HighlightJs\FILTER_SHOULD_LOAD, function () {

	return is_singlular( 'post' );
} );
```

If you want to load the plugin for all requests, you can use the `__return_true` WordPress function:

```php
<?php
/**
 * Filters the condition for the plugin to load.
 *
 * @param bool $should_load Whether or not the plugin should load.
 */
add_filter( \tfrommen\HighlightJs\FILTER_SHOULD_LOAD, '__return_true' );
```

## License

Copyright (c) 2017 Thorsten Frommen

This code is licensed under the [MIT License](LICENSE).

The included [Highlight.js is released under the BSD License](https://github.com/highlightjs/highlight.js#license).
