<?php 

class Dashboard_Controller extends Admin_Controller {

	public function __construct() {
		parent::__construct();

		$this->class = get_class();
	}

	public function index()
	{
		$this->page->title[] = __('Dashboard');

		$this->template->content = 'foobar';
	}

} // End Dashboard Controller