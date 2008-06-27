<?php
/**
 * This file acts as the "front controller" to your application. You can
 * configure your application and system directories here, as well as error
 * reporting and error display.
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */

/**
 * Application directory (probably you wont want to change this setting)
 *
 * This path can be absolute or relative to this file.
 */
$kohana_application = 'frontend';

//
// DO NOT EDIT BELOW THIS LINE, UNLESS YOU FULLY UNDERSTAND THE IMPLICATIONS.
// ----------------------------------------------------------------------------
// $Id: index.php 1631 2007-12-28 00:11:38Z Shadowhand $
//

// The versiopn of Hanami in use
define("HANAMI_VERSION","r29");

// require the common settings
require("common.php");

// Define the front controller name and docroot
define('DOCROOT', getcwd().DIRECTORY_SEPARATOR);
define('KOHANA',  substr(__FILE__, strlen(DOCROOT)));

// Define application and system paths
define('APPPATH', str_replace('\\', '/', realpath($kohana_application)).'/');
define('SYSPATH', str_replace('\\', '/', realpath($kohana_system)).'/');

// Clean up
unset($kohana_application, $kohana_system);

(is_dir(APPPATH) AND is_dir(APPPATH.'/config')) or die
(
	'Your <code>$kohana_application</code> directory does not exist. '.
	'Set a valid <code>$kohana_application</code> in <tt>'.KOHANA.'</tt> and refresh the page.'
);

(is_dir(SYSPATH) AND file_exists(SYSPATH.'/core/'.'Bootstrap'.EXT)) or die
(
	'Your <code>$kohana_system</code> directory does not exist. '.
	'Set a valid <code>$kohana_system</code> in <tt>'.KOHANA.'</tt> and refresh the page.'
);

require SYSPATH.'core/Bootstrap'.EXT;