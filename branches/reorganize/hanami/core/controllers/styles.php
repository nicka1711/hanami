<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Styles controller
 * 
 * $Id$
 *
 * @package    Hanami
 * @author     Hanami Team
 * @copyright  (c) 2008-2009 Hanami Team
 * @license    
 */
class Styles_Controller extends Controller {

	/**
	 * Template loading and setup routine.
	 */
	/*public function __construct()
	{
		parent::__construct();
	}*/

	public function index($media)
	{
		header('Content-Type: text/css');
echo '/* ', $media, ' */';
		echo View::factory('styles/'.$media);
	}

} // End Controller_Frontend
