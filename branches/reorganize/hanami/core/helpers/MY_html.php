<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * HTML helper extension.
 *
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
class html extends html_Core {

	/**
	 * Converts the XHTML output to HTML
	 */
	public static function convert()
	{
		/**
		 * @todo replace empty attributes
		 */
		Kohana::$output = str_replace('/>', '>', Kohana::$output);
	}
}