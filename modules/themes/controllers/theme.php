<?php defined('SYSPATH') OR die('No direct access allowed.');

class Theme_Controller extends Controller {
	public function index()
	{
		
	}

	public function render($file)
	{
		echo Kohana::debug($file);
	}

	public function scripts($file)
	{
		$this->render($file);
	}

	public function styles($file)
	{
		$this->render($file);
	}

	public function images($file)
	{
		$this->render($file);
	}
}