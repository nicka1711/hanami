<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package Installation
 *
 * Install controller.
 */
class Install_Controller extends Hanami_Controller {

	protected $application;

	public function __construct()
	{
		parent::__construct();

		$this->application = new Installation;

		$this->page_title[] = Kohana::lang('install.installation');
	}

	public function index()
	{
		echo request::
		//(isset($_POST['lang'][0]) and Config::set('locale.language', $_POST['lang'][0])) and url::redirect('install/license');

		$this->page_title[] = Kohana::lang('install.welcome');
		$this->template->content = View::factory('install/welcome')
			->set('langs', Config::item('locale.available_langs'));
	}

	public function license()
	{
		//echo Kohana::debug($_POST);

		isset($_POST['accept']) and url::redirect('install/setup');


		$this->page_title[] = Kohana::lang('install.license');

		$this->template->content = View::factory('install/license');
	}

	public function setup()
	{
		$this->template->content = View::factory('install/setup');
	}

	public function database()
	{
		$this->template->content = View::factory('install/database')
			->set('drivers', $this->application->database_driver());
	}



}