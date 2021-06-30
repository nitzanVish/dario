<?php

//This file includes DB Connection + cross origin
require_once $pathLevel.'index.php';

require_once $pathLevel.'userService/userFactory.php';

$user = UserFactory::create($pdo->connection);
