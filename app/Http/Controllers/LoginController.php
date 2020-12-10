<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

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
               $adminResult = DB::table('admin')->where('id_admin', $a->id_admin)->get();
               Session::push('adminResultLogin', $adminResult);
               return view('adminsuccessLogin');
            }else{
               return redirect('/admin/login');
            }
         }
      
   }

   public function LogoutAdmin(){
      Session::forget('adminResultLogin');
      return redirect('/admin/login');
   }
}
