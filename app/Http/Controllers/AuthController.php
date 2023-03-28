<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLogInRequest;
use App\Http\Requests\SignInRequest;
use App\Models\Admin;
use App\Models\Users;

class AuthController extends Controller
{
    //

    public function LogMeIn(SignInRequest $request){
        $User = Users::where([
            'Email'=>$request->Email,
            'Password'=>$request->Password
        ])->first();

        session()->put([
            'Id'=>$User->id,
        ]);

        return redirect('/');
    }

    public function LogAsAdmin(AdminLogInRequest $request){
        $Admin = Admin::where([
            'Username'=>$request->Username,
            'Password'=> md5($request->Password),
        ])->first();
        session()->put([
            'AID'=>$Admin->id,
        ]);

        return redirect(route('dashboard.home'));
    }
}
