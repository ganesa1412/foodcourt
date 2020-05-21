<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('user-middleware');
    }

    public function index(){
    	$data['page'] = 'dashboard';
    	$data['page_child'] = '';
    	return view('admin_dashboard', $data);
    }

    public function master_stand(){
    	$data['page'] = 'master';
    	$data['page_child'] = 'stand';

        $data['stand'] = DB::table('tb_user')->where('level', 2)->get();

    	return view('admin_master_stand', $data);
    }

    public function master_cashier(){
    	$data['page'] = 'master';
    	$data['page_child'] = 'cashier';

        $data['cashier'] = DB::table('tb_user')->where('level', 3)->get();

    	return view('admin_master_cashier', $data);
    }

    public function master_table(){
    	$data['page'] = 'master';
    	$data['page_child'] = 'table';

        $data['table'] = DB::table('tb_table')->get();

    	return view('admin_master_table', $data);
    }
}
