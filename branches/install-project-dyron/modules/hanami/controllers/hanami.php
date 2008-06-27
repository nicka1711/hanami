<?php defined('SYSPATH') or die('No direct script access.');

class Hanami_Controller extends Frontend_Controller {

	/**
	 * Template loading and setup routine.
	 */
	public function __construct($config = NULL)
	{
		parent::__construct();

		$this->page_title[] = Kohana::lang('hanami.hanami');
	}

} // End Hanami_Controller
