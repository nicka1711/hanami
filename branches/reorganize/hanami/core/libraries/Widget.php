<?php

class Widget_Core 
{
	protected $config = array();

	public function __construct($config = array())
	{
		$this->config = $config;

		$this->input = Input::instance();
	}

	public static function factory($widget, $config = array())
	{
		$class = ucfirst(strtolower($widget)).'_Widget';

        if (class_exists($class))
            return new $class($config);

        if ($file = Kohana::find_file('widgets', $widget))
        {
            require $file;

            if (class_exists($class))
                return new $class($config);
        }
        throw new Kohana_Exception('core.resource_not_found', 'Widget', $widget);
    }


	/**
	 * Magically convert this object to a string
	 *
	 * @return  string
	 */
	public function __toString()
	{
		return $this->render();
	}
} // End Widget

