<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class CustomerCrudController extends Controller
{
	public function set_customer(Request $req){
		$table = DB::table('tb_table')->where('id_table', $req->input('id_table'))->first();

        Session::put('customer_name', $req->input('customer_name'));
		Session::put('id_table', $req->input('id_table'));
        Session::put('table_no', $table->table_no);

		return redirect('/');
	}

    public function add_order(Request $req){
    	// NOTE : Status set jadi -1
        $id = DB::table('tb_order')->insertGetId([
            'id_stand' => $req->id_stand,
            'id_table' => Session::get('id_table'),
            'datetime' => date('Y-m-d H:i:s'),
            'customer_name' => Session::get('customer_name'),
            'status' => -1
        ]);

        $menu = DB::select("SELECT * FROM tb_menu, tb_menu_category WHERE tb_menu.id_menu_category = tb_menu_category.id_menu_category AND tb_menu_category.id_stand = ".$req->id_stand);

        foreach ($menu as $m) {
            if ($req->input('menu'.$m->id_menu) != 0) {
                DB::table('tb_order_item')->insert([
                    'id_order' => $id,
                    'id_menu' => $m->id_menu,
                    'quantity' => $req->input('menu'.$m->id_menu)
                ]);
            }
        }

    	return redirect('/neworder/checkout/'.$id);
    }

    public function confirm($id){
    	// NOTE : Status set jadi 1
    	DB::table('tb_order')->where('id_order', $id)->update([
            'status' => 0
        ]);
    	return redirect('/');
    }
}
