<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
	public function __construct(){
        $this->middleware('cust-middleware', ['except' => ['login']]);
	}

    //
    public function index(){
    	$data['page'] = 'dashboard';

        $data['order'] = DB::select("SELECT * FROM tb_user, tb_order WHERE tb_user.id_user = tb_order.id_stand AND tb_order.customer_name = '".Session::get('customer_name')."' AND tb_order.id_table = ".Session::get('id_table')." AND tb_order.status > -1 AND tb_order.status < 4 ORDER BY id_order DESC");

        foreach ($data['order'] as $o) {
            $menu = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$o->id_order);
            $data['total'][$o->id_order] = 0;

            foreach ($menu as $m) {
                $data['total'][$o->id_order] += $m->price * $m->quantity;
            }
        }

        $data['status'] = array(['warning', 'Menunggu Konfirmasi'], ['primary', 'Sedang Disiapkan'], ['success', 'Sudah Diantar'], ['danger', 'Pesanan Ditolak']);

    	return view('customer_dashboard', $data);
    }

    public function get_order(){
        $order = DB::select("SELECT * FROM tb_user, tb_order WHERE tb_user.id_user = tb_order.id_stand AND tb_order.customer_name = '".Session::get('customer_name')."' AND tb_order.id_table = ".Session::get('id_table')." AND tb_order.status > -1 AND tb_order.status < 4 ORDER BY id_order DESC");

        $status = array(['warning', 'Menunggu Konfirmasi'], ['primary', 'Sedang Disiapkan'], ['success', 'Sudah Diantar'], ['danger', 'Pesanan Ditolak']);

        $result;
        $i = 0;
        foreach ($order as $o) {
            $result[$i]['id_order'] = $o->id_order;
            $result[$i]['name'] = $o->name;

            $menu = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$o->id_order);
            $result[$i]['total'] = 0;

            foreach ($menu as $m) {
                $result[$i]['total'] += $m->price * $m->quantity;
            }

            $result[$i]['st_color'] = $status[$o->status][0];
            $result[$i]['st_text'] = $status[$o->status][1];
            $i++;
        }

        echo json_encode($result);
    }

    public function login(){
        $data['table'] = DB::table('tb_table')->get();
    	return view('customer_login', $data);	
    }

    public function order_detail($id){
    	$data['page'] = 'dashboard';
    	$data['id'] = $id;

        $data['order'] = DB::select("SELECT * FROM tb_user, tb_order WHERE tb_user.id_user = tb_order.id_stand AND id_order = ".$id);
        $data['menu'] = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$id);

    	return view('customer_order_detail', $data);
    }

    public function select_stand(){
    	$data['page'] = 'neworder';

        $data['stand'] = DB::table('tb_user')->where('level', 2)->get();

    	return view('customer_add_order', $data);	
    }

    public function add_order(Request $req){
    	$data['id'] = $req->input('stand');
    	$data['page'] = 'neworder';

        if ($data['id'] == "") return redirect('neworder');
        $data['stand'] = DB::table('tb_user')->where('level', 2)->get();
        $data['category'] = DB::table('tb_menu_category')->where('id_stand', $data['id'])->get();
        $data['menu'] = DB::select("SELECT * FROM tb_menu, tb_menu_category WHERE tb_menu.id_menu_category = tb_menu_category.id_menu_category AND tb_menu_category.id_stand = ".$data['id']);

    	return view('customer_add_order', $data);	
    }


    public function checkout($id){
    	$data['page'] = 'neworder';
    	$data['id'] = $id;

        $data['menu'] = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$id);

    	return view('customer_checkout', $data);	
    }   
}
