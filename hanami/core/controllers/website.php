<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Basic Hanami controller
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
class Website_Controller extends Template_Controller {

	protected $page_id    = 'page';
	protected $page_title = array();

	protected $xhtml = false;

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
		if ($this->login_required === TRUE AND ! Auth::factory()->logged_in() AND (url::current() !== 'login'))
		{
			url::redirect('/login');
		}

		$this->page->title[] = __('Hanami CMS v$version', array('$version' => HANAMI_VERSION));

		Hanami::$js->add('mootools.js');
		Hanami::$js->add('hanami.js');
		Hanami::$js->add('hanami/search.js');
		Hanami::$css->add('screen.css');
		Hanami::$css->add('print.css');
	}

	public function _render()
	{
		$this->template->set_global('lang', substr(Kohana::config('locale.language.0'), 0, 2));
		$this->template
			->set('doctype', page::doctype($this->xhtml))
			->set('content_type', (($this->xhtml) ? 'application/xhtml+xml' : 'text/html'))
			->set('charset', 'utf-8')

			->set('page_id', $this->page_id)
			->set('page_title', page::title($this->page->title))
			->set('title', !empty($this->title) ? $this->title : end($this->page->title))
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
		parent::_render();
	}

} // End Controller_Frontend
