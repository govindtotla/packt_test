<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;

class CurlHelper
{    
    /**
     * callAPI
     *
     * @param  mixed $method
     * @param  mixed $url
     * @param  mixed $data
     * @return void
     */
    public static function callAPI($method, $url, $data)
    {
        $baseUrl = env('PACKT_API_BASE', 'https://api.packt.com/api/v1/');
        $url = $baseUrl . $url . '&token=ib7qYd8kqPnhNexnfJqIa1ZkzrO3d2JT4iKiUDww';

        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        try {
            $result = curl_exec($curl);
            curl_close($curl);
            return $result;
        } Catch(Exception $e) {
            Log::info($e->getMessage());
            return;
        }       
     }
}