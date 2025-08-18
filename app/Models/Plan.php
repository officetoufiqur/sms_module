<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'plan_name',
        'amount',
        'plan_feature',
    ];
    protected $casts = [
        'plan_feature' => 'array',
    ];
}
