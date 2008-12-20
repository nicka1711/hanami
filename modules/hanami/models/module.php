<?php 

define('ALL', -1);

class Module_Model extends Model {

	static public function factory($id = FALSE)
	{
		return new Module_Model($id);
	}

	public function __construct($id = FALSE)
	{
		parent::__construct($id);
	}

    public function find($id = ALL)
    {
        
        return $this->db->query("SELECT `name` FROM `modules`");
    }

} // End Model_Module