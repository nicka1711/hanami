<?php 

class Blog_Article_Model extends ORM {

	// Relationships
	protected $has_many = array('blog_comments');
	protected $has_and_belongs_to_many = array('blog_category');
	protected $belongs_to = array('user', 'blog');

} // End Blog_Article_Model
