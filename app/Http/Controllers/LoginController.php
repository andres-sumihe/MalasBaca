<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function checkLoginFunction(Request $req){
   		$pengguna = DB::table('pengguna')->get();
   		foreach ($pengguna as $p) {
   			if ($p->nim_pengguna == $req->nim && $p->password_pengguna == $req->password) {
   				return view('successLogin',['pengguna'=>$pengguna]);
   			}else{
   				return redirect('/');
   			}
   		}
   	
   }
   public function AdmincheckLoginFunction(Request $req){
         $admin = DB::table('admin')->get();
         foreach ($admin as $a) {
            if ($a->id_admin == $req->id && $a->password_admin == $req->password) {
               return view('adminsuccessLogin',['admin'=>$admin]);
            }else{
               return redirect('/admin/login');
            }
         }
      
   }
}
