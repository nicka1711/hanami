<?php 

class Controller_Home extends Controller_Frontend {
	
	function __construct()
	{
		parent::__construct();

		$this->page->title[] = Kohana::lang('common.home_page');
	}


	function index()
	{
		empty($_GET['month']) and $_GET['month'] = date('n'); // Current month
		empty($_GET['year'])  and $_GET['year']  = date('Y'); // Current year

		Calendar::$start_monday = TRUE;

		$calendar = Calendar::factory($_GET['month'], $_GET['year'])//Kohana::locale('calendar.start_monday'))
			->standard('today')
			->standard('weekends')
			->standard('prev-next');
		//$this->page_title[] = 'foo';

		$this->template->content = View::factory('home')
			->set('calendar', $calendar->render('calendar'));
	}
}
