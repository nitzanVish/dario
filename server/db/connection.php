<?php

class Connection
{
    public $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new \PDO(
                'mysql:host='.$GLOBALS['dbHost'].';dbname='.$GLOBALS['dbDatabase'],
                $GLOBALS['dbUser'],
                $GLOBALS['dbPassword']
            );
        } catch (PDOException $e) {
            return ' connection error' . $e;
        }
    }
}
