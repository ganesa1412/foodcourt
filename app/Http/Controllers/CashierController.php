<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class CashierController extends Controller
{
    public function __construct(){
        $this->middleware('user-middleware');
    }

    public function index(){
    	$data['page'] = 'dashboard';
    	$data['page_child'] = '';

        $data['table'] = DB::select('SELECT tb_table.id_table, tb_table.table_no, tb_order.customer_name FROM tb_table, tb_order WHERE tb_table.id_table = tb_order.id_table AND tb_order.status < 3 GROUP BY tb_table.id_table, tb_table.table_no, tb_order.customer_name ORDER BY tb_table.id_table ASC');

    	return view('cashier_dashboard', $data);
    }

    public function get_order(){
        $table = DB::select('SELECT tb_table.id_table, tb_table.table_no, tb_order.customer_name FROM tb_table, tb_order WHERE tb_table.id_table = tb_order.id_table AND tb_order.status < 3 GROUP BY tb_table.id_table, tb_table.table_no, tb_order.customer_name ORDER BY tb_table.id_table ASC');

        $status = array(['warning', 'Menunggu Konfirmasi'], ['primary', 'Sedang Disiapkan'], ['success', 'Sudah Diantar'], ['danger', 'Pesanan Ditolak']);

        $result;
        $i = 0;
        foreach ($table as $t) {
            $result[$i]['id_table'] = $t->id_table;
            $result[$i]['customer_name'] = $t->customer_name;
            $result[$i]['table_no'] = $t->table_no;
            $i++;
        }

        echo json_encode($result);
    }

	public function order_detail($id_table, $customer_name){
    	$data['page'] = 'dashboard';
    	$data['id_table'] = $id_table;
        $data['table_no'] = DB::table('tb_table')->where('id_table', $id_table)->first()->table_no;
        $data['customer_name'] = $customer_name;

        $data['order'] = DB::select('SELECT tb_order.id_order, tb_user.name as stand, tb_order.datetime FROM tb_user, tb_order WHERE tb_user.id_user = tb_order.id_stand AND tb_order.customer_name = "'.$customer_name.'" AND tb_order.id_table = '.$id_table.' AND tb_order.status < 3 ORDER BY tb_user.name');

        foreach ($data['order'] as $o) {
            $data['menu'][$o->id_order] = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$o->id_order);
        }

    	return view('cashier_order_detail', $data);
    }

    public function print(Request $req){
        $data['id_table'] = $req->id_table;
        $data['table_no'] = DB::table('tb_table')->where('id_table', $req->id_table)->first()->table_no;
        $data['customer_name'] = $req->customer_name;

        $data['order'] = DB::select('SELECT tb_order.id_order, tb_user.name as stand, tb_order.datetime FROM tb_user, tb_order WHERE tb_user.id_user = tb_order.id_stand AND tb_order.customer_name = "'.$req->customer_name.'" AND tb_order.id_table = '.$req->id_table.' AND tb_order.status < 3 ORDER BY tb_user.name');

        foreach ($data['order'] as $o) {
            $data['menu'][$o->id_order] = DB::select("SELECT * FROM tb_order_item, tb_menu WHERE tb_order_item.id_menu = tb_menu.id_menu AND tb_order_item.id_order = ".$o->id_order);
            DB::table('tb_order')->where('id_order', $o->id_order)->update(
                ['status' => 4]
            );
        }

        $data['total'] = $req->total;
        $data['cash'] = $req->pembayaran;
        $data['charge'] = $req->pembayaran - $req->total;
        $data['date'] = date('d-m-Y');
        $data['time'] = date('H:i:s');

        return view('cashier_print', $data);
    }
}
