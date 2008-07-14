<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package Installation
 *
 * Install controller.
 */


class Installation_Controller extends Hanami_Frontend_Controller {

	protected $application;
	
	protected $lang;

	public $page_id = 'installation';

	public function __construct()
	{
		parent::__construct();

		/**
		 * TODO: nessecary each request?
		 */
		$avail_langs = array('de_DE');//Config::item('locale.available_langs');
		$langs = array();
		foreach($avail_langs as $lang => $name)
		{
			Kohana::user_agent('accept_lang', str_replace('_', '-', strtolower($lang))) and $langs[] = $lang;
		}
		$this->lang = current($langs);

		Config::set('locale.language', $this->lang);


		$this->application = new Installation;

		$this->page_title[] = Kohana::lang('install.installation');
	}

	/**
	 * 
	 */
	public function index()
	{
		echo Kohana::debug($_POST);
		// Redirect to the next step "license", if a language is choosen
		(isset($_POST['lang'][0])) and url::redirect('installation/license');

		// Filling the template
		$this->page_title[] = Kohana::lang('install.welcome');
		$this->template->content = View::factory('installation/welcome')
			->set('avail_langs', array('de_DE'))//Config::item('locale.available_langs'))
			->set('accept_lang', $this->lang);
	}

	public function license()
	{
		// Redirect to the next step "setup", if the license is accepted
		(isset($_POST['accept']) and $_POST['accept'] === 'on') and url::redirect('installation/setup');

		// Filling the template
		$this->page_title[] = Kohana::lang('install.license');
		$this->template->content = View::factory('installation/license');
	}

	public function setup()
	{
		// Redirect to the next step "setup", if the license is accepted
		(isset($_POST)) and url::redirect('installation/database');

		// Filling the template
		$this->page_title[] = Kohana::lang('install.setup');
		$this->template->content = View::factory('installation/setup');
	}

	public function database()
	{
		$this->template->content = View::factory('installation/database')
			->set('drivers', $this->application->database_driver());
	}



}