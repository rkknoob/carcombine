<?php

namespace App\Http\Controllers;

use App\Models\Interested;
use Illuminate\Http\Request;
use App\Http\Requests\Interested\Create;
use Carbon\Carbon;

class InterestedController extends Controller
{
    public function index()
    {
        $interested = Interested::GetDesc();
        return view('page.interested.index')->with(['items' => $interested]);
    }

    // Api Store
    public function store(Request $request)
    {
        $check_tel = $this->check_exist('Phone', $request->tel, $request->id);

        if($check_tel):
            return response()->json(['errors' => ['tel' => 'เบอร์โทรนี้ได้ทำการจองเรียบร้อยแล้ว']], 409);
        else:
            $interested = new Interested;
            $interested->Id_car      = $request->id;
            $interested->CarEvaID    = $request->car_id;
            $interested->Name        = $request->name;
            $interested->Email       = $request->email;
            $interested->Phone       = $request->tel;
            $interested->Status      = 'New';
            $interested->Create_date = Carbon::parse(Carbon::now())->format('Y-m-d');
            $interested->save();
            return response()->json('success');
        endif;
    }

    public function check_exist($type, $value, $id_car)
    {
        if(Interested::where([ [$type, $value], ['Id_car', $id_car], ['Status', 'New'] ])->first()):
            return true;
        else:
            return false;
        endif;
    }
}
