<?php defined('SYSPATH') or die('No direct script access.');

class Frontend_Controller extends Template_Controller {

	public $files = array
	(
		'header'     => 'header',
		'navigation' => 'navigation',
		'footer'     => 'footer'
	);

	public $scripts = array();
	public $styles  = array();

	protected $page_id    = 'page';
	protected $page_title = array();

	protected $xhtml = false;

//	protected $header;
//	protected $footer;

	public $login_required = FALSE;

	/**
	 * Template loading and setup routine.
	 */
	public function __construct()
	{
		parent::__construct();

		// Checks if browser accepts xhtml
		$this->xhtml = request::accepts('xhtml', true);

		// Load session
		$this->session = Session::instance();

		// Redirect to login if needed
		if ($this->login_required === TRUE)
		{
			!Auth::factory()->logged_in() and (url::current() !== 'login') and url::redirect('/login');
		}
	}

	public function _display()
	{
		$this->template
			->set_global('lang', substr(Config::item('locale.language'), 0, 2))

			->set('doctype', page::doctype($this->xhtml))
			->set('content_type', (($this->xhtml) ? 'application/xhtml+xml' : 'text/html'))
			->set('charset', 'utf-8')

			->set('scripts', html::script($this->scripts))
			->set('styles',  html::stylesheet($this->styles))

			->set('page_id', $this->page_id)
			->set('page_title', page::title($this->page_title))
			->set('title', !empty($this->title) ? $this->title : end($this->page_title))
			//->set('site_name', $this->config['site_name'])
			//	->set('author', $this->config['author'])
			//	->set('description', $this->config['site_description'])
			//	->set('keywords', $this->config['keywords'])
			//->set('header', $this->header
			//	->set('site_name', $this->config['site_name'])
			//	->set('site_slogan', $this->config['page_title']))
				// ->set('breadcrumb', View::factory('breadcrumb')->set('crumbs', html::breadcrumb()))
			->set('navigation', View::factory('navigation'));
			// ->set('footer', $this->footer);

		// Convert xhtml to html
		if ( ! $this->xhtml)
		{
			Event::add('system.display', array('html', 'convert'));
		}

		// Display the loaded template
		parent::_display();

	}

} // End Frontend_Controller
