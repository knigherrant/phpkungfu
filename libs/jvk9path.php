<?php

class JVk9Buffer implements ArrayAccess{
    protected $_name = null;
    function __construct() {
       $this->_name = strtolower(str_replace('JVk9','', get_class($this)));
    }
    function getName(){
        return $this->_name;
    }
    public function offsetExists ($offset){ }
    public function offsetGet ($offset){  }
    public function offsetSet ($offset, $value){  }
    public function offsetUnset ($offset){  }
}

class JVk9Path extends JVk9Buffer{
    
    static $paths = null;
   
    public static function addpath($newpath = array(), $type = 'jvk9libs'){
        if(!isset(self::$paths[$type]))  self::$paths[$type] = array();
        $paths = & self::$paths [$type];
        settype($newpath, 'array');
        foreach ($newpath as $path){
            if(!in_array($path, $paths) && $path){
                array_unshift($paths, trim ($path ) );
            }
        }
        return $paths;
    }

    public function findPath($file, $type = 'jvk9libs') {
        if(strpos($file, '::')) list($type , $file) = explode('::', $file);
        if(!isset(self::$paths[$type])) self::$paths [$type] = array ();
        $paths = & self::$paths[$type];
        return self::find($paths,$file);
    }
    
    public static function find($paths,$file){
        if(!is_array($paths) || !($paths instanceof Iterator)) settype ($paths, 'array');
        foreach ($paths as $path){
            $fullname = $path . '/' . $file;
            if (strpos($path, '://') === false) {
                $path = realpath($path);
                $fullname = realpath($fullname);
            }
            if (file_exists($fullname) && substr($fullname, 0, strlen($path)) == $path)  return $fullname;
        }
        return false;
    }
}

?>