<?php 

class Admin_Controller extends Frontend_Controller {

	// Template view name
	protected $page_id	= 'admin';

	public $login_required = TRUE;

	protected $in_admin = TRUE;

	public function __construct($config = NULL)
	{
		parent::__construct();

		$this->page->title[] = Kohana::lang('admin.administration');

		/*$this->header
			->set('logout', Auth::instance()->logged_in()
				? '<p id="logout"><a href="/logout">'.Kohana::lang('auth.logout').'</a></p>'
					: '');*/
	}

}