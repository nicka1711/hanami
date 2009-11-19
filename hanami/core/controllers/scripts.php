<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Scripts controller
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
class Scripts_Controller extends Controller {

	/**
	 * Template loading and setup routine.
	 */
	/*public function __construct()
	{
		parent::__construct();
	}*/

	public function index($test)
	{
		header('Content-Type: text/javascript');

		echo View::factory('scripts/'.$test);
	}
} // End Controller_Frontend
