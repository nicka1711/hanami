<?php defined('SYSPATH') or die('No direct script access.');

class Author_Model extends User_Model {

	// Model table information
	protected $table_name = 'users';

	// Blog relationships
	protected $has_many = array('blog_article');


}