<?php defined('SYSPATH') or die('No direct script access.');

class Blog_Category_Model extends ORM {

	protected $has_and_belongs_to_many = array
	(
		'blog_post'
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
}
?>