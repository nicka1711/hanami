<?php defined('SYSPATH') or die('No direct script access.');

class Dashboard_Controller extends Backend_Controller {

	public function index()
	{
		$this->page->title[] = Kohana::lang('admin.administration');
		$this->page->title[] = Kohana::lang('admin.dashboard');

		$this->template->content = 'foobar';
	}

} // End Dashboard Controller