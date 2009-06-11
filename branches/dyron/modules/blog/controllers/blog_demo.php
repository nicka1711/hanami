<?php 
/**
 * Blog module demo controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * $Id$
 *
 * @package    Blog
 * @author     David Pommer
 * @copyright
 * @license
 */
class Blog_Demo_Controller extends Controller {

	// Do not allow to run in production
	const ALLOW_PRODUCTION = FALSE;

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		// Display the install page
		echo View::factory('blog/install');
	}

	public function archive($year = NULL, $month = NULL)
	{
		if ($month === NULL)
			$month = date('n'); // Current month
		if ($year === NULL)
			$year  = date('Y'); // Current year

		$articles = new Blog_Article_Model;
		$articles->orderby('posted', 'DESC');

		$list = array();
		foreach($articles->find_all() as $article)
		{
			$list[date('Y', strtotime($article->posted))][date('F', strtotime($article->posted))][] = $article;
		}

		echo View::factory('blog/archive')
			->set('list', $list);
	}

	public function article($id = NULL)
	{
		// Load the 
		$article = ORM::factory('blog_article', $id);

		// If an article is not found
		($article->id > 0) or url::redirect('/blog_demo');

		// Find related comments
		$comments      = $article->blog_comments;
		$comment_count = count($comments);

		echo View::factory('blog/article/details')
			->bind('article', $article)
			->set('comments_count', $comment_count);

		if ($comment_count)
		{
			echo View::factory('blog/comment/list')
				->bind('comments', $comments);
		}
	}
	
	public function articles()
	{
		// Article model
		$article = ORM::factory('blog_article');
		$count = $article->count_all();

		// Paging option
		$page  = $this->input->get('page', 1);
		$limit = $this->input->get('per_page', (int) Kohana::config('blog.article_per_page'));

		// Calculate the offset
		$offset = ($page === 1) ? 0 : (int) (($page - 1) * $limit);

		echo View::factory('blog/articles')
			->set('articles', $article->orderby('posted', 'DESC')->find_all($limit, $offset))
			->set('pagination', Pagination::factory(array(
					'query_string'   => 'page',
					'total_items'    => $count,
					'items_per_page' => $limit,
					'auto_hide'      => true
				)));
		
	}
}