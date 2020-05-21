<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class StandController extends Controller
{   
    public function __construct(){
        // entar diganti kalo udah login
        $this->middleware('user-middleware');
    }

    public function index(){
    	$data['page'] = 'dashboard';
    	$data['page_child'] = '';

        $data['order'] = DB::select("SELECT * FROM tb_order, tb_table WHERE tb_order.id_table = tb_table.id_table AND tb_order.status > -1 AND tb_order.status < 3 AND tb_order.id_stand = ".Session::get('id_user')." ORDER BY id_order DESC");

        foreach ($data['order'] as $o) {
            $menu = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$o->id_order);
            $data['total'][$o->id_order] = 0;

            foreach ($menu as $m) {
                $data['total'][$o->id_order] += $m->price * $m->quantity;
            }
        }

        $data['status'] = array(['warning', 'Menunggu Konfirmasi'], ['primary', 'Sedang Disiapkan'], ['success', 'Sudah Diantar'], ['danger', 'Pesanan Ditolak']);

    	return view('stand_dashboard', $data);
    }

    public function get_order(){
        $order = DB::select("SELECT * FROM tb_order, tb_table WHERE tb_order.id_table = tb_table.id_table AND tb_order.status > -1 AND tb_order.status < 3 AND tb_order.id_stand = ".Session::get('id_user')." ORDER BY id_order DESC");

        $status = array(['warning', 'Menunggu Konfirmasi'], ['primary', 'Sedang Disiapkan'], ['success', 'Sudah Diantar'], ['danger', 'Pesanan Ditolak']);

        $result;
        $i = 0;
        foreach ($order as $o) {
            $result[$i]['id_order'] = $o->id_order;
            $result[$i]['table_no'] = $o->table_no;

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

    public function order_detail($id){
        $data['page'] = 'dashboard';
        $data['page_child'] = '';
        $data['id'] = $id;

        $data['order'] = DB::select("SELECT * FROM tb_order, tb_table WHERE tb_table.id_table = tb_order.id_table AND id_order = ".$id);
        $data['menu'] = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$id);

        return view('stand_order_detail', $data);
    }

    public function menu_category(){
    	$data['page'] = 'menu';
    	$data['page_child'] = 'category';

        $data['category'] = DB::table('tb_menu_category')->where('id_stand', Session::get('id_user'))->get();

    	return view('stand_category', $data);
    }

    public function menu(){
    	$data['page'] = 'menu';
    	$data['page_child'] = 'menu';

        $data['category'] = DB::table('tb_menu_category')->where('id_stand', Session::get('id_user'))->get();
        $data['menu'] = DB::select("SELECT * FROM tb_menu, tb_menu_category WHERE tb_menu.id_menu_category = tb_menu_category.id_menu_category AND tb_menu_category.id_stand = ".Session::get('id_user'));

    	return view('stand_menu', $data);
    }
}
