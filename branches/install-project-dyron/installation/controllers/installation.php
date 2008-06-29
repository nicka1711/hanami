<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package Installation
 *
 * Install controller.
 */
class Installation_Controller extends Hanami_Controller {

	protected $application;

	public function __construct()
	{
		parent::__construct();

		$this->application = new Installation;

		$this->page_title[] = Kohana::lang('install.installation');
	}

	/**
	 * 
	 */
	public function index()
	{
		// If lang is choosen, redirect to the next page
		(isset($_POST['lang'][0]) and Config::set('locale.language', $_POST['lang'][0])) and url::redirect('installation/license');

		$this->page_title[] = Kohana::lang('install.welcome');
		$this->template->content = View::factory('installation/welcome')
			->set('langs', Config::item('locale.available_langs'));
	}

	public function license()
	{
		echo Kohana::debug($_POST);

		(isset($_POST['accept']) and $_POST['accept'] === 'on') and url::redirect('installation/setup');


		$this->page_title[] = Kohana::lang('install.license');

		$this->template->content = View::factory('installation/license');
	}

	public function setup()
	{
		$this->template->content = View::factory('installation/setup');
	}

	public function database()
	{
		$this->template->content = View::factory('installation/database')
			->set('drivers', $this->application->database_driver());
	}



}