<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupContact extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'group_contacts';
    protected $fillable = [
        'group_id',
        'name',
        'mobile',
        'email',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
