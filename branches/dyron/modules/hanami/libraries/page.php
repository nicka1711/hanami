<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Basic Page Class
 */
class Page {

	public $config;

	public $lang;

	public $id = 'page';
	public $title = array();

/*	protected $page_id = 'page';
	protected $page_title = array();*/
	protected $title_seperator = '-';

	public $style = array();

	public $xhtml = false;

	public function __construct()
	{
		$this->xhtml = request::accepts('xhtml', true);

		$lang = Kohana::config('locale.language');
		$this->lang = substr($lang[0], 0, 2);



		$this->style[] = html::stylesheet('styles/screen', 'screen');
	}

	public function config()
	{
		$this->config = array('title' => 'TEST');
	}




	/**
	 * 
	 */
	public function style()
		{
			return implode("\n    ", $this->style);
		}

	/**
	 *
	 */
	public function title($title = NULL, $seperator = '')
	{
		if(!empty($title))
		{
			$this->title[] = $title;
		}

		if(empty($seperator))
		{
			$seperator = $this->title_seperator;
		}

		return implode(' '.$seperator.' ', array_reverse($this->title));
	}
} // End Page

//class Page_Style