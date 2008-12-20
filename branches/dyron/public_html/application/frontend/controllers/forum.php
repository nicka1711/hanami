<?php

class Forum_Controller extends Frontend_Controller {
	
	function __construct()
	{
		parent::__construct();

		$this->page->title[] = Kohana::lang('forum.forum');
	}

    public function index()
    {
        $this->template->content = View::factory('forum/index')->set('categories', ORM::factory('forum_category'));
    }
}