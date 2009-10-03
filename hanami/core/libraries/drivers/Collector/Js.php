<?php defined('SYSPATH') or die('No direct script access.');
/**
 * $Id$
 * 
 * @package   
 * @author    Hanami Team
 * @copyright 
 * @license   
 */
class Collector_Js_Driver extends Collector_Driver {

	public function _render($file) {
		return html::script('scripts/'.$file);
	}
}