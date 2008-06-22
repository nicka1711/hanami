<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package  Media Module
 *
 * $Id: media.php 2524 2008-04-17 18:08:11Z armen $
 *
 * The media controller is a way of serving up various content (CSS, javascript, images, etc).
 * 
 * The idea is that you have a subdirectory in your application/views directory called "media",
 * which contains all the files needed. For example: http://yoursite.com/media/css/style1.css
 * gets mapped to views/media/css/style1.css.
 * 
 * Additionally, CSS and javascript files can be packed (compressed) and cached.
 */
 
/**
 * Separator character for multiple files. Make sure this is in your "allowed characters"
 * configuration setting.
 */
$config['separator'] = ',';

/**
 * Set to TRUE to enable media caching. Strongly recommended if you are using packing.
 * If you do not want to use default cache lifetimes, supply the number of seconds to cache for.
 */
$config['cache'] = FALSE;

/**
 * Set to TRUE to pack (compress) CSS files. Whitespace and comments will be stripped.
 */
$config['pack_css'] = FALSE;

/**
 * Set to level of encoding javascript files. Value should be one of: FALSE, 0, 10, 62, 95
 * or 'Numeric', 'Normal', 'High ASCII'. Set to FALSE to disable javascript packing.
 */
$config['pack_js'] = FALSE;
