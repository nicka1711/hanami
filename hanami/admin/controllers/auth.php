<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Basic Hanami auth controller
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
class Auth_Controller extends Website_Controller {

	// Template view name
	public $template = 'auth/template';

	public function index() 
	{
		url::redirect('/login');
	}

	/**
	 * Login method
	 */
	public function login()
	{
		//
		ORM::factory('user')->login($_POST, '/');

		$this->page->title[] = __('Login');

		// Load content
		$this->template->content = View::factory('auth/login')
			->set('username', $this->input->post('login.username'))
			->set('errors', $_POST->errors('form'));
	}

	/**
	 * JS access to check the user input
	 *
	 * @param  string  Type to check, can be 'username' or 'password'
	 * @return boolean
	 */
	public function check($type)
	{
		
	}

} // END Auth Controller