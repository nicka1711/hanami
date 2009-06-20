<?php 
/**
 * Blog library. Handles user entries and thier comments
 *
 * @package    Content Management
 * @author     David Pommer
 * @copyright  (c) 2008 David Pommer
 */
class Blog_Comment {

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

	public static function factory()// & $model)
	{
		return new Blog_Comment();//$model);
	}

	public function __construct()// & $model)
	{
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

	public function save(array &$data, $reference)
	{
		$data = Validation::factory($data)
			->pre_filter('trim')

			->add_rules('username', 'required')
			->add_rules('email', 'required', 'email')
			->add_rules('message', 'required');

		($data['website']) and $data->add_rules('website', 'url');

		if ($data->validate())
		{
			$comment = new Blog_Comment_Model;
			$comment->blog_article_id = $reference;
			
			foreach($data->as_array() as $key => $value)
			{
				$comment->$key = $value;
			}
			$comment->save();

			return false;
		}
		else
		{
			$this->errors = $data->errors();
		}

		return $this;
	}
} // End Blog_Comment
?>
