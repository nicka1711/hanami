<?php 

class Modules_Controller extends Backend_Controller {

	public function __construct() {
		parent::__construct();

		$this->class = get_class();
	}

	public function index()
	{
		//$this->page->title[] = Kohana::lang('admin.administration');
		$this->page->title[] = Kohana::lang('admin.modules');

		$modules = array_intersect(Kohana::config('core.modules'), ORM::factory('module')->find(ALL)->as_array());
		//echo Kohana::debug($modules);

		foreach($modules as $module)
		{
			$class = ucfirst(basename($module)).'_Controller';
			$methods = get_class_methods($class);
			if(!empty($methods))//echo Kohana::debug($class, $methods);
				foreach($methods as $method)
				{
					$test = new ReflectionMethod($class, $method);

					$doc_comments = array();
					foreach(token_get_all($test->getDocComment()) as $token)
    				{
        				if(is_array($token) && $token[0] == T_DOC_COMMENT)
        				{
            				$doc_comments[] = $token[1];
        				}
    				}
					
					if($test->isPublic())
						echo Kohana::debug($class, $method, $doc_comments);
					//var_dump($class, $method, $test->getDocComment());
				}
		}

		$this->template->content = View::factory('modules/index');
	}

} // End Modules Controller