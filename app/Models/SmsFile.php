<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SmsFile extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'number',
        'message',
        'sender_id',
        'gender',
        'status',
        'block',
        'age'
    ];
}
