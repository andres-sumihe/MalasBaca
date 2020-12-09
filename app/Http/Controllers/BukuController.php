<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function readBuku(){
    	$buku = DB::table('buku')->get();
    	return view('adminKelolaBuku-read',['buku'=>$buku]);
    }

    public function insertBuku(){
    	return view('adminKelolaBuku-insert');
    }

    public function saveBuku(Request $req){
    	DB::table('buku')->insert(
    		[
    		 'id_buku' => $req->id_buku,
    	     'nama_buku' => $req->nama_buku,
    	     'penulis_buku' => $req->penulis_buku,
    	     'penerbit_buku' => $req->penerbit_buku,
    	     'url_cover' => $req->url_cover,
    	     'tahun' => $req->tahun,
    		]
    	);
    	return redirect('/admin/readBuku');
    }

   	public function deleteBuku($id_buku){
   		DB::table('buku')->where('id_buku', $id_buku)->delete();
   		return redirect('/admin/readBuku');
    }

    public function updateBuku($id_buku){
    	$result = DB::table('buku')->where('id_buku', $id_buku)->get();
    	return view('adminKelolaBuku-update', ['result'=>$result]);
    }	

    public function saveUpdate(Request $req){
    	DB::table('buku')->where('id_buku', $req->id_buku)->update(
    		[
    		 'id_buku' => $req->id_buku,
    	     'nama_buku' => $req->nama_buku,
    	     'penulis_buku' => $req->penulis_buku,
    	     'penerbit_buku' => $req->penerbit_buku,
    	     'url_cover' => $req->url_cover,
    	     'tahun' => $req->tahun,
    		]
    	);
    	return redirect('/admin/readBuku');
    }
}
