<?php

class Test_Controller extends Frontend_Controller {
	
	public function index()
	{
		$modules = Kohana::config('core.modules');
		foreach($modules as $module)
			{
				$class = ucfirst(basename($module)).'_Controller';
				$methods = get_class_methods($class);
foreach($methods as $method)
	{
		$test = new ReflectionMethod($class, $method);
		echo Kohana::debug($class, $method, $test->getDocComment());
		var_dump($class, $method, $test->getDocComment());
	}

				
			}
		// 
		//
		$this->template->content = '';//View('test')->set('')
	}
}