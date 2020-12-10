<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function readPeminjaman(){
    	$peminjaman = DB::table('Peminjaman')->get();
    	return view('adminKelolaPeminjaman-read',['peminjaman'=>$peminjaman]);
    }

    public function insertPeminjaman(){
    	return view('adminKelolaPeminjaman-insert');
    }

    public function savePeminjaman(Request $req){
    	DB::table('peminjaman')->insert(
    		[
    		 'id_peminjaman' => $req->id_peminjaman,
    	     'tanggal_pinjam' => $req->tanggal_pinjam,
    	     'tanggal_kembali' => $req->tanggal_kembali,
    	     'status_peminjaman' => $req->status_peminjaman,
    	     'id_buku' => $req->id_buku,
             'nim_pengguna' => $req->nim_pengguna
    		]
    	);
    	return redirect('/admin/readPeminjaman');
    }


   public function deletePeminjaman($id_peminjaman){
   		DB::table('peminjaman')->where('id_peminjaman', $id_peminjaman)->delete();
   		return redirect('/admin/readPeminjaman');
    }

    public function updatePeminjaman($id_peminjaman){
    	$result = DB::table('peminjaman')->where('id_peminjaman', $id_peminjaman)->get();
    	return view('adminKelolaPeminjaman-update', ['result'=>$result]);
    }	

    public function saveUpdatePeminjaman(Request $req){
    	DB::table('peminjaman')->where('id_peminjaman', $req->id_peminjaman)->update(
    		[
    		 'id_peminjaman' => $req->id_peminjaman,
    	     'tanggal_pinjam' => $req->tanggal_pinjam,
    	     'tanggal_kembali' => $req->tanggal_kembali,
    	     'status_peminjaman' => $req->status_peminjaman,
    	     'id_buku' => $req->id_buku,
             'nim_pengguna' => $req->nim_pengguna
    		]
    	);
    	return redirect('/admin/readPeminjaman');
    }

}
