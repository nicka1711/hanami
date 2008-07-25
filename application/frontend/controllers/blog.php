<?php defined('SYSPATH') or die('No direct script access.');

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
		$article = ORM::factory('blog_article')->find_by_url($title);

		// If an article is found
		($article->id > 0) or url::redirect('/blog');

		// Process comment input
		if (isset($_POST['comment']))
		{
			$comment = Blog_Comment::factory();
			$comment->save($_POST['comment'], $article->id) or $this->errors['comment'] = $comment->errors;
		}

		$fields = array
		(
			'username' => '',
			'email' => '',
			'website' => '',
			'message' => '',
		);

			$comment_form = View::factory('/blog/comment/form')
				->set('comment', (object) $fields)
				->set('errors', $this->errors['comment']);

		/*if (!$_POST)
		{
			$comment_form = View::factory('/blog/comment/form')
				->set('comment', (object) $fields);
		}
		else
		{
			$_POST = Validation::factory($_POST);
		}

		
		if (isset($_POST['comment']))
		{
			$fields = array
			(
				'username',
				'email',
				'website',
				'message',
			);
		
			foreach ($fields as $field)
			{
				$$field = $this->input->post($field);
			}

			$_POST = Validation::factory($_POST)
				->pre_filter('trim', true)
				->add_rules('username', 'valid::standard_text')
				->add_rules('email', 'email');
				//->add_error('email', 'not_valid');
				//->add_rules('message', 'valid::standard_text')

			foreach(array('username', 'email', 'message') as $field)
			{
				$_POST->add_rules($field, 'required');
			}

			isset ($_POST['website']) and $_POST->add_rules('website', 'url');

			if ($_POST->validate())
			{
				$comment = new Blog_Comment_Model;
			
				$comment->blog_article_id = $article->id;
			
				foreach($_POST->as_array() as $key => $value)
				{
					$comment->$key = $value;
				}
				$comment->save();
			
				if ($comment->saved())
				{
					foreach ($fields as $field)
					{
						$$field = '';
					}
				}
			}
		}
/*
		if ()
		{
		
		}*/

		// Find article related comments
		$comments = $article->find_related_blog_comments();

		$this->page->title[] = $article->title;

		$this->template->content = View::factory('blog/article/details')
			->set('article', $article)
			->set('comments', View::factory('blog/comments')
				->set('comments', ((bool) count($comments))
					? View::factory('comments/list')
						->set('comments', $comments) 
					: Kohana::lang('blog.no_comments'))
				->set('write', ((bool) $article->allow_comments) 
					? $comment_form
					: Kohana::lang('comments.no_comments_allowed')));
	}

	public function articles()
	{
		// Article model
		$articles = ORM::factory('blog_article');

		// Paging option
		$page  = (int) $this->input->get('page');//$_GET['page'];
		$limit = (int) 0; // $_SESSION['per_page'];

		// Default options
		($page  > 0) or $page  = 1;
		($limit > 0) or $limit = (int) Kohana::config('blog.article_per_page');

		// Calculate the offset
		$offset = ($page === 1) ? 0 : (int) (($page - 1) * $limit);

		$this->template->content = View::factory('blog/articles')
			->set('articles', $articles
				->orderby('posted', 'DESC')
				->find_all($limit, $offset))
			->set('pagination', Pagination::factory(array(
					'query_string'   => 'page',
					'auto_hide'      => TRUE,
					'total_items'    => $articles->count_all(),
					'items_per_page' => $limit)));
		
	}
}
