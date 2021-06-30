<?php

require_once $pathLevel.'responseService/index.php';


class CountryService
{

    public function __construct(CountryModel $gateway, $oErrorText)
    {
        $this->gateway = $gateway;
        $this->errorText = $oErrorText;
    }
    // Handel get countries request
    public function get()
    {
        $data = $this->gateway->get();
        //Return success response
        if ($data['status'] == 'success') {
            return ResponseService::success(['data' => $data['data']]);
        }
        //Return failed response
        return ResponseService::failed([
            'data' => $data['data'],
            'message' => $this->errorText->db
        ]);
    }
}
