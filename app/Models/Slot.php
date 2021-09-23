<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use HasFactory,SoftDeletes;

    public function expertDetails()
    {
        return $this->belongsTo('App\Models\User', 'teacherId', 'id');
    }
}
