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
    	return view('adminKelolaPngguna-insert');
    }

    
}
