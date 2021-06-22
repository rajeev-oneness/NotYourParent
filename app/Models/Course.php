<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory,SoftDeletes;

    public function teacherDetail()
    {
        return $this->belongsTo('App\Models\User', 'teacherId', 'id');
    }

    public function categoryDetail()
    {
        return $this->belongsTo('App\Models\Category', 'categoryId', 'id');
    }

}
