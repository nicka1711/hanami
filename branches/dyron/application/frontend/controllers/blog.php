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
		$articles = new Blog_Article_Model;
		$count   = $articles->count_all();

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
		// Load the 
		$article = ORM::factory('blog_article')->where('url', $title)->find();

		// If an article is not found
		if($article->id < 1) 
			url::redirect('/blog');

		// set page title
		$this->page->title[] = $article->title;

		// Find related comments
		$comments      = $article->blog_comments;
		$comment_count = count($comments);

		$this->template->content = View::factory('blog/article/details')
			->bind('article', $article)
			->bind('comment_count', $comment_count)
			->set('comments', View::factory('blog/comments/index')
				->bind('comments', $comments)
				->bind('form', $form));

		if ((bool) $article->allow_comments)
		{
			$comment = array(
				'username' => '',
				'email'    => '',
				'website'  => '',
				'message'  => ''
			);
			
			if (request::method() === 'post')
			{
				$data = Validation::factory($_POST['comment']);
	
				if ($data->validate())
				{
					
				}
				else
				{
					$comment = arr::overwrite($data->as_array());
				}
			}

			$form = View::factory('blog/comments/form', array('comment' => $comment));
		}
	}
	
	public function tag($tag)
	{
		$article = Blog_Article_Model::factory();

		$this->template->content = View::factory('blog/articles')
			->set('articles');
	}
}
