<?php defined('SYSPATH') or die('No direct script access.');
/**
 * $Id$
 * 
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license   
 */
abstract class Collector_Driver {

	private $files = array();

	/**
	 * 
	 */
	public function add ($file)
	{
		$key = md5(pathinfo($file, PATHINFO_BASENAME));
		
		if ( ! array_key_exists($key, $this->files))
			$this->files[$key] = $file;
	}

	/**
	 * 
	 */
	public function remove ($file)
	{
		$key = md5(pathinfo($file, PATHINFO_BASENAME));
		
		if (array_key_exists($key, $this->files))
			unset($this->files[$key]);
	}

	/**
	 * 
	 */
	public function render()
	{
		foreach($this->files as $key => $file)
		{
			$this->files[$key] = $this->_render($file);
		}
		return implode("\n", $this->files);
	}
}