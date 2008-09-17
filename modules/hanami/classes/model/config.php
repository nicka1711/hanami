<?php defined('SYSPATH') or die('No direct script access.');

class Config_Model extends Model {
	public function get()
		{
			$sql = "SELECT
    keywords
FROM
    config";
		}
}