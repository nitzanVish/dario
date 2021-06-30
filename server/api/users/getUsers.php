<?php
$pathLevel = '../../';

// Get user service
require_once $pathLevel.'userService/index.php';

// Get countries
echo $user->get($data);
