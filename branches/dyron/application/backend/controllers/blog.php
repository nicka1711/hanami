<?php 

class Controller_Blog extends Controller_Backend {



	public function index()
	{
		$this->template->content = '<ul><li><a href="/blog/article">Artikel</a></li></ul>';
	}

	public function article($id = NULL)
	{
		//Blog_Article::factory($id);

		$this->template->content = View::factory('blog/article/details');
	}

} // End Blog Controller