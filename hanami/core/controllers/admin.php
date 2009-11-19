<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Basic Hanami admin controller
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
class Admin_Controller extends Website_Controller {

	// Template view name
	protected $page_id	= 'admin';

	public $login_required = TRUE;

	protected $in_admin = TRUE;

	public function __construct($config = NULL)
	{
		parent::__construct();

		$this->page->title[] = __('Administration');

		Hanami::$css->remove('screen.css');
		Hanami::$css->add('admin.css');

		/*$this->header
			->set('logout', Auth::instance()->logged_in()
				? '<p id="logout"><a href="/logout">'.Kohana::lang('auth.logout').'</a></p>'
					: '');*/
	}

}