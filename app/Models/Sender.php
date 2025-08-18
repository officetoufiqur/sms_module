<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    protected $table = 'senders';

    protected $fillable = [
        'user_id',
        'sender_id',
        'type',
        'status',
    ];
}
