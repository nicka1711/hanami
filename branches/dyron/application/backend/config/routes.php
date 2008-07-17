<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package  Core
 *
 * Default route to use when no URI segments are available.
 */
$config = array
(
	'_default' => 'dashboard',

	'login'    => 'auth/login',
	'logout'   => 'auth/logout',
);