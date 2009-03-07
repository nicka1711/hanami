<?php

interface Frontend_Blog_Controller {
	public function index();
	
	public function articles();
	
	public function article($id = NULL);
}