<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoursePurchase extends Model
{
    use HasFactory, SoftDeletes;

    public function courseDetails()
    {
        return $this->belongsTo('App\Models\Course', 'courseId', 'id');
    }

    public function userDetails()
    {
        return $this->belongsTo('App\Models\User', 'userId', 'id');
    }
}
