<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherTopic extends Model
{
    use HasFactory,SoftDeletes;

    public function topicDetail()
    {
        return $this->belongsTo('App\Models\Topic', 'topicId', 'id');
    }
}
