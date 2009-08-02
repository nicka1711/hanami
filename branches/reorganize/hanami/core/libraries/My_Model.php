<?php

class Model extends Model_Core {

	const ALL = -1;

	public static function factory($model, $id = NULL)
	{
		// Set class name
		$model = ucfirst($model).'_Model';

		return new $model($id);
	}
}