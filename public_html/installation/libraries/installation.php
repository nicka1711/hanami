<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Installation library.
 *
 * $Id$
 *
 * @package    Installation
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license    
 */
class Installation {

	protected $files = array();

	public function __construct()
	{
		Kohana::log('debug', 'Installation Library initialized');
	}



	public function check($type)
	{
		switch($type)
		{
			case 'files':
				$this->files = array
				(
					DOCROOT.'frontend/config/config'.EXT,
					DOCROOT.'backend/config/config'.EXT,

					DOCROOT.'modules/hanami/locale'.EXT,
					DOCROOT.'modules/hanami/database'.EXT,
					// DOCROOT.'modules/hanami/'.EXT,
					// DOCROOT.'modules/hanami/'.EXT,
				);
			break;
			case 'database':
			break;
		}
	}

	public function database_driver()
	{
	
	}

}