<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibController extends Controller
{
	//login=====================================================================================
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
        $buku = DB::table('buku')->get();
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();  
        $pengguna = DB::table('pengguna')->get();
        return view('admin')->with(compact('buku','pengguna'));
        // return view('admin',['pengumuman'=>$pengumuman,'buku'=>$buku,'pengguna'=>$pengguna,'peminjaman'=>$peminjaman]);
    }

    public function insertPengguna(){
    	return view('admin');
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
    	return view('admin', ['result'=>$result]);
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
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();  //KALIAN LUPA INI
        return view('admin')->with(compact('buku','pengguna','peminjaman', 'pengumuman'));
        // return view('admin',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna], ['peminjaman'=>$peminjaman]);
        
    }
    
    public function readBuku_Dashboard(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();  
        $peminjamanJoinBuku = DB::table('peminjaman')->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')->where('peminjaman.status_peminjaman', 'Ongoing')->get();
        return view('home')->with(compact('buku','pengguna','peminjaman', 'pengumuman', 'peminjamanJoinBuku'));
        // return view('home',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna], ['peminjaman'=>$peminjaman]);
    }

    public function insertBuku(){
        return view('admin');
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
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();  
        $peminjamanJoinBuku = DB::table('peminjaman')->join('buku', 'buku.id_buku', '=', 'peminjaman.id_buku')->where('peminjaman.status_peminjaman', 'Ongoing')->get();
       

        $input = $req->input;
        $bukuFilter = $req->buku;
        if(strcmp($bukuFilter, 'nama') == 0){
            $resultBuku = DB::table('buku')->where('nama_buku', 'like', "%{$input}%")->get();
            // dd($buku);
            return view('home')->with(compact('resultBuku', 'buku', 'pengguna', 'pengumuman', 'peminjaman', 'peminjamanJoinBuku'));
            // return view('home', ['resultBuku'=>$resultBuku],['buku'=>$buku]);
        }
        if(strcmp($bukuFilter, 'penulis') == 0) {
            $resultBuku = DB::table('buku')->where('penulis_buku', 'like', "%{$input}%")->get();
            return view('home')->with(compact('resultBuku', 'buku', 'pengguna', 'pengumuman', 'peminjaman', 'peminjamanJoinBuku'));
        }
        if(strcmp($bukuFilter, 'penerbit') == 0) {
            $resultBuku = DB::table('buku')->where('penerbit_buku', 'like', "%{$input}%")->get();
            return view('home')->with(compact('resultBuku', 'buku', 'pengguna', 'pengumuman', 'peminjaman', 'peminjamanJoinBuku'));
        }

    }

    //peminjaman=============================================================================================================
    public function readPeminjaman(){
    	$peminjaman = DB::table('peminjaman')->get();
    	return view('admin',['peminjaman'=>$peminjaman]);
    }

    public function insertPeminjaman(){
    	return view('admin');
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
    	return redirect('/admin');
    }


   public function deletePeminjaman($id_peminjaman){
   		DB::table('peminjaman')->where('id_peminjaman', $id_peminjaman)->delete();
   		return redirect('/admin');
    }

    public function updatePeminjaman($id_peminjaman){
    	$result = DB::table('peminjaman')->where('id_peminjaman', $id_peminjaman)->get();
    	return view('admin', ['result'=>$result]);
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
    	return redirect('/admin');
    }

    //pengumuman=============================================================================================================
    public function readPengumuman(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();
        return view('admin',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna], ['peminjaman'=>$peminjaman]);
    }

    public function readPengumuman_Dashboard(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();
        return view('home',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna], ['peminjaman'=>$peminjaman]);
    }

    public function insertPengumuman(){
        return view('admin');
    }


    public function savePengumuman(Request $req){
        DB::table('pengumuman')->insert(
            [
            //  'id_pengumuman' => $req->id_pengumuman,
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


    public function adminView(){
        $buku = DB::table('buku')->get();
        $pengguna = DB::table('pengguna')->get();
        $peminjaman = DB::table('peminjaman')->get();
        $pengumuman = DB::table('pengumuman')->get();
        return view('admin',['pengumuman'=>$pengumuman], ['buku'=>$buku], ['pengguna'=>$pengguna], ['peminjaman'=>$peminjaman]);
    }


}
