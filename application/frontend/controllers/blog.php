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
					? View::factory('comments/list')
						->set('comments', $comments) 
					: Kohana::lang('blog.no_comments'))
				->set('write', ((bool) $article->allow_comments) 
					? View::factory('/blog/comment/form')
						->set('comment', (object) $fields)
						->set('errors', $this->errors['comment'])
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
