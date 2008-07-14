<?php defined('SYSPATH') or die('No direct script access.');

class Backend_Controller extends Frontend_Controller {

	// Template view name
	protected $page_id	= 'admin';

	public $login_required = TRUE;


	public function __construct($config = NULL)
	{
		parent::__construct();

		$this->page_title[] = Kohana::lang('admin.administration');

		$this->header
			->set('logout', Auth::instance()->logged_in()
				? '<p id="logout"><a href="/logout">'.Kohana::lang('auth.logout').'</a></p>'
				: '');

		isset($config) and Log::add('info', 'The $config parameter is deprecated in '.get_class().'.');
	}

}