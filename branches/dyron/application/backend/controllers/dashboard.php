<?php defined('SYSPATH') or die('No direct script access.');

class Dashboard_Controller extends Backend_Controller {

	public function index()
	{
		$this->template->content = 'foobar';
	}

} // End Dashboard Controller