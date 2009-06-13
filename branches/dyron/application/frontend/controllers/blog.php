<?php
/**
 * 
 */
class Blog_Controller extends Frontend_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->page->title[] = Kohana::lang('blog.blog');
	}

	/**
	 * Displays all articles
	 * 
	 * @param string ID
	 */
	public function index($id = NULL) 
	{
		// Article model
		$articles = ORM::factory('blog_article');//new Blog_Article_Model;
		$count    = $articles->count_all();

		// Paging option
		$page  = $this->input->get('page', 1);
		$limit = $this->input->get('per_page', (int) Kohana::config('blog.article_per_page'));

		// Calculate the offset
		$offset = (int) (($page - 1) * $limit);

		$pagination = Pagination::factory(array(
			'query_string'   => 'page',
			'total_items'    => $count,
			'items_per_page' => $limit,
			'auto_hide'      => true
		));

		$this->template->content = View::factory('blog/articles')
			->set('articles', $articles->orderby('posted', 'DESC')->find_all($limit, $offset))
			->set('pagination', $pagination);
	}

	/**
	 * Displays an article
	 * 
	 * @param string article url title
	 */
	public function article($title = NULL)
	{
		// Load the current article 
		$article = ORM::factory('blog_article')->where('url', (string) $title)->find();

		// If an article is not found
		if ( ! $article->loaded) 
			url::redirect(Router::$controller);

		// Set page title
		$this->page->title[] = $article->title;

		if ((bool) $article->allow_comments)
		{
			$comment = array(
				'username' => '',
				'email'    => '',
				'website'  => '',
				'message'  => ''
			);

			$form = View::factory('blog/comment/form')
				->bind('comment', $comment);

			$data = $this->input->post('comment', array());

//echo Kohana::debug($data);
//			$errors = array();
			$new_comment = Comment::factory('blog_article', $article->id)->save($data);
			if ( ! empty ($new_comment->errors))
			{
				$form->bind('errors', $new_comment->errors);//echo Kohana::debug($new);//$errors = $new->errors;
			}
			/*if (request::method() === 'post')
			{
				$data = Validation::factory($_POST['comment']);
	
				if ($data->validate())
				{
					$new = new Blog_Comment_Model;
					foreach($data->as_array() as $key => $value)
					{
						$new->$key = $value;
					}
					$new->blog_article_id = $article->id;
					//echo Kohana::debug($data, 'saving data');
					$new->save();
				}
				else
				{
					$comment = arr::overwrite($data->as_array());
				}
			}*/
		
			//, 'errors' => $errors));
		}

		// Find related comments
		$comments      = $article->blog_comments;
		$comment_count = count($comments);

		$this->template->content = View::factory('blog/article/details')
			->bind('article', $article)
			->bind('comment_count', $comment_count)
			->set('comments', View::factory('blog/comment/index')
				->bind('comments', $comments)
				->bind('form', $form));
	}
	
	public function tag($tag)
	{
		$article = Blog_Article_Model::factory();

		$this->template->content = View::factory('blog/articles')
			->set('articles');
	}
}
/*

<?php 

class Blog_Controller extends Frontend_Controller {

	private $errors = array();

	public function __construct()
	{
		parent::__construct();

		$this->page->title[] = Kohana::lang('blog.blog');
	}

	public function index()
	{
		$this->articles();
	}

	public function archive($year = NULL, $month = NULL)
	{
		$articles = new Blog_Article_Model;

		($year  == NULL) or $articles->where('YEAR(posted) = '.(int) $year);
		($month == NULL) or $articles->where('MONTH(posted) = '.(int) $month);

		$articles->orderby('posted', 'DESC');

		$list = array();
		foreach($articles->find_all() as $article)
		{
			$time = strtotime($article->posted);
			$list[date('Y', $time)][date('F', $time)][] = $article;
		}

		$this->page->title[] = Kohana::lang('blog.archive');

		$this->template->content = View::factory('blog/archive')
			->set('list', $list);
	}

	public function article($title)
	{
		$article = ORM::factory('blog_article')->where('url', $title)->find();

		// If an article is found
		($article->id > 0) or url::redirect('/blog');

		// Default form fields
		$fields = array
		(
			'username' => '',
			'email'    => '',
			'website'  => 'http://',
			'message'  => '',
		);

		// Process comment input
		if (isset($_POST['comment']))
		{
			$comment = new Blog_Comment;
			if ( ! ($comment->save($_POST['comment'], $article->id)))
			{
				$fields = array_merge($fields, $_POST['comment']);

				$this->errors['comment'] = $comment->errors;
			}
		}

		// Find article related comments
		$comments       = $article->blog_comments;
		$total_comments = count($comments);

		$this->page->title[] = $article->title;

		$this->template->content = View::factory('blog/article/details')
			->set('article', $article)
			->set('comments_count', $total_comments)
			->set('comments', View::factory('blog/comment/overview')
				->set('comments', ((bool) $total_comments)
					? View::factory('blog/comment/list')
						->set('comments', $comments) 
					: Kohana::lang('blog.no_comments'))
				->set('write', ((bool) $article->allow_comments) 
					? View::factory('blog/comment/form')
						->set('comment', (object) $fields)
						->set('errors', $this->errors)
					: Kohana::lang('comments.no_comments_allowed')));
	}

	public function articles()
	{
		// Article model
		$articles = ORM::factory('blog_article');

		// Paging option
		$page  = (int) $this->input->get('page');//$_GET['page'];
		$limit = (int) 0;//$_SESSION['per_page'];

		// Default options
		($page  > 0) or $page  = 1;
		($limit > 0) or $limit = (int) Kohana::config('blog.article_per_page');

		// Calculate the offset
		$offset = ($page === 1) ? 0 : (int) (($page - 1) * $limit);

		$articles = $articles
			->orderby('posted', 'DESC')
			->find_all($limit, $offset);

		$this->template->content = View::factory('blog/articles')
			->set('articles', $articles)
			->set('pagination', Pagination::factory(array(
					'query_string'   => 'page',
					'auto_hide'      => TRUE,
					'total_items'    => count($articles),
					'items_per_page' => $limit)));
		
	}
}


*/