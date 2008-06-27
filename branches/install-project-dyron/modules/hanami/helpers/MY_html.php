<?php defined('SYSPATH') or die('No direct script access.');

/*
 *
 */
class html extends html_Core 
{

	/*
	 *
	 */
	public static function convert()
	{
		Kohana::$output = str_replace('/>', '>', Kohana::$output);
	}



	/**
	 * Generate a "breadcrumb" list of anchors representing the URI.
	 *
	 * @param   array   segments to use as breadcrumbs, defaults to using Router::$segments
	 * @return  string
	 */
	public static function breadcrumb($segments = NULL)
	{
		empty($segments) and $segments = Router::$segments;

		$array = array();
		while ($segment = array_pop($segments))
		{
			$array[] = html::anchor
			(
				// Complete URI for the URL
				implode('/', $segments).'/'.$segment,
				
				// Title for the current segment
				ucwords(inflector::humanize($segment))
				//Kohana::lang('common.'.(($segment == 'home') ? 'home_page' : (($segment == 'gallery') ? 'photo_gallery' : $segment)))
			);
		}

		// Retrun the array of all the segments
		return array_reverse($array);
	}
}