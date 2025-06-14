<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CMS extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'c_m_s';

    protected $fillable = [
        'section',
        'title',
        'sub_title',
        'image',
        'card_title_1',
        'card_title_2',
        'card_title_3',
        'card_title_4',
        'card_subtitle_1',
        'card_subtitle_2',
        'card_subtitle_3',
        'card_subtitle_4',
        'description',
        'question',
        'answer',
        'gmail',
        'phone',
        'address'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
