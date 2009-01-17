<?php 

class Model_Author extends Model_User {

	// Model table information
	protected $table_name = 'users';

	// Blog relationships
	protected $has_many = array('blog_article');


}