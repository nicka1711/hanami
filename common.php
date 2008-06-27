<?php defined('HANAMI_VERSION') or die('No direct script access.');
/**
 *  This file sets up some common Hanami front controller settings (usually set in index.php) to unify it across the admin and front controllers
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Dev Team
 * @license    BSD
 */

/**
*   Edit the settings below to your required values
*/

// In production constant
// POSSIBLY: it might be nice for this to be changed by the installer
define('IN_PRODUCTION', FALSE);

/**
 * Shared system directory
 */
$kohana_system = 'system';

/**
*   Modules path
*/
$kohana_modules = 'modules';

/**
 *  Common error level
 */
error_reporting(E_ALL & ~E_STRICT);

/**
 * Turning off display_errors will effectively disable Kohana error display
 * and logging. You can turn off Kohana errors in application/config/config.php
 */
ini_set('display_errors', TRUE);

/**
 * Common extension too (I assume)
 */
define('EXT', '.php');

/**
 *  This will probably be fine here too - any problems with me putting in a nice error message?
 */
version_compare(PHP_VERSION, '5.1.3', '<') and exit('Kohana requires PHP 5.1.3 or newer.');