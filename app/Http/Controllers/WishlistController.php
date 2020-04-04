<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Car;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::GetDesc();
        return view('page.wishlist.index')->with(['items' => $wishlist]);
    }

    public function car_search_wishlist(Request $request)
    {
        $cars = Car::where('CarBrandName', $request->brand)
            ->where('CarBrandGenName', $request->model)
            ->where('CarYear', $request->year)
            ->where('CarGearID', $request->gear)
            ->orderBy('CarEvaID')
            ->get();
        return response()->json($cars);
    }

    // API
    public function store(Request $request)
    {
        $wishlist = Wishlist::create($request->all());
        return response()->json(['status' => 'success', 'wishlist' => $wishlist]);
    }
}
