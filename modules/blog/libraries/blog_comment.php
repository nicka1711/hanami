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
	}

	public function add(array & $array, $reference)
	{
		if (empty($array))
			return false;

		$array = Validation::factory($array)
			->pre_filter('trim')
			->add_rules('username', 'required')
			->add_rules('email', 'required', 'email')
			->add_rules('message', 'required');

		if (isset($array['website']) AND ! empty($array['website']))
			$array->add_rules('website', 'url');

		if ($array->validate())
		{
			$comment = new Blog_Comment_Model;
			$comment->blog_article_id = $reference;
			
			foreach($array->as_array() as $key => $value)
			{
				if (in_array($key, $this->fields))
					$comment->$key = $value;
			}
			$comment->save();
			
			return true;
		}

		return false;
	}

	/**
	 * Validates and optionally saves a new user record from an array.
	 *
	 * @param  array    values to check
	 * @param  boolean  save the record when validation succeeds
	 * @return boolean
	 */
	public function validate(array & $array, $save = FALSE)
	{
		$array = Validation::factory($array)
			->pre_filter('trim')
			->add_rules('username', 'required')
			->add_rules('email', 'required', 'email')
			->add_rules('message', 'required');

		if (isset($array['website']) AND ! empty($array['website']))
			$array->add_rules('website', 'url');

		return parent::validate($array, $save);
	}


	public function save(array &$data, $reference)
	{
		if (empty($data))
			return false;

		$data = Validation::factory($data)
			->pre_filter('trim')
			->add_rules('username', 'required')
			->add_rules('email', 'required', 'email')
			->add_rules('message', 'required');

		if (isset($data['website']) AND ! empty($data['website']))
			$data->add_rules('website', 'url');

		if ($data->validate())
		{
			$comment = new Blog_Comment_Model;
			$comment->blog_article_id = $reference;
			
			foreach($data->as_array() as $key => $value)
			{
				if (in_array($key, $this->fields))
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
