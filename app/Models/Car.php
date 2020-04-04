<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Car extends Model
{
    protected $table       = 'tblcar';
    protected $guarded     = [];
    protected $primaryKey  = 'Id_car';
    protected $hidden      = ["created_at", "updated_at"];
    public $timestamps     = false;

    public function getRouteKeyName()
    {
        return 'CarEvaID';
    }

    public function details()
    {
        return $this->hasMany(Detail::class, 'CarEvaID', 'CarEvaID')->orderBy('cert_pic' , 'DESC');
    }

    public function scopeGroupByBrandCount($query)
    {
        return $query->select(DB::raw('count(*) as brand_count, CarBrandName'))->groupBy('CarBrandName')->orderBy('brand_count', 'DESC')->get();
    }

    public function scopeDistinctColor($query)
    {
        return $query->select('CarColorName')->distinct('CarColorName')->get();
    }

    public function scopeDistinctBrand($query)
    {
        return $query->select('CarBrandName as brand')->distinct('CarBrandName')->orderBy('CarBrandName')->get();
    }

    public function scopeDistinctModel($query, $model)
    {
        return $query->select('CarBrandGenName as model')->where('CarBrandName', $model)->distinct('CarBrandGenName')->get();
    }

    public function scopeDistinctYear($query, $model)
    {
        return $query->select('CarYear')->where('CarBrandGenName', $model)->orderBy('CarYear', 'DESC')->distinct('CarYear')->get();
    }

    public function scopeDistinctGear($query, $model)
    {
        return $query->select('CarGearID')->where('CarBrandGenName', $model)->orderBy('CarGearID')->distinct('CarGearID')->get();
    }
}
