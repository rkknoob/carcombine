<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Detail;
use App\Models\CarModel;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('page.car.index')->with(['items' => $cars]);
    }

    public function show(Car $car)
    {
        return view('page.car.show')->withCar($car);
    }

    // Api
    public function all($type = null)
    {
        $cars = $type ? Car::where('CarBrandName', $type)->get() : Car::all();
        return CarResource::collection($cars);
        // return response()->json(Car::all());
    }

    public function detail(Car $car)
    {
        return response()->json(['detail' => $car, 'images' => $car->details]);
    }

    public function search(Request $request)
    {
\Log::info($request->all());
        $query = Car::query();
        if ($request->brand != null && $request->brand != 'ทั้งหมด') {
            $query->where('CarBrandName', $request->brand);
        }
        if ($request->brand != null &&  $request->model != null && $request->brand != 'ทั้งหมด') {
            $query->where([['CarBrandName', $request->brand] ,['CarBrandGenName', $request->model]]);
        }
        if ($request->gear != null && $request->gear != 'ทั้งหมด') {
            switch ($request->gear) {
                case 'Auto'   :  $request->gear = "AT"; break;
                case 'Manual' :  $request->gear = "MT"; break;
                case 'Other'  :  $request->gear = "";   break;
            }
            $query->where('CarGearID', $request->gear);
        }
        if ($request->color != null) {
            $query->whereIn('CarColorName', $request->color);
        }
        if ($request->insurance != null && $request->insurance != 'ทั้งหมด') {
            $query->where('CarInsurance', $request->insurance);
        }
        if ($request->min_year != null) {
            $query->where('CarYear', '>=' ,$request->min_year);
        }
        if ($request->max_year != null) {
            $query->where('CarYear', '<=' ,$request->max_year);
        }
        if ($request->min_year != null && $request->max_year != null) {
            $query->whereBetween('CarYear', [$request->min_year, $request->max_year]);
        }
        if ($request->min_mile != null) {
            $query->where('CarMile', '>=' ,$request->min_mile);
        }
        if ($request->max_mile != null) {
            $query->where('CarMile', '<=' ,$request->max_mile);
        }
        if ($request->min_mile != null && $request->max_mile != null) {
            $query->whereBetween('CarMile', [$request->min_mile, $request->max_mile]);
        }

        if ($request->mile[0] != null || $request->mile[1] != null) {
            $query->whereBetween('CarMile', [$request->mile[0], $request->mile[1]]);
        }


        if ($request->year[0] != null) {
            $query->where('CarYear','>',$request->year[0]);
        }

        if ($request->year[1] != null) {
            $query->where('CarYear','<',$request->year[1]);
        }
        if ($request->price[1] != null) {
            $query->where('Price','<',$request->price[1]);
        }

        if ($request->monthly[0] != null || $request->monthly[1] != null) {
            $query->whereBetween('Monthly', [$request->monthly[0], $request->monthly[1]]);
        }


        if ($request->brand_selects != null) {
            $query->whereIn('CarBrandName', $request->brand_selects);
        }


        $cars = $query->get();

        if($cars->isEmpty()){
            $query = Car::query();
/*
            if ($request->gear != null && $request->gear != 'ทั้งหมด') {
                switch ($request->gear) {
                    case 'Auto'   :  $request->gear = "AT"; break;
                    case 'Manual' :  $request->gear = "MT"; break;
                    case 'Other'  :  $request->gear = "";   break;
                }
                $query->where('CarGearID', $request->gear);
            }
            if ($request->insurance != null && $request->insurance != 'ทั้งหมด') {
                $query->where('CarInsurance', $request->insurance);
            }

            if ($request->mile[0] != null && $request->mile[1] != null) {
                $query->where('CarMile','=>', 0);
            }

            if ($request->brand_selects != null) {
                foreach($request->brand_selects as $word){
                 $query->orWhere('CarBrandName', 'LIKE', '%'.$word.'%');
                }
            }
            if ($request->mile[0] != null || $request->mile[1] != null) {
                $query->whereNotIn('CarMile', [$request->mile[0], $request->mile[1]]);
            }

            if ($request->mile[0] != null || $request->mile[1] != null) {
                $query->whereNotIn('CarMile', [$request->mile[0], $request->mile[1]]);
            }
*/
            if ($request->price[1] != null) {
                $query->where('Price','<>',$request->price[1]);
            }

            $cars = $query->take(3)->get();
           // $cars->put('status', 'D');

            return CarResource::collection($cars);

         //   return response()->json($cars);
        }

        return CarResource::collection($cars);
    }

    public function random()
    {
        return CarResource::collection(Car::inRandomOrder()->take(8)->get());
    }
}
