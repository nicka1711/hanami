<?php

class Versioned_Model extends Model {

    private $class;
    private $table;
    private $fields = array();
    // will use the primary key of the main table
    private $table_index;
    // The index of the versioned table
    private $versioned_table_index;
    
    
    // the content id (primary key)
    public $id;
    // sets up the versioned table foreign key  (this can of course be changed)
    // the model uses this to link the tables
    public $versioned_table_key = "tag_id";
    
    
    public function __construct()
    {
        parent::__construct();
        
        // load the database
        $this->db = Database::instance();
        
        // From the ORM example, this works out the table name from the model name
        empty($this->class) and $this->class = strtolower(substr(get_class($this), 0, -6));
		empty($this->table) and $this->table = inflector::plural($this->class);

        // load the table stuff up
        $this->_load();
        
    }
    
   
    // does some preloading etc.
    private function _load()
    {

        // good, got the tables now to preload some info
        if(($versioned_fields = $this->db->field_data($this->table.'_versioned')) && ($fields = $this->db->field_data($this->table)))
        {
            // load the table fields
            foreach($fields as $field)
            {
                $this->fields[$field->Field] = array("isversioned"=>0);
                if($field->Key == "PRI")
                {
                    $this->table_index = $field->Field;
                }
            }
            
            // load the versioned fields
            foreach($versioned_fields as $field)
            {
                if(empty($this->fields[$field->Field]))
                {
                    $this->fields[$field->Field] = array("isversioned"=>1);
                } else {
                    $this->fields[$field->Field]["isversioned"] = 1;
                }
                if($field->Key == "PRI")
                {
                    $this->versioned_table_index = $field->Field;
                }
            }
        } else {
            throw new Kohana_Exception('versioned_model.tables_not_found', $this->table);
        }   
        
    }
    
    public function get($where,$limit=false,$offset=false)
    {
        // get the data for $id with optional offset/limit
        // select table
        $this->db->from($this->table);
         
        // Join on the versioned table
        $this->db->join($this->table.'_versioned', $this->table.'.'.$this->table_index.' = '.$this->table.'_versioned.'.$this->versioned_table_key);
        
        // this allows you to pass an array to select via other fields
        if (is_array($where))
        {
            // fix the ambiguity...
            foreach($where as $key=>$val)
            {
                if(strpos($key,".") < 1)
                {
                    $a_where[$this->table.'.'.$key] = $val;
                } else {
                    $a_where[$key] = $val;
                }
            }
            $this->db->where($where);
        } else {
        // otherwise it selects by the primary Key
            $this->db->where($this->table.'.'.$this->table_index,$where);
        }
        
        if ($limit)
        {
            $this->db->limit($limit);
        }
        if ($offset)
        {
            $this->db->offset($offset);
        }
        
        // run it
        $result = $this->db->get();
        
        // return the result if we have data - or false if none exists
        return ($result->count() > 0) ? $result : false;
    }
    
    // selects the latest revision only
    public function latest($where)
    {
        return $this->get($where,1);
    }
    
    public function add_revision($where,$data)
    {
        if(!$this->latest($where))
        {
            // ! no entry... 
            // so lets add one I guess
            // run through all the fields
            foreach($this->fields as $field)
            {
            
            }
        }
    }
    
    // to do: will create the necessary versioned table
    public function create($fields,$versioned_fields)
    {
    
    }


}