<?php

class User_Model extends Auth_User_Model {

	public function __get($key)
	{
		if ($key === 'username')
		{
			$key = 'name';
		}

		parent::__get($key);
	}

	public function __set($key, $value)
	{
		if ($key === 'username')
		{
			// Use Auth to hash the password
			$key = 'name';
		}

		parent::__set($key, $value);
	}
	
} // End User Model