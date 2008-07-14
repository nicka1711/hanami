<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Hanami base file.
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license    
 */

define('HANAMI_VERSION', '0.1');
define('HANAMI_CODENAME', '');

class Hanami
{
	/*public function __construct()
	{
		IN_PRODUCTION or header('Location: /install.php');
	}*/

	function powered()
	{
		Kohana::$output = str_replace('</body>', '<p>Hanami v'.HANAMI_VERSION.'</p></body>', Kohana::$output);
	}
}

//new Hanami;
Event::add('system.display', array('Hanami', 'powered'));