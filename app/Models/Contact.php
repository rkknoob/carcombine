<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'tel', 'detail'
    ];

    // protected $guarded = [];

    public function scopeGetDesc($query)
    {
        return $query->orderBy('created_at', 'DESC')->get();
    }
}
