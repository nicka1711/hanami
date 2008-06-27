<?php defined('SYSPATH') or die('No direct script access.');

class Ajax_Controller extends Controller 
{

	public function __construct()
	{
	}
	
	function index()
	{
		//echo 'Hilfesystem';
	}

	function url_title()
	{
		if (empty ($_POST))
			return;

		return url::title();
	}
}