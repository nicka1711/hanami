<?php defined('SYSPATH') or die('No direct script access.');

/*
 *
 */
class html extends html_Core 
{

	/*
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