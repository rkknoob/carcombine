<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded  = [];

    public function scopeGetDesc($query)
    {
        return $query->orderBy('created_at', 'DESC')->get();
    }
}
