<?php 

class Controller_Auth extends Controller_Backend {
	
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
		$_POST = Validation::factory($_POST)
			->pre_filter('trim', TRUE)
			->add_rules('username', 'required', 'length[2,32]')
			->add_rules('password', 'required', 'length[4,64]');
	

		if ($_POST->validate())
		{
			$user = new Model_User($_POST['username']);
				//echo Kohana::debug($this->auth->login($user, $_POST['password']));
			if ($this->auth->login($user, $_POST['password']))
			{
				$_SESSION['user'] = array
				(
					'id'        => $user->id,
					'roles'     => $user->roles,
				);
				$_SESSION['logged_in'] = true;

				url::redirect('/');
			}
			else
			{
				$_POST->add_error('password', 'invalid_login');
			}
		}

		$this->page->title[] = Kohana::lang('auth.login');

		// Load content
		$this->template->content = View::factory('auth/login')
			->set('username', isset($_POST['username']) ? $_POST['username'] : '')
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