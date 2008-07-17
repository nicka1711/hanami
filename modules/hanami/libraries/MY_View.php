<?php defined('SYSPATH') or die('No direct script access.');

class View extends View_Core {


	/**
	 * Magically converts view object to string.
	 *
	 * @return  string
	 */
	public function __toString()
	{
		try 
		{
			$return = $this->render();
			return $return;
		}
		catch (Exception $e) 
		{
			trigger_error($e->getMessage(), E_USER_WARNING);
			return;
		}
	}
}
?>