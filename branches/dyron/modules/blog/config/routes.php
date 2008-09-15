<?php defined('SYSPATH') or die('No direct access allowed.');

$config = array
(
	// Default route to use when no URI segments are available.
	//'_default'                      => 'blog/articles',
	
	'blog/(?:19|20)[0-9]{2}/(?:0[1-9]|1[012])/(?:0[1-9]|[12][0-9]|3[01])/(.+)' => 'blog/article/$1',
	'blog'                           => 'blog/articles',
	// 'blog/archive'                  => 'blog/archive',
);