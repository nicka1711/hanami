<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 *  
 *
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
final class Hanami
{
	/**
	 * @var  object javascript object
	 */
	public static $js;

	/**
	 * var  object stylesheet object
	 */
	public static $css;

	/**
	 * 
	 *
	 * @return  void
	 */
	public static function setup(array $config = NULL)
	{
		static $run;

		if ($run === TRUE) return;

		$run = TRUE;

		Event::add('system.ready', array('Hanami', 'modules'));

		self::$js  = Collector::instance('js');
		self::$css = Collector::instance('css');

		//Event::add('system.routing', array('Hanami', 'install'));

		Event::add('system.display', array('Hanami', 'render'));
	}

	/**
	 * 
	 */
	static public function install()
	{
		if (is_dir(DOCROOT.'install') and (url::current() !== 'installation'))
		{
			url::redirect('/installation');
		}
	}

	/**
	 * Adding custom modules to the module stack
	 *
	 * @return  void
	 */
	static public function modules()
	{
		// Get the default modules
		$default = Kohana::config('core.modules');

		// Get the modules from the DB
		$modules = array();
		foreach(ORM::factory('module')->find_all() as $module)
		{
			/**
			  * @todo More module verifying
			  */ 
			if (is_dir(MODPATH.$module->name))
				$modules[] = MODPATH.$module->name;
		}

		// Inject the new modules
		array_splice($default, 3, 0, $modules);

		// Remove the installation module from the module stack 
		if ( ! is_dir(APPPATH.'/install'))
		{
			unset($default[0]);
		}

		// Set the new module stack
		Kohana::config_set('core.modules', $default);

		// We need to manually include the hook file for each module,
		// because the additional modules aren't loaded until after the application hooks are loaded.
		foreach($modules as $module)
		{
			if (is_dir($module.'/hooks'))
			{
				$d = dir($module.'/hooks'); // Load all the hooks
				while (($entry = $d->read()) !== FALSE)
				{
					if ($entry[0] != '.')
					{
						include $module.'/hooks/'.$entry;
					}
				}
			}
		}
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

	private function __construct()
	{
		// This is a static class
	}

} // End Hanami