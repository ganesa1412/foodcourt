<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function index(){
    	return view('login');
    }

    public function login_process(Request $req){
    	$where = array(
    		'username' => $req->username,
    		'password' => md5($req->password)
    	);

    	$userdata = DB::table('tb_user')->where($where)->first();
    	$count = DB::table('tb_user')->where($where)->count();

    	if ($count == 0) {
    		return redirect('login');
    	}else{
    		Session::put('id_user', $userdata->id_user);
    		Session::put('name', $userdata->name);
    		Session::put('username', $userdata->username);
    		Session::put('level', $userdata->level);

    		switch ($userdata->level) {
    			case 1:
    				return redirect('admin');
    				break;
    			case 2:
    				return redirect('stand');
    				break;
    			case 3:
    				return redirect('cashier');
    				break;
    		}
    	}
    }

    public function logout(){
    	Session::flush();
    	return redirect('login');
    }
}
