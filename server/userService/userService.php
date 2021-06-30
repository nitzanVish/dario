<?php

require_once $pathLevel.'responseService/index.php';


class UserService
{

    public function __construct(UserModel $gateway, $oErrorText)
    {
        $this->gateway = $gateway;
        $this->errorText = $oErrorText;
    }
    //Handel get user's request
    public function get()
    {
        $data = $this->gateway->get();
        if ($data['status'] == 'success') {
            return ResponseService::success(['data' => $data['data']]);
        }
        
        return ResponseService::failed([
            'data' => $data['data'],
            'message' => $this->errorText->db
        ]);
    }
}
