<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package Installation
 *
 * Install controller.
 */


class Installation_Controller extends Template_Controller {

	// Template view name
	public $template = 'install';

    protected $page;

	protected $application;

//	protected $lang;

//	public $page_id = 'installation';

	public function __construct()
	{
		parent::__construct();

		/**
		 * TODO: nessecary each request?
		 */
		$avail_langs = array('de_DE');//Kohana::config('locale.available_langs');
		$langs = array();
		foreach($avail_langs as $lang => $name)
		{
			Kohana::user_agent('accept_lang', str_replace('_', '-', strtolower($lang))) and $langs[] = $lang;
		}
		$this->lang = current($langs);

		Kohana::config('locale.language', $this->lang);


		$this->application = new Installation;

		$this->page        = new Page;
		$this->page->title[] = Kohana::lang('install.installation');
	}

	/**
	 * 
	 */
	public function index()
	{
		// Redirect to the next step "license", if a language is choosen
		(isset($_POST['lang'][0])) and url::redirect('installation/license');

		// Filling the template
		$this->page_title[] = Kohana::lang('install.welcome');
		$this->template->content = View::factory('installation/welcome')
			->set('avail_langs', array('de_DE'))//Kohana::config('locale.available_langs'))
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
























	public function _render()
	{
		$lang = Kohana::config('locale.language');
		$this->template
			->set_global('lang', substr($lang[0], 0, 2))
			//->set('doctype', View::factory('doctypes/'.(($this->xhtml) ? 'xhtml' : 'html')))
			//->set('content_type', (($this->xhtml) ? 'application/xhtml+xml' : 'text/html'))
			//->set('charset', 'utf-8')
			//->set('page_id', $this->page_id)
			->set('page_title', $this->page->title());
			//->set('title', !empty($this->title) ? $this->title : end($this->page_title))
			//->set('site_name', $this->config['site_name'])
			//	->set('author', $this->config['author'])
			//	->set('description', $this->config['site_description'])
			//	->set('keywords', $this->config['keywords'])
			//->set('header', $this->header
			//	->set('site_name', $this->config['site_name'])
			//	->set('site_slogan', $this->config['page_title']))
				// ->set('breadcrumb', View::factory('breadcrumb')->set('crumbs', html::breadcrumb()))
			// ->set('footer', $this->footer);

		// Convert xhtml to html
		Event::add('system.display', array('html', 'convert'));

		// Display the loaded template
		parent::_render();
	}

} // End Installation Controller