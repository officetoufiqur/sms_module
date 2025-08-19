<?php

namespace App\Jobs;

use App\Models\SmsFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Services\SendSms;

class SendMessageJob implements ShouldQueue
{
    use Queueable;

    protected $number;
    protected $message;
    protected $senderId;
    protected $segments;
    protected $cost;

    public function __construct($number, $message, $senderId, $segments, $cost)
    {
        $this->number   = $number;
        $this->message  = $message;
        $this->senderId = $senderId;
        $this->segments = $segments;
        $this->cost     = $cost;
    }

    public function handle()
    {
        $sms = new SendSms();
        $result = $sms->messageSend($this->number, $this->message);

        SmsFile::where('number', $this->number)
            ->where('sender_id', $this->senderId)
            ->update([
                'status' => $result ? 'delivered' : 'failed',
            ]);
    }
}
