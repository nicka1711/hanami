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
	public function __construct()
	{
		$required = Kohana::config('core.modules');

		// Remove the installation module from the module stack 
		if(!is_dir(DOCROOT.'installation'))
		{
			unset($required[0]);
		}

		$modules   = Module_Model::factory();
		$installed = array();
		foreach($modules->find_all() as $module)
		{
			/**
			  * @todo More module verifying
			  */ 
			if (is_dir(MODPATH.$module->name))
				$installed[] = MODPATH.$module->name;
		}

		Kohana::config_set('core.modules', array_merge($installed, $required));

		//Event::add('system.routing', array(__CLASS__, 'install'));
		Event::add('system.display', array(__CLASS__, 'render'));
	}

	static public function install()
	{
		is_dir(DOCROOT.'installation') and (strpos(url::current(), 'installation') === FALSE) and url::redirect('/installation');
	}

	static public function render()
	{
		if (Kohana::config('core.render_stats') === TRUE)
		{
			// Replace the global template variables
			Kohana::$output = str_replace(
				array
				(
					'{hanami_version}',
					'{hanami_codename}',
				),
				array
				(
					HANAMI_VERSION,
					HANAMI_CODENAME,
				),
				Kohana::$output
			);
		}

	}
} // End Hanami hook

new Hanami;
