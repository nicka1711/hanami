<?php 

/*class Model_Blog extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function overview($limit = NULL) 
	{
		empty($limit) and $limit = Kohana::config('limits.overview');
		
		$sql = "SELECT
                    post.id, 
                    post.headline, 
                    post.content,  
                    DATE_FORMAT(post.datetime, ?) AS posted, 
                    user.name AS author
                FROM
                    ".TABLE_BLOG_POSTS." AS post
                LEFT JOIN
                    ".TABLE_USERS." AS user
                ON
                    post.author = user.id
                WHERE
                    status = 'published'
                LIMIT
                    0, ?;";
		$query = $this->db->query($sql, array(Kohana::config('locale.date_time.datetime'), $limit));
		$entries = array();
		foreach($query->result() as $record)
		{
			$entries[] = $record;
		}

		return $entries;
	}
}*/

class Model_Blog extends ORM 
{
	protected $has_many = array
	(
		'blog_article'
	);

	public function __construct($id = FALSE)
	{
		parent::__construct($id);
	}

}

?>