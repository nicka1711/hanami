<?php 

class Blog_Article_Model extends ORM {

	// Relationships
	protected $has_many = array(
		'blog_comments'
	);

	protected $has_and_belongs_to_many = array(
		'blog_categories'
	);

	protected $belongs_to = array(
		'author' => 'user', 
		//'editor' => 'user', 
		//'blog'
	);

} // End Blog_Article_Model
