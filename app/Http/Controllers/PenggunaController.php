<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function readPengguna(){
    	$pengguna = DB::table('pengguna')->get();
    	return view('adminKelolaPengguna-read',['pengguna'=>$pengguna]);
    }

    public function insertPengguna(){
    	return view('adminKelolaPengguna-insert');
    }

    public function savePengguna(Request $req){
    	DB::table('pengguna')->insert(
    		[
    		 'nim_pengguna' => $req->nim_pengguna,
    	     'nama_pengguna' => $req->nama_pengguna,
    	     'email_pengguna' => $req->email_pengguna,
    	     'password_pengguna' => $req->password_pengguna,
    	     'phone_pengguna' => $req->phone_pengguna,
    	     'address_pengguna' => $req->address_pengguna
    		]
    	);
    	return redirect('/admin/readPengguna');
    }


   public function deletePengguna($nim_pengguna){
   		DB::table('pengguna')->where('nim_pengguna', $nim_pengguna)->delete();
   		return redirect('/admin/readPengguna');
    }

    public function updatePengguna($nim_pengguna){
    	$result = DB::table('pengguna')->where('nim_pengguna', $nim_pengguna)->get();
    	return view('adminKelolaPengguna-update', ['result'=>$result]);
    }	

    public function saveUpdatePengguna(Request $req){
    	DB::table('pengguna')->where('nim_pengguna', $req->nim_pengguna)->update(
    		[
    		 'nim_pengguna' => $req->nim_pengguna,
    	     'nama_pengguna' => $req->nama_pengguna,
    	     'email_pengguna' => $req->email_pengguna,
    	     'password_pengguna' => $req->password_pengguna,
    	     'phone_pengguna' => $req->phone_pengguna,
    	     'address_pengguna' => $req->address_pengguna	
    		]
    	);
    	return redirect('/admin/readPengguna');
    }

}
