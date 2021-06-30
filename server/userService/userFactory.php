<?php

require_once $pathLevel.'userService/userModel.php';
require_once $pathLevel.'userService/userService.php';

// Create a new instance of userService, model and text will be injected
class UserFactory
{
    public static function create($connection)
    {
        $gateway = new UserModel($connection);
        $pathLevel = '../../';
        $oErrorText = json_decode(file_get_contents($pathLevel.'text/error.json'));
        return new UserService($gateway, $oErrorText);
    }
}
