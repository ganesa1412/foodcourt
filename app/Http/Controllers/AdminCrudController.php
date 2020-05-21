<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class AdminCrudController extends Controller
{
    public function add_stand(Request $req){
        DB::table('tb_user')->insert([
            'name' => $req->name,
            'username' => $req->username,
            'password' => md5($req->password),
            'level' => 2
        ]);

    	return redirect('admin/stand');
    }
    public function add_cashier(Request $req){
        DB::table('tb_user')->insert([
            'name' => $req->name,
            'username' => $req->username,
            'password' => md5($req->password),
            'level' => 3
        ]);

    	return redirect('admin/cashier');
    }
    public function add_table(Request $req){
        DB::table('tb_table')->insert([
            'table_no' => $req->table_no,
            'floor' => $req->floor
        ]);

    	return redirect('admin/table');
    }

    public function get_stand_by_id($id){
        $result = DB::table('tb_user')->where('id_user', $id)->get();

        echo json_encode($result);
    }

    public function get_cashier_by_id($id){
        $result = DB::table('tb_user')->where('id_user', $id)->get();

        echo json_encode($result);
    }

    public function get_table_by_id($id){
        $result = DB::table('tb_table')->where('id_table', $id)->get();

        echo json_encode($result);
    }
    
 	
 	public function edit_stand(Request $req){
        DB::table('tb_user')->where('id_user',$req->id_user)->update([
            'name' => $req->name,
            'username' => $req->username
        ]);

    	return redirect('admin/stand');
    }
    public function edit_cashier(Request $req){
        DB::table('tb_user')->where('id_user',$req->id_user)->update([
            'name' => $req->name,
            'username' => $req->username
        ]);
    	return redirect('admin/cashier');
    }
    public function edit_table(Request $req){
        DB::table('tb_table')->where('id_table',$req->id_table)->update([
            'table_no' => $req->table_no,
            'floor' => $req->floor
        ]);
    	return redirect('admin/table');
    }

    public function delete($table, $id){
    	switch ($table) {
    		case 'stand':
                DB::table('tb_user')->where('id_user',$id)->delete();
    			return redirect('admin/stand');
    			break;
    		case 'cashier':
                DB::table('tb_user')->where('id_user',$id)->delete();
    			return redirect('admin/cashier');
    			break;
    		case 'table':
                DB::table('tb_table')->where('id_table',$id)->delete();
    			return redirect('admin/table');
    			break;
    	}
    }
}
