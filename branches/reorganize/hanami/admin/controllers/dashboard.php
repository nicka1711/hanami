<?php 

class Dashboard_Controller extends Admin_Controller {

	public function __construct() {
		parent::__construct();

		$this->class = get_class();
	}

	public function index()
	{
		//$this->page->title[] = Kohana::lang('admin.administration');
		$this->page->title[] = Kohana::lang('admin.dashboard');

		$this->template->content = 'foobar';
	}

} // End Dashboard Controller