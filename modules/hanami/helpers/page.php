<?php 
/**
 * Page helper class
 * 
 * $Id$
 *
 * @package    Helpers
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license    
 */
class page_Core {

	/**
	 * Return a HTML 4.01 strict or XHTML 1.0 strict DOCTYPE
	 *
	 * @param  boolean accepts XHTML or not
	 * @return string
	 **/
	static public function doctype($accept_xhtml = false)
	{
		return View::factory('doctypes/'.($accept_xhtml ? 'xhtml' : 'html'));
	}

	/**
	 * Returns a string for <title></title> 
	 *
	 * @param  array  title strings
	 * @param  string sorting of strings
	 * @param  string string separator
	 * @return string
	 */
	static public function title($title, $direction = 'rtl', $separator = '-')
	{
		$title = ($direction === 'rtl') ? array_reverse($title) : $title;
		/*if(!empty($title))
		{
			$this->page_title[] = $title;
		}*/

		return implode(' '.$separator.' ', $title);
	}

} // End page