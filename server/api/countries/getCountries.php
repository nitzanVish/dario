<?php
$pathLevel = '../../';

// Get country service
require_once $pathLevel.'countryService/index.php';

// Get countries
echo $country->get($data);
