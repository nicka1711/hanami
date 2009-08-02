<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Configuration now works with groupings, so you can setup more
 * than one configuration group for reuse
 * 
 * You must always have a 'default' setting, but can define additional
 * sets
 * 
 * The alt now has three tags available that you can insert into your
 * alt attribute string : 
 *  - {$email}  will print the gravatar email address
 *  - {$size}   will print the gravatar image size
 *  - {$rating} will print the gravatar rating
 * 
 * Example :
 * 'Gravatar icon for {$email}, rated {$rating}'   will produce   'Gravatar icon for name@tld.com, rated G'
 */

// Default configuration (Only edit, do not delete!)
$config['default'] = array
(
	'service'       => 'http://www.gravatar.com/avatar.php', // The gravatar service URL
	'default_image' => FALSE,                                // The default image if Gravatar is not found, FALSE uses Gravatar default
	'size'          => 50,                                   // The size of the returned gravatar
	'view'          => 'gravatar/image',                     // The default view
	'rating'        => Gravatar::GRAVATAR_G,                 // The default rating
	'alt'           => 'Gravatar for {email}',                                // Alternate image string, FALSE to omit, string to include
);