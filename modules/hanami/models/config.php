<?php 

class Model_Config extends Model {
	public function get()
		{
			$sql = "SELECT
    keywords
FROM
    config";
		}
}