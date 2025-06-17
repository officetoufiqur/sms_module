<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'groups';

    protected $fillable = [
        'user_id',
        'group_name',
    ];
    public function contacts()
    {
        return $this->hasMany(GroupContact::class, 'group_id');
    }
}
