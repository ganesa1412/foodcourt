<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class StandCrudController extends Controller
{
	 public function set_status(Request $req){
        DB::table('tb_order')->where('id_order',$req->id_order)->update([
            'status' => $req->status
        ]);

    	return redirect('stand');
    }

    public function add_category(Request $req){
        DB::table('tb_menu_category')->insert([
            'id_stand' => Session::get('id_user'),
            'category_name' => $req->category_name
        ]);

    	return redirect('stand/category');
    }
    public function add_menu(Request $req){
        $file = $req->file('img');
        $fileName = date('YmdHis').'_'.$file->getClientOriginalName();

        $target = 'assets/img/menu';
        $file->move($target,$fileName);

        DB::table('tb_menu')->insert([
            'menu_name' => $req->menu_name,
            'id_menu_category' => $req->id_menu_category,
            'price' => $req->price,
            'img' => $fileName
        ]);

    	return redirect('stand/menu');
    }
    
    public function get_category_by_id($id){
        $result = DB::table('tb_menu_category')->where('id_menu_category', $id)->get();

        echo json_encode($result);
    }
    public function get_menu_by_id($id){
        $result = DB::table('tb_menu')->where('id_menu', $id)->get();

        echo json_encode($result);
    }
    

 	public function edit_category(Request $req){
        DB::table('tb_menu_category')->where('id_menu_category',$req->id_menu_category)->update([
            'category_name' => $req->category_name
        ]);

    	return redirect('stand/category');
    }
    public function edit_menu(Request $req){
        if ($req->img != null) {
            $file = $req->file('img');
            $fileName = date('YmdHis').'_'.$file->getClientOriginalName();

            $target = 'assets/img/menu';
            $file->move($target,$fileName);
        }else{
            $fileName = $req->fileName;
            echo "old";
        }

        DB::table('tb_menu')->where('id_menu',$req->id_menu)->update([
            'menu_name' => $req->menu_name,
            'id_menu_category' => $req->id_menu_category,
            'price' => $req->price,
            'img' => $fileName
        ]);
        
    	return redirect('stand/menu');
    }
    

    public function delete($table, $id){
    	switch ($table) {
    		case 'category':
                DB::table('tb_menu_category')->where('id_menu_category',$id)->delete();
    			return redirect('stand/category');
    			break;
    		case 'menu':
                DB::table('tb_menu')->where('id_menu',$id)->delete();
    			return redirect('stand/menu');
    			break;
    	}
    }
}
