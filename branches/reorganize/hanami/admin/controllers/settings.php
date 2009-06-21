<?php 

class Settings_Controller extends Backend_Controller {

	public function __construct() {
		parent::__construct();

		$this->class = get_class();
	}

	public function index()
	{
		$this->template->content = 'foobar';
	}

	public function user()
	{
		$this->template->content = 'foobar';
	}

	public function menu()
	{
		$this->page->title[] = Kohana::lang('admin.modules');

		$modules = array(
			array(
				'name' => 'Home page', 
				'methods' => array(array(
					'name' => 'Home page index', 
					'desc' => 'foobar'
				))));

		foreach(ORM::factory('module')->find_all() as $module)
		{
			$class = ucfirst(basename($module->name)).'_Controller';

			$methods = array_diff
			(
				get_class_methods($class),
				get_class_methods(get_parent_class($class))
			);

			$module_methods = array();
			foreach($methods as $method)
			{
				$test = new ReflectionMethod($class, $method);

				if($test->isPublic())
					$module_methods[] = array(
						'name' => strtr(':controller :method page', array(
							':controller' => ucfirst($module->name), 
							':method'     => $method
						)), 
						'desc' => $test->getDocComment()
					);
			}

			$modules[] = array(
				'name'    => $module->name,
				'methods' => $module_methods
			);
		}

		$this->template->content = View::factory('modules/index')
			->set('modules', $modules);
	}

} // End Modules Controller