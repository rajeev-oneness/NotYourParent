<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title','description','image',
    ];

    public function author()
    {
        return $this->hasOne('App\Models\User', 'id', 'posted_by');
    }
    // public function tags (){
    //     return $this->belongsToMany(Tag::class);
    // }
}
