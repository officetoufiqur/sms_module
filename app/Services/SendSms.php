<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SendSms
{
    protected $baseUrl;
    protected $senderId;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('sms.base_url'); 
        $this->apiKey  = config('sms.api_key');
        $this->senderId  = config('sms.sender_id');
    }

    public function messageSend($to, $message)
    {
        $response = Http::asForm()->post($this->baseUrl, [
            'ApiKey'  => $this->apiKey,
            'SenderID' => $this->senderId,
            'number'   => $to,
            'sms'  => $message,
        ]);

        return $response->json(); 
    }
}
