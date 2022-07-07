<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'job_id'
    ];


    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function job() {
        return $this->belongsTo('App\Models\Job', 'job_id', 'id');
    }
}
