<?php 
/**
 * Main Frontend Controller
 *
 * $Id$
 *
 * @package    Frontend
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license    
 */
class Home_Controller extends Frontend_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->page->title[] = Kohana::lang('common.home_page');
	}


	function index()
	{
		if (empty ($_GET['month']))
			$_GET['month'] = date('n'); // Current month
		if (empty($_GET['year']))
			$_GET['year']  = date('Y'); // Current year

		Calendar::$start_monday = TRUE;

		$calendar = Calendar::factory($_GET['month'], $_GET['year'])//Kohana::locale('calendar.start_monday'))
			->standard('today')
			->standard('weekends')
			->standard('prev-next');
		//$this->page_title[] = 'foo';

		$this->template->content = View::factory('home')
			->set('calendar', $calendar->render('calendar'));
	}

} // End Home
