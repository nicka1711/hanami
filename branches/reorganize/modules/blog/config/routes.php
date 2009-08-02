<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package  Blog
 */
$config = array(
	'blog/(?:19|20)[0-9]{2}/(?:0[1-9]|1[012])/(?:0[1-9]|[12][0-9]|3[01])/(.+)' => 'blog/article/$1',
	'blog' => 'blog/index',
	//'blog/archive' => ''
);