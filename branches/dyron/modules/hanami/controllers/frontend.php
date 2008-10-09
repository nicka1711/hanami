<?php 

class Frontend_Controller extends Template_Controller {

	protected $page;

	// Additional template files
	public $files	= array
	(
		'header'     => 'header',
		'navigation' => 'navigation',
		'footer'     => 'footer'
	);

	// Forcing a login page
	public $login_required = FALSE;

	/**
	 * Template loading and setup routine.
	 */
	public function __construct($config = NULL)
	{
		parent::__construct();

		// Load page
		$this->page = new Page;

		// Load session
		$this->session = Session::instance();

		// Redirect to login if needed
		if ($this->login_required === TRUE)
		{
			!Auth::factory()->logged_in() and (strpos(url::current(),'login') === FALSE) and url::redirect('/login');
		}
	}

	/**
	 * Render the loaded template.
	 */
	public function _render()
	{
		$this->template
			->set_global('lang', $this->page->lang)
			->set('doctype', View::factory('doctypes/'.(($this->page->xhtml) ? 'xhtml' : 'html')))
			->set('content_type', (($this->page->xhtml) ? 'application/xhtml+xml' : 'text/html'))
			->set('charset', 'utf-8')

			->set('scripts', $this->page->scripts())

			->set('styles', $this->page->styles())

			->set('page_id', $this->page->id)
			->set('page_title', $this->page->title())
			->set('title', !empty($this->title) ? $this->title : end($this->page->title))
			//->set('site_name', $this->config['site_name'])
			//	->set('author', $this->config['author'])
			//	->set('description', $this->config['site_description'])
			//	->set('keywords', $this->config['keywords'])
			//->set('header', $this->header
			//	->set('site_name', $this->config['site_name'])
			//	->set('site_slogan', $this->config['page_title']))
				// ->set('breadcrumb', View::factory('breadcrumb')->set('crumbs', html::breadcrumb()))
			->set('navigation', $this->navigation());
			// ->set('footer', $this->footer);

		// Convert xhtml to html
		if ( ! $this->page->xhtml)
		{
			Event::add('system.display', array('html', 'convert'));
		}

		// Display the loaded template
		parent::_render();
	}


	private function navigation()
	{
		return isset($this->files['navigation'])
			? View::factory($this->files['navigation'])
				//->set('teams', ORM::factory('page_team')->find_related_teams())
			: '';
	}











} // End Frontend_Controller
