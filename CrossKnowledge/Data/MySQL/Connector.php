<?php

namespace CrossKnowledge\Data\MySQL;

use PDO;

class Connector {
    
    /**
     *
     * @var \PDO
     */
    private $pdo = null;
    
    /**
     * 
     * @param \CrossKnowledge\Data\MySQL\Config $config
     */
    public function __construct(Config $config) {
        $dns = sprintf('mysql:dbname=%s;host=%s;port=%s', $config->getDatabase(), $config->getHost(), $config->getPort());
        $this->pdo = new PDO($dns, $config->getUser(), $config->getPass(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    
    /**
     * 
     * @return \PDO
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }
}
