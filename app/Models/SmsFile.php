<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SmsFile extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'number',
        'message',
        'sender_id',
        'status',
        'block',
        'age'
    ];

    protected $casts = [
        'number' => 'array',
    ];
}
