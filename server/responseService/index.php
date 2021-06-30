<?php
// Handle response
class ResponseService
{
    
    public static function success($aResponse)
    {
        $response['status'] = 'success';
        $response['data'] = $aResponse['data'];
        return json_encode($response);
    }

    public static function failed($aResponse)
    {
        $response['status'] = 'failed';
        $response['message'] = isset($aResponse['message']) ?$aResponse['message'] : null ;
        $response['data'] = isset($aResponse['data']) ? $aResponse['data'] : null ;
        return json_encode($response);
    }
}