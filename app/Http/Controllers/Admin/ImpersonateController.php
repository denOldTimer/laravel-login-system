<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImpersonateController extends Controller
{
    /**
     *  @param integer user_id
     */
    public function index ($id){
        $user = User::where('id', $id)->first();
        if($user){
            session()->put('impersonate',$user->id);
        }
        return redirect('/home');

    }

    public function destroy (){
        session()->forget('impersonate');
        return redirect('/home');
    }
}
