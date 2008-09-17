<?php defined('SYSPATH') or die('No direct script access.');

class Module_Model extends ORM {

	static public function factory($id = FALSE)
	{
		return new Module_Model($id);
	}

	public function __construct($id = FALSE)
	{
		parent::__construct($id);
	}

} // End Module_Model