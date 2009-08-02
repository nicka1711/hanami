<?php 

class View extends View_Core {

	/**
	 * Sets the view filename.
	 *
	 * @chainable
	 * @param   string  view filename
	 * @param   string  view file type
	 * @return  object
	 */
	public function set_filename($name, $type = NULL)
	{
		if ( ! Kohana::config('themes.enabled'))
		{
			return parent::set_filename($name, $type);
		}
		$paths = array(
			//'themes/'.Themes::current(),
			'',
		);

		foreach($paths as $path)
		{
			$path .= 'views';

			// parent::set_filename($name, $type);
			if ($type == NULL)
			{
				// Load the filename and set the content type
				$this->kohana_filename = Kohana::find_file($path, $name, TRUE);
				$this->kohana_filetype = EXT;
			}
			else
			{
				// Check if the filetype is allowed by the configuration
				if ( ! in_array($type, Kohana::config('view.allowed_filetypes')))
					throw new Kohana_Exception('core.invalid_filetype', $type);
	
				// Load the filename and set the content type
				$this->kohana_filename = Kohana::find_file($path, $name, TRUE, $type);
				$this->kohana_filetype = Kohana::config('mimes.'.$type);
	
				if ($this->kohana_filetype == NULL)
				{
					// Use the specified type
					$this->kohana_filetype = $type;
				}
			}
		}

		return $this;
	}
}
?>
