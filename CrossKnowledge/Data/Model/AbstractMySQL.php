<?php

namespace CrossKnowledge\Data\Model;

use CrossKnowledge\Data\MySQL\Config;
use CrossKnowledge\Data\MySQL\Connector;
use PDO;

/**
 * Description of AbstractMySQL
 *
 * @author moyses-oliveira
 */
abstract class AbstractMySQL {
    
    /**
     *
     * @var Connector 
     */
    private $connector = null;
    /**
     *
     * @var PDO 
     */
    private $pdo = null;
    
    /**
     * 
     * @param string $connection
     * @throws \Exception
     */
    public function __construct(string $connection = 'default') {
        $json = implode(DIRECTORY_SEPARATOR,[ROOT_DIRECTORY, 'Settings', 'MySQL', $connection . '.json']);
        
        if(!file_exists($json))
            throw new \Exception();
        
        $db = json_decode(file_get_contents($json));
        $config = new Config($db->host, $db->port, $db->user, $db->pass, $db->database);
        $this->connector = new Connector($config);
        
    }
    
    /**
     * 
     * @return \PDO
     */
    protected function getPdo(): PDO {
        return $this->connector->getPdo();
    }
}
