<?php defined('SYSPATH') or die('No direct script access.');
/**
 * $Id$
 * 
 * @package   
 * @author    Hanami Team
 * @copyright 
 * @license   
 */
class Collector {

	protected static $instances = array();

	protected $type;

	// Configuration
	protected $config;

	// Driver object
	protected $driver;

	/**
	 * Returns a singleton instance of Collector.
	 * 
	 * @param   string  collector driver
	 * @return  object  Collector
	 */
	public static function & instance($driver)
	{
		if ( ! isset(Collector::$instances[$driver]))
		{
			// Create a new instance
			Collector::$instances[$driver] = new Collector($driver);
		}

		return Collector::$instances[$driver];
	}

	/**
	 * 
	 */
	public function __construct($driver)
	{
		$driver = 'Collector_'.ucfirst($driver).'_Driver';

		// Load the driver
		if ( ! Kohana::auto_load($driver))
			throw new Kohana_Exception('core.driver_not_found', $driver, get_class($this));

		// Initialize the driver
		$this->driver = new $driver();
	}

	/**
	 * 
	 */
	public function add ($file)
	{
		$this->driver->add($file);
	}

	/**
	 * 
	 */
	public function remove ($file)
	{
		$this->driver->remove($file);
	}

	/**
	 * 
	 *
	 * @return  
	 */
	public function render()
	{
		return $this->driver->render();
	}

} // End Collector