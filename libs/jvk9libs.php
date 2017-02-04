<?php 
class JVk9Loader{
    static $import = array();
    static function import($key, $path = null){
        
        if(empty(self::$import[$key])){
            $loaded = false;
            $path = (!empty($path))? $path : dirname(__FILE__) . DIRECTORY_SEPARATOR ;
            $key = str_replace('.', DIRECTORY_SEPARATOR, $key);
            $file = $path . $key . '.php'; 
            if(is_file($file)) $loaded = (bool) require_once ($file);
            self::$import[$key] = $loaded;
        }
    }
}
JVk9Loader::import('function');
JVk9Loader::import('jvk9path');

class JVk9Helper implements ArrayAccess{
    
    protected $_jvk9 = array();
    
    public function addHelper($lib){
        $name = $lib->getName();
        if(!$this->_jvk9[$name]) $this->_jvk9[$name] = $lib;
        return $this->_jvk9[$name];
    }
    function getHelper($name){
        if(!$this->_jvk9[$name]){
            $class = 'JVk9' . ucfirst ($name);
            if(!class_exists($class)){
                $path = $this['path']->findPath($name.'.php','jvk9libs');
                if(is_file($path)) require_once $path;
                else return false;
                $this->addHelper(new $class() );
            }
        }
        return $this->_jvk9 [$name];
    }
    public function offsetExists ($offset){
        return isset ( $this->_jvk9 [$offset] );
    }
    public function offsetGet ($offset){
        return $this->getHelper ( $offset );
    }
    public function offsetSet ($offset, $value){
        $this->_jvk9 [$offset] = $value;
    }
    public function offsetUnset ($offset){
        unset ( $this->_jvk9 [$offset] );
    }
}

class JVk9 extends JVk9Helper{
    
    protected static $instance = null;
    public static function getInstance(){
        if (is_null(self::$instance)) {
            self::$instance = new JVk9();
            self::$instance->addHelper(new JVk9Path());
            $path = dirname(__FILE__);
            self::$instance['path']->addpath($path,'root');
            self::$instance['path']->addpath($path.'/jvk9libs','jvk9libs');
            self::$instance['path']->addpath($path.'/css','css');
            self::$instance['path']->addpath($path.'/js','js');
        }
        return self::$instance;
    }

}


?>