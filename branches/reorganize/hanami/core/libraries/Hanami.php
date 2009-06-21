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
	 * 
	 *
	 * @return  void
	 */
	public static function setup()
	{
		Event::add('system.ready', array('Hanami', 'modules'));
		
		// Enable Hanami output handling
		Event::add('system.shutdown', array('Hanami', 'shutdown'));
	}

	/**
	 * Triggers the shutdown of Hanami
	 *
	 * @return  void
	 */
	public static function shutdown()
	{
		Event::add('system.display', array('Hanami', 'render'));
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
		$modules   = ORM::factory('module')->find_all();
		$installed = array();
		foreach($modules as $module)
		{
			/**
			  * @todo More module verifying
			  */ 
			if (is_dir(MODPATH.$module->name))
				$installed[] = MODPATH.$module->name;
		}

/*$input = array("red", "green", "blue", "yellow");
echo Kohana::debug(array_splice($input, 1, -1), $input);
		echo Kohana::debug($default, $installed);
*/
		array_splice($default, 2, 0, $installed);

		//echo Kohana::debug($default);

		if (strpos($_SERVER['SERVER_NAME'], 'admin') === FALSE)
		{
			unset($default[0]);
		}

		// Remove the installation module from the module stack 
		/*if ( ! is_dir(APPPATH.'/install'))
		{
			unset($required[array_search(APPPATH.'/install', $required)]);
		}*/


		Kohana::config_set('core.modules', $default);
	}







/*





	public function __construct()
	{
		$this->modules();

		$this->themes();

		//Event::add('system.routing', array(__CLASS__, 'install'));
	}

	static public function install()
	{
		if (is_dir(APPPATH.'install') and (strpos(url::current(), 'installation') === FALSE))
		{
			url::redirect('/installation');
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

	static private function themes()
	{

	}*/
} // End Hanami library