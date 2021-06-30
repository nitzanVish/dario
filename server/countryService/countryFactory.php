<?php

require_once $pathLevel.'countryService/countryModel.php';
require_once $pathLevel.'countryService/countryService.php';

// Create a new instance of CountryService and return it, model and text will be injected
class CountryFactory
{
    public static function create($connection)
    {
        $gateway = new CountryModel($connection);
        $pathLevel = '../../';
        $oErrorText = json_decode(file_get_contents($pathLevel.'text/error.json'));
        return new CountryService($gateway, $oErrorText);
    }
}
