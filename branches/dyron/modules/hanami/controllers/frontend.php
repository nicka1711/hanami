<?php defined('SYSPATH') or die('No direct script access.');

class Frontend_Controller extends Template_Controller {

	public $files	= array
	(
		'header'     => 'header',
		'navigation' => 'navigation',
		'footer'     => 'footer'
	);

	protected $page_id = 'page';
	protected $page_title = array();
	protected $title_seperator = '-';

	protected $xhtml = false;

	protected $header;
	protected $footer;

	public $login_required = FALSE;


	/**
	 * Template loading and setup routine.
	 */
	public function __construct($config = NULL)
	{
		parent::__construct();

		$this->xhtml = request::accepts('xhtml', true);

		// Load cache
		$this->cache = new Cache;

		// Load session
		$this->session = Session::instance();

		// Redirect to login if needed
		if ($this->login_required === TRUE)
		{
			!Auth::factory()->logged_in() and url::current() !== 'login' and url::redirect('/login');
		}
	}






	/**
	 *
	 */
	private function _page_title($title = NULL, $seperator = '')
	{
		if(!empty($title))
		{
			$this->page_title[] = $title;
		}

		if(empty($seperator))
		{
			$seperator = $this->title_seperator;
		}

		return implode(' '.$seperator.' ', array_reverse($this->page_title));
	}

	public function _display()
	{
		$this->template
			->set_global('lang', substr(Config::item('locale.language'), 0, 2))
			//->set('doctype', View::factory('header/'.(($this->xhtml) ? 'xhtml' : 'html')))
			//->set('content_type', (($this->xhtml) ? 'application/xhtml+xml' : 'text/html'))
			->set('charset', 'utf-8')
			->set('page_id', $this->page_id)
			->set('page_title', $this->_page_title())
			->set('title', !empty($this->title) ? $this->title : end($this->page_title));
			//->set('site_name', $this->config['site_name'])
			//	->set('author', $this->config['author'])
			//	->set('description', $this->config['site_description'])
			//	->set('keywords', $this->config['keywords'])
			//->set('header', $this->header
			//	->set('site_name', $this->config['site_name'])
			//	->set('site_slogan', $this->config['page_title']))
				// ->set('breadcrumb', View::factory('breadcrumb')->set('crumbs', html::breadcrumb()))
			// ->set('navigation', $this->navigation())
			// ->set('footer', $this->footer);

		// Convert xhtml to html
		if ( ! $this->xhtml)
		{
			Event::add('system.display', array('html', 'convert'));
		}

		// Display the loaded template
		parent::_display();

	}


	private function navigation()
	{
		return isset($this->files['navigation'])
			? View::factory($this->files['navigation'])
				->set('teams', ORM::factory('page_team')->find_related_teams())
			: '';
	}











} // End Frontend_Controller
