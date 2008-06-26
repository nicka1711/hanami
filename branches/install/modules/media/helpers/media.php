<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Media helper class.
 *
 * $Id: media.php 2689 2008-05-23 22:20:31Z gregmac $
 *
 * @package	   Media Module
 * @author	   Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license	   http://kohanaphp.com/license.html
 */
class media_Core {

	/**
	 * Creates a stylesheet link.
	 *
	 * @param   string|array  filename, or array of filenames (do not include path)
	 * @param   string        media type of stylesheet
	 * @param   boolean       include the index_page in the link
	 * @return  string
	 */
	public static function stylesheet($style, $media = FALSE, $index = TRUE)
	{
		$separator = Config::item('media.separator') or $separator = ',';

		if (is_array($style))
		{
			$style = implode($separator, $style);
		}

		return html::stylesheet('media/css/'.$style, $media, $index);
	}

	public static function script($script, $index = TRUE)
	{
		$separator = Config::item('media.separator') or $separator = ',';

		if (is_array($script))
		{
			$script = implode($separator, $script);
		}

		return html::script('media/js/'.$script, $index);
	}

} // End media
