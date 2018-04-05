<?php

require 'CrossKnowledge/Autoloader.php';

use CrossKnowledge\Data\MySQL\Config as MySQLConfig;

define('BASE_URL', '/');
define('ROOT_DIRECTORY', __DIR__);
define('VIEW_DIRECTORY', implode(DIRECTORY_SEPARATOR, [__DIR__, 'CrossKnowledge', 'App', 'View']));
define('SQL_DIRECTORY', implode(DIRECTORY_SEPARATOR, [__DIR__, 'CrossKnowledge', 'Data', 'SQL']));


(function() {
    
    $uri = trim(strtolower($_SERVER['REQUEST_URI']), '/');
    $parse = parse_url($uri);
    $parts = explode('/', $parse['path']);
    $GLOBALS['uriParts'] = $parts;
    
    $autoload = new \CrossKnowledge\Autoloader(__DIR__);
    $autoload->add('CrossKnowledge', 'CrossKnowledge', '.php');
    
    $controllerName = str_replace(' ', '', ucfirst(str_replace('-', ' ', strtolower(isset($parts[0]) && !!$parts[0] ? $parts[0] : 'registro'))));
    $methodName = str_replace(' ', '', ucfirst(str_replace('-', ' ', strtolower(isset($parts[1]) && !!$parts[1] ? $parts[1] : 'index'))));
    $methodName[0] = strtolower($methodName[0]);
    try { 
        $className = '\CrossKnowledge\App\Controller\\' . $controllerName;
        if(!class_exists($className))
            throw new Exception('Classe não encontrada');
        
        $load = new $className();
        if(!method_exists($load, $methodName))
            throw new Exception('Metodo não encontrado');
                
        call_user_func([$load, $methodName]);
    } catch(\Exception $error) {
        (new \CrossKnowledge\App\Controller\Error())->code404();
    }
    
})();
