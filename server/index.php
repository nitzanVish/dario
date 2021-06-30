<?php

require_once $pathLevel.'headers.php';
require_once $pathLevel.'db/connection.php';

//Get config file
$configFile = dirname(__FILE__).'/config.ini';
$config = parse_ini_file($configFile);

//Define globals variables
$GLOBALS['dbHost'] = $config['db_host'];
$GLOBALS['dbUser'] = $config['db_user'];
$GLOBALS['dbPassword'] = $config['db_password'];
$GLOBALS['dbDatabase'] = $config['db_database'];

// DB connection
if (!isset($pdo)) {
    $pdo = new Connection();
}

