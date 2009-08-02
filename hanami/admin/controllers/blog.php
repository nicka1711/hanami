<?php 
/**
 * Blog administration module demo controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * $Id$
 *
 * @package    Blog
 * @author     David Pommer
 * @copyright
 * @license
 */
class Blog_Controller extends Admin_Controller {

	/**
	 * Displays all articles
	 * 
	 * @param string ID
	 */
	public function index($id = NULL) 
	{
		// Article model
		$articles = new Blog_Article_Model;
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

		$this->template->content = View::factory('blog/index')
			->set('articles', $articles->orderby('posted', 'DESC')->find_all($limit, $offset))
			->set('pagination', $pagination);
	}





	/*public function archive($year = NULL, $month = NULL)
	{
		empty($month) and $month = date('n'); // Current month
		empty($year)  and $year  = date('Y'); // Current year


		$articles = new Model_Blog_Article;
		$articles->orderby('posted', 'DESC');

		$list = array();
		foreach($articles->find_all() as $article)
		{
			$list[date('Y', strtotime($article->posted))][date('F', strtotime($article->posted))][] = $article;
		}

		$this->template->content = View::factory('blog/archive')
			->set('list', $list);

	}*/


	public function article($id = NULL)
	{
		$article = Model::factory('blog_article', (int) $id);//new Blog_Article_Model($id);

		$this->page->title[] = $article->title;
		/*$form = new Forge(NULL, 'Write a blog article');

		$form->input('title')->label(TRUE)->rules('required|length[2,255]');
		$form->textarea('body')->label(TRUE)->cols(50)->rows(15)->rules('required');
		$form->submit('Save');



		if ($form->validate() and $_POST)
		{
			// Set the form fields to the new article object
			foreach ($form->as_array() as $key => $val)
			{
				// Update the article data
				$article->$key = $val;
			}

			// Change to something dynamic or a session variable
			$article->user_id = 1;

			// Save the article
			$article->save();
			
			// Go back to the account page
			url::redirect('blog_demo/article/'.$article->id);
		}

		// Display the form
		echo $form->render();
		/*($id === 'new') and $id = FALSE;

		$article = new Model_Blog_Article($id);

		$_POST = Validation::factory($_POST)
			->pre_filter('trim', TRUE)

			->add_rules('title', 'required', 'length[2,255]', 'standard_text')
			->add_rules('body', 'required', 'standard_text');
		
		!empty($_POST['extended']) and $_POST->add_rules('extended', 'standard_text');
		
		if ( ! $_POST->submitted())
		{
			// Existting user data
			$data = $article->as_array();

			foreach (arr::extract($data, 'title', 'body', 'extended') as $key => $val)
			{
				// Pre-fill POST data with existing data
				$_POST[$key] = $val;
			}
		}

		if ($_POST->validate())
		{
			foreach ($_POST->safe_array() as $key => $val)
			{
				// Update the article data
				$article->$key = $val;
			}

			$article->user_id = 1;

			// Save the article
			$article->saved() or $article->save();

			// Go back to the account page
			//url::redirect('articles');
		}
*/
		$this->template->content = View::factory('blog/article/form')
			->bind('article', $article);
//				->set('errors', $_POST->errors('error.form'));
	/*}

	public function comments()
	{
		$_POST = new Validation($_POST);
		$_POST->pre_filter('trim', true);

		foreach($this->required_comments_fields as $required_field)
		{
			if ($required_field === 'email')
			{
				$_POST->add_rules($required_field, 'required', array('valid','email'));
			}
			else
			{
				$_POST->add_rules($required_field, 'required');
			}
		}
		
		if ($_POST->validate())
		{
			$this->template->content = 'Hooray!';
		}
		else
		{
			$this->template->content = Kohana::debug($_POST->errors());
		}*/
	}

} // End Blog Admin Demo