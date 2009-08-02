<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * HTML helper extension.
 *
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team ($Author$)
 * @copyright  §copyright$
 * @license    $Licence$
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