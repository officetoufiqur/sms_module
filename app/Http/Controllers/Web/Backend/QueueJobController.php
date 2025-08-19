<?php

namespace App\Http\Controllers\Web\Backend;

use App\Jobs\SendMessageJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SmsFile;

class QueueJobController extends Controller
{
    public function runQueueJob()
    {
        
        $number = '+1234567890';
        $message = 'Test message';
        $senderId = 'SENDER';
        $segments = 1;
        $cost = 0.05;

        $senderId = SmsFile::where('status', 'pending')->first();

        dispatch(new SendMessageJob($number, $message, $senderId, $segments, $cost));
    }
}
