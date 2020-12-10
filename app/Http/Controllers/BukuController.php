<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
   
    public function readBuku(){
    	$buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
    	return view('adminhome',['buku'=>$buku],['pengguna'=>$pengguna]);
        // $buku = DB::table('buku')->get();
        // return view('adminKelolaBuku-read',['buku'=>$buku]);
    }
    
    public function readBuku_Dashboard(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $peminjaman = DB::table('peminjaman')->get();
        return view('home',['buku'=>$buku],['pengguna'=>$pengguna],['peminjaman'=>$peminjaman]);
    }

    public function insertBuku(){
        return view('adminhome');
    }

    public function saveBuku(Request $req){
		$req->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);
  
        $fileName = $req->id_buku.'.'.$req->file->extension();  
   
		$req->file->move(public_path('assets/img'), $fileName); 	
		$url_cover = "/assets/img/".$fileName;
        DB::table('buku')->insert(
            [
             'id_buku' => $req->id_buku,
             'nama_buku' => $req->nama_buku,
             'penulis_buku' => $req->penulis_buku,
             'penerbit_buku' => $req->penerbit_buku,
             'url_cover' => $url_cover,
             'stok_buku' => $req->stok_buku,
             'status_buku' => $req->status_buku,
             'tahun' => $req->tahun
            ]
        );
        return redirect($url_cover);
    }

    public function deleteBuku($id_buku){
        $buku = DB::table('buku')->where('id_buku', $id_buku)->get();
        foreach($buku as $b){

            if(file_exists(public_path($b->url_cover))){

            unlink(public_path($b->url_cover));
    
        }else{
    
            dd('File does not exists.');
    
        }
        }
        
        DB::table('buku')->where('id_buku', $id_buku)->delete();
        return redirect('/admin');
    }
    /*
    public function updateBuku($id_buku){
        $result = DB::table('buku')->where('id_buku', $id_buku)->get();
        return view('adminKelolaBuku-update', ['result'=>$result]);
    }   
    */
    public function saveUpdateBuku(Request $req, $id_buku){
        DB::table('buku')->where('id_buku', $id_buku)->update(
            [
             'id_buku' => $id_buku,
             'nama_buku' => $req->nama_buku,
             'penulis_buku' => $req->penulis_buku,
             'penerbit_buku' => $req->penerbit_buku,
             'url_cover' => $req->url_cover,
             'stok_buku' => $req->stok_buku,
             'status_buku' => $req->status_buku,
             'tahun' => $req->tahun
            ]
        );
        return redirect('/admin');
    }

    public function cariBuku(){
        return view('/testFungsi');
    }

    public function cariBukuResult(Request $req){

        $input = $req->input;
        
        if(strcmp($req->buku, 'nama') == 0){
            $resultBuku = DB::table('buku')->where('nama_buku', 'like', "%{$input}%")->get();
            return view('/testFungsi', ['resultBuku'=>$resultBuku]);
        }
        if(strcmp($req->buku, 'penulis') == 0) {
            $resultBuku = DB::table('buku')->where('penulis_buku', 'like', "%{$input}%")->get();
            return view('/testFungsi', ['resultBuku'=>$resultBuku]);
        }
        if(strcmp($req->buku, 'penerbit') == 0) {
            $resultBuku = DB::table('buku')->where('penerbit_buku', 'like', "%{$input}%")->get();
            return view('/testFungsi', ['resultBuku'=>$resultBuku]);
        }

    }
    
    
	
}

