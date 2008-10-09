<?php /*defined('SYSPATH') or die('No direct access allowed.');

$config = array
(
	// Default route to use when no URI segments are available.
	//'_default'                      => 'blog/articles',
	
	'blog/(?:19|20)[0-9]{2}/(?:0[1-9]|1[012])/(?:0[1-9]|[12][0-9]|3[01])/(.+)' => 'blog/article/$1',
	'blog'                           => 'blog/articles',
	// 'blog/archive'                  => 'blog/archive',
);

<?php*/
/**
 * @package  Core
 *
 * Sets default routing, allowing up to 3 segments to be used.
 *
 *     $config['default'] = array
 *     (
 *         // Default routing
 *         :controller/:method/:id',
 *         
 *         // Defaults for route keys
 *         'controller' => 'welcome',
 *         'method' => 'index',
 *     );
 *
 * The converted regex for this route is:
 *
 *     (?:([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?
 *
 * To define a specific pattern for a key, you can use the special "regex" key:
 *
 *     $config['default'] = array
 *     (
 *         // Limit the controller to letters and underscores
 *         'regex' => array('controller' => '[a-z_]+'),
 *     );
 *
 * To add a prefix to any key, you can use the special "prefix" key:
 *
 *     $config['admin'] = array
 *     (
 *         'admin/:controller/:method/:id',
 *         
 *         // Will change all controllers to admin_:controller
 *         'prefix' => array('controller' => 'admin_'),
 *     );
 *
 */
$config['default'] = array
(
	// Default routing
	':controller/:method/:id',

	// Defaults for route keys
	'controller' => 'blog',
	'method' => 'index',

    // Limit the controller to letters and underscores
    'regex' => array('method' => '[a-z_]+'),
);
