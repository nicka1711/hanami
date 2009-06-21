<?php

class Hanami
{
	public function __construct()
	{
		$this->modules();

		$this->themes();

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

	static private function modules()
	{
		$required = Kohana::config('core.modules');

		// Remove the installation module from the module stack 
		if(!is_dir(DOCROOT.'installation'))
		{
			unset($required[0]);
		}

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

		Kohana::config_set('core.modules', array_merge($installed, $required));
	}

	static private function themes()
	{
		$themes   = ORM::factory('theme');
		$installed = array();
		foreach($themes->find(Theme_Model::ALL) as $theme)
		{
			/**
			  * @todo More module verifying
			  */ 
			if (is_dir(DOCROOT.'themes/'.$theme->name))
				$installed[] = DOCROOT.'themes/'.$theme->name;
		}

		Kohana::config_set('core.modules', array_merge($installed, Kohana::config('core.modules')));
	}
} // End Hanami library