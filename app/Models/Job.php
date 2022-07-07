<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public function jobcat()
    {
        return $this->belongsTo(JobCategory::class, 'cat_id', 'id');
    }
}
