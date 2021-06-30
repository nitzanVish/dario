<?php

require_once $pathLevel.'responseService/index.php';
require_once $pathLevel.'validationService/index.php';

class SendLogService
{

    public function __construct(sendLogModel $gateway, $oErrorText)
    {
        $this->gateway = $gateway;
        $this->errorText = $oErrorText;
    }

    public function get($data)
    {
        //Check validation
        $validatedData = $this->checkValidation();
        
        if ($validatedData['status'] == 'success') {
            //Get filtered data
            $data =  $this->gateway->get($validatedData['data']);

            if ($data['status'] == 'success') {
                return ResponseService::success(['data' => $data['data']]);
            }
            
            return ResponseService::failed([
                'data' => $data['data'],
                'message' => $this->errorText->db
            ]);
        } else {
            return ResponseService::failed(['message'=>$validatedData['message']]);
        }
    }

    public function checkValidation()
    {
        $response = [
            'status' => '',
            'message' => ''
        ];
        // Check required Fields
        $fromDate = ValidationService::requiredValue($_GET['date_from']);
        $toDate = ValidationService::requiredValue($_GET['date_to']);

        if (empty($fromDate) || empty($toDate)) {
            $response['status'] = 'failed';
            $response['message'] = $this->errorText->required_fields;
            return $response;
        }

        // Check date format
        $fromDateFormat = ValidationService::validDate($_GET['date_from']);
        $toDateFormat = ValidationService::validDate($_GET['date_to']);

        if (empty($fromDateFormat) || empty($toDateFormat)) {
            $response['status'] = 'failed';
            $response['message'] = $this->errorText->invalid_date_format;
            return $response;
        }
        // Check if user id is num
        if (isset($_GET['usr_id']) && !empty($_GET['usr_id'])) {
            $usr_id = ValidationService::validNumber($_GET['usr_id']);
            if (empty($usr_id)) {
                $response['status'] = 'failed';
                $response['message'] = $this->errorText->invalid_usr_id;
                return $response;
            }
        }
        // Check if cnt_id is num
        if (isset($_GET['cnt_id']) && !empty($_GET['cnt_id'])) {
            $cnt_id = ValidationService::validNumber($_GET['cnt_id']);
            if (empty($cnt_id)) {
                $response['status'] = 'failed';
                $response['message'] = $this->errorText->invalid_cnt_id;
                return $response;
            }
        }
        $response['status'] = 'success';
        $response['data'] = [
            'date_from' => $fromDate,
            'date_to' => $toDate,
            'cnt_id'=> isset($cnt_id) ? $cnt_id : '',
            'usr_id'=> isset($usr_id) ? $usr_id : ''
        ];
        return $response;
    }
}
