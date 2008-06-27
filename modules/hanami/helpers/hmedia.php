<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Hanamis Media helper class.
 *
 *
 * @package    Hanami
 * @author     Errant
 * @copyright  (c) 2008 Hanami Team
 * @license    BSD
 */
class hmedia_Core {

	// Checkable paths
	protected static $paths = array('all'=>array(), 'img'=>array(), 'css'=>array(), 'js'=>array(), 'php'=>array());

    // cached paths
    protected static $cached_paths = array();
    
	// stores the subdirectories the file types will be stored in
	protected static $type_subdir = array('all'=>'','img'=>'images','css'=>'css','js'=>'js','php'=>'inc',);

    private static function realpath($path)
    {
        return (($rp = realpath($path))) ? $rp : realpath(DOCROOT.$path);
    }
	/**
	 * Adds a path to the directories to parse
	 *
	 * @param  $path the path to add (relative to DOCROOT or exact path)
	 * @param  $type [optional] sets the type of file stored in this path (wiklll be searched ONLY for that file type)
	 * @return  string
	 */
	public static function add_path($path,$type="all")
	{
        // unify the path using realpath. If that fails then prepend the DOCROOT and try again
		$path = self::realpath($path);
        
        // check we have a path
        if(!$path)
        {
            // Damn! throw and informative error
            throw new Kohana_Exception("hmedia.path_does_not_exist",$path);
        }
        
        // quick error check that we have a corret type beign passed
        if(!array_key_exists($type,self::$paths))
        {
            // Damn! (again)
            throw new Kohana_Exception("hmedia.unhandled_filetype",$type);
        }
        
        // if we got to here it means we have an actual path on the system!
        // so add it if it is not already in there
        if(!in_array($path,self::$paths[$type]))
        {
            self::$paths[$type][] = $path;
        }
        
        // return wether the path is now in there (bit pointless but it makes it clean)
        return in_array($path,self::$paths[$type]);
        
	}
    
    public static function is_path($path,$type="all")
    {
        // unify the path
        $path = self::realpath($path);
        
        // check we have a path
        if(!$path)
        {
            // Damn! throw and informative error
            throw new Kohana_Exception("hmedia.path_does_not_exist",$path);
        }
        
        // quick error check that we have a corret type being passed
        if(!array_key_exists($type,self::$paths))
        {
            // Damn! (again)
            throw new Kohana_Exception("hmedia.unhandled_filetype",$type);
        }
        
        // test it's location
        return in_array($path,self::$paths[$type]);
        
    }


} // End request