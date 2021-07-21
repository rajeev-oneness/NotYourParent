<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory,SoftDeletes;

    public function teacherDetail()
    {
        return $this->belongsTo('App\Models\User', 'teacherId', 'id');
    }
}
