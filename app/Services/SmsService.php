<?php

namespace App\Services;

use GuzzleHttp\Client as Client;
use GuzzleHttp\Psr7\Request;

class SmsService
{
    private $username;
    private $api_key;
    private $url_endpoint;

    public function __construct()
    {
        $this->username = env('', 'kabilovhurshid5@gmail.com');
        $this->api_key = env('', '43935549-15E6-D22D-6454-B97C65D3CE09');
        $this->url_endpoint = env('', 'https://rest.clicksend.com/v3/sms/send');
    }

    protected function getBasicAuth()
    {
        return 'Basic ' . base64_encode($this->username . ':' . $this->api_key);
    }

    protected function getSMSHeader()
    {
        return [
            'Content-type' => 'application/json',
            'Authorization' => $this->getBasicAuth()
        ];
    }
    
    protected function getSMSBody($text, $to)
    {
        return json_encode([
            'messages' => [
                [
                    'source' => 'php',
                    'from' => 'sendmobile',
                    'body' => $text,
                    'to' => $to,
                    'custom_string' => 'This is a test!'
                ]
            ]
        ]);
    }

    public function send($text, $to)
    {
        $request = new Request(
            'POST',
            $this->url_endpoint,
            $this->getSMSHeader(),
            $this->getSMSBody($text, $to)
        );
        
        $response = (new Client)->send($request);

        return $response->getStatusCode();
    }
}