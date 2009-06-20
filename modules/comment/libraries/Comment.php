<?php 
/**
 * Blog library. Handles user entries and thier comments
 *
 * @package    Content Management
 * @author     David Pommer
 * @copyright  (c) 2008 David Pommer
 */
class Comment {

	private $type;
	private $type_id;

	protected $fields = array
	(
		'username',
		'email',
		'webseite',
		'message',
	);

	protected $required_fields = array(
		'email',
		'message'
	);
	//public $model;

	public $errors;

	public static function factory($type, $type_id = NULL)// & $model)
	{
		return new Comment($type, $type_id);//$model);
	}

	public function __construct($type, $type_id)// & $model)
	{
		$this->type    = (string) $type."_id";
		$this->type_id = (int) $type_id;
		//echo Kohana::debug($model);

		//$this->model = $model;
		//return $model->find_related_blog_comments();
	}

	public function get()
	{
		return $this->model->find_related_blog_comments();
	}

	/*public function overview()
	{
		return 'Blog test';
	}*/

	public function add($data, $id)
	{
		/*$data = Validation::factory($data);

		$data->pre_filter('trim', true);
		foreach($this->required_fields as $field)
		{
			$data->add_rules($field, 'required');
		}

		if ($data->validate())
		{
			$comment = new Model_Blog_Comment;
			
			$comment->blog_article_id = $id;
			
			foreach($data->as_array() as $key => $value)
			{
				$comment->$key = $value;
			}
			$comment->save();
		}

		$this->errors = $data->errors();*/
	}

	public function save(array &$data)
	{
		if (empty($array))
			return false;

		$data = Validation::factory($data)
			->pre_filter('trim')

			->add_rules('username', 'required')
			->add_rules('email', 'required', 'email')
			->add_rules('message', 'required');

		if ($data['website'])
			$data->add_rules('website', 'url');

		if ($data->validate())
		{
			$comment = new Blog_Comment_Model;
			$comment->{$this->type} = $this->type_id;
			
			foreach($data->as_array() as $key => $value)
			{
				$comment->$key = $value;
			}
			$comment->save();
		}
		else
		{
			$this->errors = $data->errors();
		}

		return $this;
	}
} // End Blog_Comment
?>
