<?php

//This file includes DB Connection + cross origin
require_once $pathLevel.'index.php';

require_once $pathLevel.'sendLogService/SendLogFactory.php';

$sendLog = SendLogFactory::create($pdo->connection);
