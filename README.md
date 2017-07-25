# highlight.js Syntax Highlighter

[![Version](https://img.shields.io/packagist/v/tfrommen/highlightjs.svg)](https://packagist.org/packages/tfrommen/highlightjs)
[![Status](https://img.shields.io/badge/status-active-brightgreen.svg)](https://github.com/tfrommen/highlightjs)
[![Downloads](https://img.shields.io/packagist/dt/tfrommen/highlightjs.svg)](https://packagist.org/packages/tfrommen/highlightjs)
[![License](https://img.shields.io/packagist/l/tfrommen/highlightjs.svg)](https://packagist.org/packages/tfrommen/highlightjs)

> A simple highlight.js-based syntax highlighter plugin for WordPress.

## Installation

Install with [Composer](https://getcomposer.org):

```sh
$ composer require tfrommen/highlightjs
```

Or:

1. [Download ZIP](https://github.com/tfrommen/highlightjs/releases).
1. Upload contents to the `/wp-content/plugins/` directory on your web server.
1. Activate the plugin through the _Plugins_ menu in WordPress.
1. Include code snippets wrapped in `<pre><code>` tags.

### Requirements

This plugin **requires PHP 5.4** or higher, but you really **should be using PHP 7** or higher, as we all know.

## Usage

Please refer to the [highlight.js documentation](https://highlightjs.org/).

### Filters

In order to customize certain aspects of the plugin, it provides you with several filters.
For each of these, a short description as well as a code example on how to alter the default behavior is given below.
Just put the according code snippet in your theme's `functions.php` file or your _customization_ plugin, or to some other appropriate place.

#### `\tfrommen\HighlightJs\FILTER_SHOULD_LOAD` (`highlightjs.should_load`)

This filter lets you customize the condition for the plugin to load.
The default value is the result of `is_singular( 'post' )`, meaning the plugin only loads for single posts.

**Usage Example:**

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

The included highlight.js is released under the BSD License.
