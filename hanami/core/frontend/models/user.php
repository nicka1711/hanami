<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Model extends Auth_User_Model {

	// Relationships
	protected $has_many = array(
		'blog_articles'
	);
	
} // End User Model