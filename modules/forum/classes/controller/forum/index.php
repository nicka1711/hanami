<?php

class Controller_Forum_index extends Controller_Frontend {
    
    public function index()
    {
        $this->template->content = View::factory('forum/index')->set('topics', ORM::factory('forum_topic'));
    }
}
