<?php

class Forum_Controller extends Website_Controller {

	function __construct()
	{
		parent::__construct();

		$this->page->title[] = Kohana::lang('forum.forum');
	}
    /**
     * Display all forum topics
     */
    public function index()
    {
        $this->template->content = View::factory('forum/index')->set('categories', ORM::factory('forum_category'));
    }
}