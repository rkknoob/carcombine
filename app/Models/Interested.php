<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    protected $table    = 'tblinterested';
    protected $guarded  = [];

    public function scopeGetDesc($query)
    {
        return $query->orderBy('created_at', 'DESC')->get();
    }

    public function cars()
    {
        return $this->belongsTo(Car::class, 'Id_car', 'Id_car');
    }
}
