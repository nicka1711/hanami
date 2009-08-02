<?php 
/**
 * Main Frontend Controller
 *
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license    
 */
class Home_Controller extends Website_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->class = get_class();

		$this->page->title[] = Kohana::lang('common.home_page');
	}


	function index()
	{
		$this->template->content = View::factory('home')
			->set('calendar', Widget::factory('calendar'));
	}

} // End Home
