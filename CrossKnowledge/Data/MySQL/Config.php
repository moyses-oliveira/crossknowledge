<?php

namespace CrossKnowledge\Data\MySQL;

/**
 *
 * @author moyses-oliveira
 */
class Config {

    /**
     *
     * @var string
     */
    private $host = null;

    /**
     *
     * @var string
     */
    private $port = null;

    /**
     *
     * @var string
     */
    private $user = null;

    /**
     *
     * @var string
     */
    private $pass = null;

    /**
     *
     * @var string
     */
    private $database = null;

    /**
     * 
     * @param string $host
     * @param int $port
     * @param string $user
     * @param string $pass
     * @param string $database
     */
    public function __construct(string $host, int $port, string $user, string $pass, string $database) {
        $this->setHost($host);
        $this->setPort($port);
        $this->setUser($user);
        $this->setPass($pass);
        $this->setDatabase($database);
    }

    /**
     * 
     * @return string
     */
    public function getHost(): string {
        return $this->host;
    }

    /**
     * 
     * @return int
     */
    public function getPort(): int {
        return $this->port;
    }

    /**
     * 
     * @return string
     */
    public function getUser(): string {
        return $this->user;
    }

    /**
     * 
     * @return string
     */
    public function getPass(): string {
        return $this->pass;
    }

    /**
     * 
     * @return string
     */
    public function getDatabase(): string {
        return $this->database;
    }

    /**
     * 
     * @param string $host
     */
    public function setHost(string $host) {
        $this->host = $host;
    }

    /**
     * 
     * @param int $port
     */
    public function setPort(int $port) {
        $this->port = $port;
    }

    /**
     * 
     * @param string $user
     */
    public function setUser(string $user) {
        $this->user = $user;
    }

    /**
     * 
     * @param string $pass
     */
    public function setPass(string $pass) {
        $this->pass = $pass;
    }

    /**
     * 
     * @param string $database
     */
    public function setDatabase(string $database) {
        $this->database = $database;
    }

}
