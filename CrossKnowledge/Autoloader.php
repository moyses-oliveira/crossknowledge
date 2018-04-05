<?php

namespace CrossKnowledge;

/**
 * Description of Autoloader
 *
 * @author moyses-oliveira
 */
final class Autoloader {
    
    /**
     *
     * @var array 
     */
    private $records = [];
    
    /**
     * root path of application
     * 
     * @var string 
     */
    private $root = null;
    
    public function __construct($root){
        $this->root = realpath($this->normalizePath($root, true));
        spl_autoload_register([$this, 'load']);
    }
    
    /**
     * 
     * @param string $namespace
     * @param string $path
     * @param string $extension
     */
    public function add($namespace, $path, $extension){
        $this->records[$namespace] = [$path, $extension];
    }
    
    public function remove($namespace) {
        unset($this->records[$namespace]);
    }
    
    public function load($class){
        $stack = explode('\\', ltrim($class, '\\'));
        $namespace = $stack[0];
        $namespaces = array_keys($this->records);
        if(!in_array($namespace, $namespaces))
            return;
        
        list($rawPath, $extension) = $this->records[$namespace];
        
        $stack[0] = $this->normalizePath($rawPath);
        array_unshift($stack, $this->root);        
        $file = implode(DIRECTORY_SEPARATOR, $stack) . $extension;
        if(!file_exists($file))
            throw (new \Exception(sprintf('Class "%s" can\'t be found!', $class )));
            
        require $file;
    }
    
    public function register($file){
        $filename = implode(DIRECTORY_SEPARATOR, [$this->root, $this->normalizePath($file)]);
        if(!file_exists($filename))
            throw (new \Exception(sprintf('File "%s" can\'t be found!', $filename))); 
        
        require_once $filename;
    }
    
    private function normalizePath($path, $rtrim = false){
        $fix = str_replace(['/','\\'], DIRECTORY_SEPARATOR, $path);
        if(!$rtrim)
            return trim($fix, DIRECTORY_SEPARATOR);
        
        return rtrim($fix, DIRECTORY_SEPARATOR);
    }
}
