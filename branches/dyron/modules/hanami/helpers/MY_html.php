<?php 
/**
 * HTML helper class extension.
 *
 * $Id$
 *
 * @package    Hanami Core
 * @author     Hanami Team
 * @copyright  (c) 2008 Hanami Team
 * @license  
 */
class html extends html_Core {

	/**
	 * Converts XHTML to HTML
	 */
	public static function convert()
	{
		$output = Kohana::$output;
		$output = str_replace(array(' />', '/>'), '>', $output);
		
		$output = preg_replace('$\s([a-z]+)="\1"$', ' $1', $output);
		Kohana::$output = $output;
	}
} // End html