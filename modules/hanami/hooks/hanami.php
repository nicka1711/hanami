<?php 
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

define('HANAMI_VERSION',  '0.1');
define('HANAMI_CODENAME', 'Paarhufer');

class Hanami
{
	public function __construct()
	{
		Event::add('system.routing', array($this, 'install'));
		Event::add('system.display', array($this, 'render'));

		$modules = Kohana::config('core.modules');

		if (true or !is_dir('installation'))
		{
			// Delete install app from Config::$include_paths
			unset($modules[0]);
		}

		$installed_mods = array();
		foreach(Model_Module::factory()->find(ALL) as $module)
		{
			/**
			 * @todo Validate the modules via /config/[module].php or something
			 */
			is_dir(MODPATH.$module->name) and $installed_mods[] = MODPATH.$module->name;
		}

		// Set module include paths
		Kohana::config_set('core.modules', array_merge($installed_mods, $modules));

		// Re-process the include paths
		Kohana::include_paths(TRUE);

		Kohana::log('debug', 'Hanami Core Hook initialized');
	}

	public function install()
	{
		IN_PRODUCTION and is_dir('installation') and (strpos(url::current(),'installation') === FALSE) and url::redirect('installation');
	}

	public function render()
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
}

new Hanami;

