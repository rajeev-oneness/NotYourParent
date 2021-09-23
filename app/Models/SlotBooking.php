<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlotBooking extends Model
{
    use HasFactory,SoftDeletes;

    public function slotDetails()
    {
        return $this->belongsTo('App\Models\Slot', 'slotId', 'id');
    }

    public function userDetails()
    {
        return $this->belongsTo('App\Models\User', 'userId', 'id');
    }
}
