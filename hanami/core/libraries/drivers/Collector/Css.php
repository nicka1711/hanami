<?php defined('SYSPATH') or die('No direct script access.');
/**
 * $Id$
 * 
 * @package   
 * @author    Hanami Team
 * @copyright 
 * @license   
 */
class Collector_Css_Driver extends Collector_Driver {
	public function _render($file) {
		return html::stylesheet('styles/'.$file);
	}
}