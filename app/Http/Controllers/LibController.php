<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibController extends Controller
{
	//admin================================================================================================
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

    //pengguna=============================================================================================
    public function readPengguna(){
    	$pengguna = DB::table('pengguna')->get();
        $buku = DB::table('buku')->get();
    	return view('adminhome',['pengguna'=>$pengguna],['buku'=>$buku]);
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
    	return redirect('/admin');
    }

   public function deletePengguna($nim_pengguna){
   		DB::table('pengguna')->where('nim_pengguna', $nim_pengguna)->delete();
   		return redirect('/admin');
    }

    public function updatePengguna($nim_pengguna){
    	$result = DB::table('pengguna')->where('nim_pengguna', $nim_pengguna)->get();
    	return view('adminKelolaPengguna-update', ['result'=>$result]);
    }	

    public function saveUpdatePengguna(Request $req, $nim_pengguna){
    	DB::table('pengguna')->where('nim_pengguna', $nim_pengguna)->update(
    		[
    		 'nim_pengguna' => $nim_pengguna,
    	     'nama_pengguna' => $req->nama_pengguna,
    	     'email_pengguna' => $req->email_pengguna,
    	     'password_pengguna' => $req->password_pengguna,
    	     'phone_pengguna' => $req->phone_pengguna,
    	     'address_pengguna' => $req->address_pengguna	
    		]
    	);
    	return redirect('/admin');
    }
    public function gantipassword(Request $req)
    {
        DB::table('pengguna')->where('nim_pengguna', $req->nim_pengguna)->update(
            [
             'password_pengguna' => $req->password_baru
            ]
        );
        return redirect('/Dashboard');
    }

    //buku===========================================================================================================
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

    //peminjaman=============================================================================================================
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

    //pengumuman=============================================================================================================
    public function readPengumuman(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $pengumuman = DB::table('Pengumuman')->get();
        return view('adminHome',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna]);
    }

    public function readPengumuman_Dashboard(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $pengumuman = DB::table('Pengumuman')->get();
        $peminjaman = DB::table('peminjaman')->get();
        return view('adminHome',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna], ['peminjaman'=>$peminjaman]);
    }

    public function insertPengumuman(){
        return view('adminHome');
    }


    public function savePengumuman(Request $req){
        DB::table('pengumuman')->insert(
            [
             'id_pengumuman' => $req->id_pengumuman,
             'title_pengumuman' => $req->title_pengumuman,
             'isi_pengumuman' => $req->isi_pengumuman
            ]
        );
        return redirect('/admin');
    }


     public function deletePengumuman($id_pengumuman){     
        DB::table('pengumuman')->where('id_pengumuman', $id_pengumuman)->delete();
        return redirect('/admin');
    }
    
    //Popup
    public function saveUpdatePengumuman(Request $req, $id_pengumuman){
        DB::table('pengumuman')->where('id_pengumuman', $id_pengumuman)->update(
            [
             'id_pengumuman' => $id_pengumuman,
             'title_pengumuman' => $req->title_pengumuman,
             'isi_pengumuman' => $req->isi_pengumuman
            ]
        );
        return redirect('/admin');
    }   


}
