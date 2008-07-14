<?php defined('SYSPATH') or die('No direct script access.');

class Page_Cache {

	private $cache;

	public function __construct()
	{
		$this->cache = new Cache;

		Event::add_before('system.routing', array('Router', 'setup'), array($this, 'load'));

		Log::add('debug', 'Page_Cache Hook initialized');
	}

	public function load()
	{
		if ($cache = $this->cache->get('page_'.Router::$current_uri))
		{
			Kohana::render($cache);
			exit;
		}
		else
		{
			Event::add('system.display', array($this, 'save'));
		}
	}

	public function save()
	{
		$this->cache->set('page_'.Router::$current_uri, Event::$data);
	}

}

// Enabling caching on production
IN_PRODUCTION and new Page_Cache;