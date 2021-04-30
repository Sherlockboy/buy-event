<?php

namespace App\Services;

use ClickSend\Api\SMSApi as SMSApi;
use ClickSend\Configuration as Configuration;
use ClickSend\Model\SmsMessage;
use ClickSend\Model\SmsMessageCollection;
use Exception;
use GuzzleHttp\Client as Client;
use Illuminate\Support\Facades\Log;

class SmsService
{
    private const USERNAME = "kabilovhurshid5@gmail.com";
    private const API_KEY = "43935549-15E6-D22D-6454-B97C65D3CE09";

    private $api;

    public function __construct()
    {
        $this->api = new SMSApi(
            new Client(),
            Configuration::getDefaultConfiguration()
                ->setUsername(env('USERNAME', self::USERNAME))
                ->setPassword(env('CLICK_SEND_API_KEY', self::API_KEY))
        );
    }

    protected function prepareSMS($body, $to)
    {
        $msg = new SmsMessage();
        $msg->setBody($body)
            ->setTo($to)
            ->setSource("sdk");

        $sms_messages = new SmsMessageCollection(); 
        $sms_messages->setMessages([$msg]);

        return $sms_messages;
    }

    protected function prepareSMSCollection($messages)
    {
        $sms_messages = new SmsMessageCollection();
        $template = new SmsMessage();
        foreach ($messages as $message) {
            $template->setBody($message['body'])
                ->setTo($message['to'])
                ->setSource("sdk");
            $sms_messages->setMessages([$template]);
        }

        return $sms_messages;
    }

    public function sendSMS($body, $to) : int
    {
        try {
            $result = $this->api->smsSendPost(
                $this->prepareSMS($body, $to)
            );
            
            Log::info($result);
            
        } catch (Exception $e) {
            Log::alert("Exception while sending sms. " . $e->getMessage());
            
            return 500;
        }

        return 200;
    }
    
    public function sendSMSCollection($messages)
    {
        try {
            $result = $this->api->smsSendPost(
                $this->prepareSMSCollection($messages)
            );
            
            Log::info($result);
            
        } catch (Exception $e) {
            Log::alert("Exception while sending sms. " . $e->getMessage());
            
            return 500;
        }

        return 200;
    }
}