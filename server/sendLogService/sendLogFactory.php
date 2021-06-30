<?php

require_once $pathLevel.'sendLogService/sendLogModel.php';
require_once $pathLevel.'sendLogService/sendLogService.php';

// Create a new instance of SendLogService, model and text will be injected
class SendLogFactory
{
    public static function create($connection)
    {
        $gateway = new SendLogModel($connection);
        $pathLevel = '../../';
        $oErrorText = json_decode(file_get_contents($pathLevel.'text/error.json'));
        
        return new SendLogService($gateway, $oErrorText);
    }
}
