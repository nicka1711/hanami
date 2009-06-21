<?php

class Theme_Model extends Model {
	const ALL = -1;

	static public function factory($id = FALSE)
	{
		return new Theme_Model($id);
	}

	public function __construct($id = FALSE)
	{
		parent::__construct($id);
	}

    public function find($id = ALL)
    {
        
        return $this->db->query("SELECT `name` FROM `themes`");
    }

} // End Theme_Module