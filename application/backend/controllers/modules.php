<?php 

class Modules_Controller extends Backend_Controller {

	public function __construct() {
		parent::__construct();

		$this->class = get_class();
	}

	public function index()
	{
		$this->page->title[] = Kohana::lang('admin.modules');

		$modules = array(
			array('name' => 'Home page', 'methods' => array('name' => 'index'))
		);

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

				/*$doc_comments = array();
				foreach(token_get_all($test->getDocComment()) as $token)
				{
					if(is_array($token) && $token[0] == T_DOC_COMMENT)
					{
						$doc_comments[] = $token[1];
					}
				}*/
				if($test->isPublic())
					$module_methods[] = array(
						'name' => sprintf('%s %s', $module->name, $method), 
						'desc' => $test->getDocComment()
					);
			}

			$modules[] = array(
				'name'    => $module->name,
				'methods' => $module_methods,
			
			);
		}

		$this->template->content = View::factory('modules/index')
			->set('modules', $modules);
	}

} // End Modules Controller