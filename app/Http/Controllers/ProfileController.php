<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\Update;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('page.profile.index');
    }

    public function edit()
    {
        return view('page.profile.edit');
    }

    public function update(Update $request)
    {
        $user = Auth::user();

        if(isset($request->password)):
            if (Hash::check($request->old_password, $user->password)):
                $user->password = $request->password;
            else :
                return redirect()->back()->withErrors(['old_password'=> 'พาสเวิร์ดเก่าไม่ถูกต้อง']);
            endif;
        endif;

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->save();

        return redirect()->route('profile.index')->with('update', 'Success');
    }
}
