<?php
$pathLevel = '../../';

// Get log service
require_once $pathLevel.'sendLogService/index.php';

// Get Loges
echo $sendLog->get($data);
