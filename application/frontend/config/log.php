<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package  Core
 *
 * Message logging is a very useful debugging tool for production websites, as
 * well as a useful tool during development to see what files are being loaded
 * in what order.
 *
 * In production, it is recommended that you set disable "display_errors" in
 * your index file, and set the logging threshold to log only errors.
 */

/**
 * Cascading message threshold.
 *
 * Log Thresholds:
 *  0 - Disables logging completely
 *  1 - Error Messages (including PHP errors)
 *  2 - Application Alert Messages
 *  3 - Application Informational Messages
 *  4 - Debug Messages
 */
$config['threshold'] = 0;

/**
 * Log file directory, relative to application/, or absolute.
 */
$config['directory'] = 'logs';

/**
 * Log file name prefix; can be blank.
 */
$config['prefix'] = '';

/**
 * PHP date format for timestamps.
 * @see http://php.net/date
 */
$config['format'] = 'Y-m-d H:i:s';