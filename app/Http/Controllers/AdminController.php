<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function readAdmin(){
    	$admin = DB::table('admin')->get();
    	return view('adminKelolaAdmin-read',['admin'=>$admin]);
    }

	public function insertAdmin(){
    	return view('adminKelolaAdmin-insert');
    }

    public function saveAdmin(Request $req){
    	DB::table('admin')->insert(
    		[
    		 'id_admin' => $req->id_admin,
    	     'nama_admin' => $req->nama_admin,
    	     'username_admin' => $req->username_admin,
    	     'password_admin' => $req->password_admin
    		]
    	);
    	return redirect('/admin/readAdmin');
    }

    public function deleteAdmin($id_admin){
   		DB::table('admin')->where('id_admin', $id_admin)->delete();
   		return redirect('/admin/readAdmin');
    }

     public function updateAdmin($id_admin){
    	$result = DB::table('admin')->where('id_admin', $id_admin)->get();
    	return view('adminKelolaAdmin-update', ['result'=>$result]);
    }	

    public function saveUpdateAdmin(Request $req){
    	DB::table('admin')->where('id_admin', $req->id_admin)->update(
    		[
    		 'id_admin' => $req->id_admin,
    	     'nama_admin' => $req->nama_admin,
    	     'username_admin' => $req->username_admin,
    	     'password_admin' => $req->password_admin	
    		]
    	);
    	return redirect('/admin/readAdmin');
    }
}
