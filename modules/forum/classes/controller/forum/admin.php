<?php

class Controller_Admin extends Controller_Backend {
    
    public function index()
    {
        $this->template->content = 'bar';
    }
}
