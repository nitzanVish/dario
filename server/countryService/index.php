<?php

//This file includes DB Connection + cross origin
require_once $pathLevel.'index.php';

require_once $pathLevel.'countryService/countryFactory.php';

$country = CountryFactory::create($pdo->connection);
