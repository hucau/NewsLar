<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use DateTime, Auth;

class UserController extends Controller
{
    public function getAdd(){
    	return view('admin.modules.user.add');
    }

    public function postAdd(AddUserRequest $request){
    	$user = new User;
    	$user->username = $request->txtUser;
    	$user->password = bcrypt($request->txtPass);
    	$user->level = $request->rdoLevel;
    	$user->created_at = new DateTime();
    	$user->save();
    	return redirect()->route('ListUser')->with(['error_msg' => 'result_msg', 'result_msg' => 'Added User Successfully']);
    }

    public function getList(){
    	$user = User::select('id','username','level')->get()->toArray();
    	return view('admin.modules.user.list',['user' => $user]);
    }

    public function getDel($id){
    	$user = User::find($id);
    	$current_login_id = Auth::user()->id;
    	if(($id == 1) || ($current_login_id != 1 && $user['level'] == 1)){
    		return redirect()->route('ListUser')->with(['error_msg' => 'error_msg', 'result_msg' => 'You can\'t delete this user ']);
    	}else{
    		$user->delete();
    		return redirect()->route('ListUser')->with(['error_msg' => 'result_msg', 'result_msg' => 'You already delete successfully!']);
    	}
    }

    public function getEdit($id){
    	$user = User::findOrFail($id)->toArray();
    	$current_login_id = Auth::user()->id;
    	if(($current_login_id != 1) && ($id == 1 || (($user['level'] == 1) && $current_login_id != $id))){
    		return redirect()->route('ListUser')->with(['error_msg' => 'error_msg', 'result_msg' => 'You can\'t edit this user ']);
    	}else{
	    	return view('admin.modules.user.edit',['user'=>$user]);
    	}
    }

    public function postEdit($id, EditUserRequest $request){
    	$user = User::findOrFail($id);
    	$current_login_id = Auth::user()->id;
    	if($request->txtPass){
    		$user->password = bcrypt($request->txtPass);
    	}
    	if($current_login_id != $id){
    		$user->level = $request->rdoLevel;
    	}
    	$user->updated_at = new DateTime();
    	$user->save();
    	return redirect()->route('ListUser')->with(['error_msg' => 'result_msg', 'result_msg' => 'You already edit this user!']);
    }
}
