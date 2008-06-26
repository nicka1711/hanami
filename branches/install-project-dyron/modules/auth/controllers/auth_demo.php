<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Auth module demo controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * $Id: auth_demo.php 2409 2008-04-03 20:43:24Z PugFish $
 *
 * @package    Auth
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Auth_Demo_Controller extends Controller {

	public function __construct()
	{
		parent::__construct();

		// Load auth library
		$this->auth = new Auth();
	}

	public function index()
	{
		// Display the install page
		echo new View('auth/install');
	}

	public function create()
	{
		$form = new Forge(NULL, 'Create User');

		$form->input('email')->label(TRUE)->rules('required|length[4,32]');
		$form->input('username')->label(TRUE)->rules('required|length[4,32]');
		$form->password('password')->label(TRUE)->rules('required|length[5,40]');
		$form->submit('Create New User');

		if ($form->validate())
		{
			// Create new user
			$user = new User_Model;

			if ( ! $user->username_exists($this->input->post('username')))
			{
				foreach($form->as_array() as $key => $val)
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
		}

		// Display the form
		echo $form->html();
	}

	public function login()
	{
		if (Session::instance()->get('user_id'))
		{
			$form = new Forge('auth_demo/logout', 'Log Out');

			$form->submit('Logout Now');
		}
		else
		{
			$form = new Forge(NULL, 'User Login');

			$form->input('username')->label(TRUE)->rules('required|length[4,32]');
			$form->password('password')->label(TRUE)->rules('required|length[5,40]');
			$form->submit('Attempt Login');

			if ($form->validate())
			{
				// Load the user
				$user = ORM::factory('user', $form->username->value);

				// Attempt a login
				if ($this->auth->login($user, $form->password->value))
				{
					echo '<h4>Login Success!</h4>';
					echo '<p>Your roles are:</p>';
					echo Kohana::debug($user->roles);
					return;
				}
				else
				{
					$form->password->add_error('login_failed', 'Invalid username or password.');
				}
			}
		}

		// Display the form
		echo $form->html();
	}

	public function logout()
	{
		// Load auth and log out
		$this->auth->logout(TRUE);

		// Redirect back to the login page
		url::redirect('auth_demo/login');
	}

} // End Auth Demo Controller