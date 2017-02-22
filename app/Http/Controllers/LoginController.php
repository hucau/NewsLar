<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Login;

use Illuminate\Support\Facades\Auth;

use App\User;

class LoginController extends Controller
{
    //
    public function getLogin(){
        if(!Auth::check()){
    	    return view('admin.modules.login.login');
        }else{
            return redirect('mt_admin');
        }
    }

    public function postLogin(Login $request){
    	$login = ['username'=>$request->txtUser, 'password'=>$request->txtPass, 'level'=>1];
    	if(Auth::attempt($login)){
    		return redirect('mt_admin');
    	}else{
    		return redirect()->back();
    	}
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('mt_login');
    }

}
