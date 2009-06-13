<?php

class Controller_Forum_index extends Controller_Frontend {
    /**
     * Display all forum topics
     */
    public function index()
    {
        $this->template->content = View::factory('forum/index')->set('categories', ORM::factory('forum_category'));
    }
}
