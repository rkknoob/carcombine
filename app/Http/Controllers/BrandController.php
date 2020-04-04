<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    // Backend System
    public function index()
    {
        return view('page.brand.index')
        ->withItems(Brand::orderBy('sequence')->get())
        ->withMax(Brand::max('sequence'))
        ->withMin(Brand::min('sequence'));
    }

    // API Response
    public function all()
    {
        // return response()->json(Brand::all());
        return BrandResource::collection(Brand::orderBy('sequence')->get());
    }

    public function select()
    {
        return response()->json(Car::DistinctBrand());
    }

    public function model($model)
    {
        return response()->json(Car::DistinctModel($model));
    }

    public function year($model)
    {
        return response()->json(Car::DistinctYear($model));
    }

    public function gear($model)
    {
        return response()->json(Car::DistinctGear($model));
    }
}
