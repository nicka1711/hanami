<?php defined('SYSPATH') or die('No direct script access.');

class Home_Controller extends Frontend_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->page_title[] = Kohana::lang('common.home_page');
	}


	function index()
	{
		//$this->page_title[] = 'foo';

		//$user = new User_Model; 
		$this->template->content = View::factory('home')
			->set('calendar', new Calendar());
	}
}
