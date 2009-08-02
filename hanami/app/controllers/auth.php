<?php 

class Auth_Controller extends Template_Controller {
	
	private $auth;

	//public $template = 'auth/template';

	public function __construct()
	{
		parent::__construct();

		$this->class = get_class();
	}

	public function index() {
		
	}

	/**
	 * Login method
	 */
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
/*<?php 

class Controller_Auth extends Controller_Frontend {

	//protected $validation;
	
	private $auth;

	public function __construct()
	{
		parent::__construct();

		// Load auth library
		$this->auth = new Auth();
	}

	public function index()
	{
		// Send them to the right page
		($this->auth->logged_in() === TRUE) and url::redirect('/');

		url::redirect('/login');
	}

	public function login()
	{
		$_POST = Validation::factory();//echo Kohana::debug(url::subdomain()); die();
	
		// Create the login form
		/*$form = new Forge('/login', NULL, 'post', array('class' => 'login'));//'Developer Login');
		$form->input('username')->label(Kohana::lang('auth.username'))->rules('required|length[2,32]');
		$form->password('password')->label(Kohana::lang('auth.password'))->rules('required|length[2,64]');
		//$form->checkbox('remember')->label(Kohana::lang('auth.auto_login'))->checked(true);
		$form->submit(Kohana::lang('auth.login'));

		if ($form->validate() and ($data = $form->as_array()))
		{
			// Load Auth and the user
			$user = new Model_User($data['username']);

			// Make sure the user is valid and attempt a login
			if ($this->auth->login($user, $data['password']))
			{
				// Hooray!
				$this->session->set(array('user_id' => $user->id, 'logged_in' => true));
				url::redirect('/');
			}
		}

		$this->title = Kohana::lang('auth.login');

		// Load content
		$this->template->content = View::factory('auth/login')
			->set('error', $_POST->errors('form'));
	}

	public function logout()
	{
		// Load auth and log out
		$this->auth->logout(TRUE);

		// Redirect back to the login page
		url::redirect('/');
	}


	public function register()
	{
		$_POST = Validation::factory();

		$_POST
			->pre_filter('trim', true)

			->add_rules('username', 'required[0,50]')
			->add_rules('email', 'required', 'valid::email')
			->add_rules('password', 'required[6,]')
			->add_rules('passconf', 'matches[password]');

		$_POST->validate();
		//$this->validation
		/*$form = new Forge(NULL, 'Create User');

		$form->input('email')->label(TRUE)->rules('required|length[4,32]');
		$form->input('username')->label(TRUE)->rules('required|length[4,32]');
		$form->password('password')->label(TRUE)->rules('required|length[5,40]');
		$form->submit('Create New User');

		if ($form->validate())
		{
			// Create new user
			$user = new Model_User;

			if ( ! $user->username_exists($this->input->post('username')))
			{
				foreach ($form->as_array() as $key => $val)
				{
					// Set user data
					$user->$key = $val;
				}

				if ($user->save() AND $user->add_role('login'))
				{
					// Redirect to the login page
					url::redirect('auth_demo/login');
				}
			}
		}*//*

		// Load content
		$this->template->content = View::factory('auth/register')
			->set('errors', $_POST->errors('form'))
			->set('req_fields', 'username,email'); // *TODO* generate it from the validation rules
	}

} // End Auth*/