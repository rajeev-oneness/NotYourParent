<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knowledgebank extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category', 'title', 'subtitle', 'description', 'image'];

    public function expert_details()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
