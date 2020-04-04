<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Interested;
use App\Models\Wishlist;
use App\Models\Contact;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $car_count  = Car::GroupByBrandCount();
        foreach($car_count as $item):
            $car_max[] = $item->brand_count;
        endforeach;

        $brand      = Brand::count();
        $car        = Car::count();
        $interested = Interested::count();
        $contact    = Contact::count();

        $interested_new     = Interested::where('Status', 'New')->count();
        $interested_wait    = Interested::where('Status', 'Wait')->count();
        $interested_busy    = Interested::where('Status', 'Busy')->count();
        $interested_booking = Interested::where('Status', 'Booking')->count();

        $interested_count   = [
            'New'     => $interested_new,
            'Wait'    => $interested_wait,
            'Busy'    => $interested_busy,
            'Booking' => $interested_booking
        ];

        $interested_total = $interested_new + $interested_wait + $interested_busy + $interested_booking;

        $wishlist_new     = Wishlist::where('status', 'new')->count();
        $wishlist_wait    = Wishlist::where('status', 'wait')->count();
        $wishlist_busy    = Wishlist::where('status', 'busy')->count();
        $wishlist_booking = Wishlist::where('status', 'booking')->count();

        $wishlist_count   = [
            'New'     => $wishlist_new,
            'Wait'    => $wishlist_wait,
            'Busy'    => $wishlist_busy,
            'Booking' => $wishlist_booking
        ];

        $wishlist_total = $wishlist_new + $wishlist_wait + $wishlist_busy + $wishlist_booking;

        for ($i=1; $i <= 12; $i++) :
            $contact_month[] = Contact::whereMonth('created_at', $i)->whereYear('created_at', date('Y'))->count();
        endfor;

        return view('home')->with([
            'brand'      => $brand,
            'car'        => $car ,
            'interested' => $interested,
            'contact'    => $contact,
            'car_count'  => $car_count,
            'car_max'    => $car_max,
            'interested_count' => $interested_count,
            'interested_total' => $interested_total,
            'wishlist_count'   => $wishlist_count,
            'wishlist_total'   => $wishlist_total,
            'contact_month'    => $contact_month
        ]);
    }
}
