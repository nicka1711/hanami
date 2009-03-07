<?php 

class Auth_Controller extends Backend_Controller {
	
	private $auth;

	public $template = 'auth/template';

	public function __construct()
	{
		parent::__construct();

		// Load auth library
		$this->auth = new Auth;
	}

	public function index() {
		
	}
	/**
	 * Login method
	 */
	/*public function login() 
	{
		$this->template->content = View::factory('auth/login')
			->set('username', isset($_POST['login']['username']) ? $_POST['login']['username'] : '');

		if (isset($_POST['submit']))
		{
			$this->template->content .= Kohana::debug($_POST['login']);
		}
	}*/

	public function login()
	{
		//
		ORM::factory('user')->login($_POST, '/dashboard');

		$this->page->title[] = Kohana::lang('auth.login');

		// Load content
		$this->template->content = View::factory('auth/login')
			->set('username', $this->input->post('username'))
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