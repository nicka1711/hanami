<?php 

class Model_Blog_Article extends ORM {

	// Relationships
	protected $has_many = array('blog_comments');
	protected $has_and_belongs_to_many = array('blog_category');
	protected $belongs_to = array('user', 'blog');

	// Author
/*	protected $has_author;


	public function has($object, $id = NULL)
	{
		if ($object === 'author')
		{
			if ( ! $this->loaded)
				return FALSE;

			if ($this->has_author === NULL)
			{
				$this->db->select('username');

				// Load the roles
				$this->has_author = $this->roles->select_list('id', 'name');
			}
		}

		return parent::has($object, $id);
	}


	public function save()
	{
		if ($this->saved == FALSE) 
		{
			$this->posted = gmdate("Y-m-d H:i:s", time());
		}
		
		//$this->modified = gmdate("Y-m-d H:i:s", time());
		
		parent::save();
	}

	public function get_status()
	{
		$result = self::$db->query("SHOW COLUMNS FROM blog_articles LIKE 'status'");
		
		return explode("','", substr($result->current()->Type, 6, -2));
	}*/
}
?>