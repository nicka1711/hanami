<?php defined('SYSPATH') or die('No direct script access.');

class Blog_Comment_Model extends ORM {

	protected $belongs_to = array
	(
		'blog_articles'
	);

	public function __construct($id = FALSE)
	{
		parent::__construct($id);
	}
	
	/*function count($ref_id)
	{
		$sql = "SELECT
                    COUNT(comment.id) AS count
                FROM
                    ".TABLE_BLOG_COMMENTS." AS comment
                WHERE
                    comment.post = ?;";
		$query = $this->db->query($sql, array($ref_id));
		$record = $query->result();

		return (int) $record[0]->count;
	}*/


	public function save()
	{
		if ($this->saved == FALSE) 
		{
			$this->created = gmdate("Y-m-d H:i:s", time());
		}
		
		//$this->modified = gmdate("Y-m-d H:i:s", time());
		
		parent::save();
	}

}
?>