<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;

    public function user_from()
    {
        return $this->belongsTo('App\Models\User', 'message_from', 'id');
    }

    public function user_to()
    {
        return $this->belongsTo('App\Models\User', 'message_to', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'conversation_id', 'id')->limit(50);
    }
}
