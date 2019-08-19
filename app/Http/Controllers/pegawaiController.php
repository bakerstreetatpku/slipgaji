<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PegawaiController extends Controller
{
    public function index(){
    	$pegawai = DB::table('bnd_pegawai')->get();
		
		$d = [
		'judul' => "Data Master",
		'subjudul' => "Pegawai",
		'table' => $pegawai,
		];
		return view('pegawai', $d);
    }
	
	public function store(Request $request){
		// insert data ke table pegawai
		$tgls = explode("/",$request->peg_tanggal_lahir);
		$tgl_lahir = "$tgls[2]-$tgls[1]-$tgls[0]";
		if ($request->peg_id == 0)
		{
			DB::table('bnd_pegawai')->insert([
				'peg_nip' => $request->peg_nip,
				'peg_nama' => $request->peg_nama,
				'peg_alamat' => $request->peg_alamat,
				'peg_tempat_lahir' => $request->peg_tempat_lahir,
				'peg_tanggal_lahir' => $tgl_lahir,
				'peg_jk' => $request->peg_jk,
				'peg_agama' => $request->peg_agama
			]);
		} 
		else 
		{
			// update data pegawai
			DB::table('bnd_pegawai')->where('peg_id',$request->peg_id)->update([
				'peg_nip' => $request->peg_nip,
				'peg_nama' => $request->peg_nama,
				'peg_alamat' => $request->peg_alamat,
				'peg_tempat_lahir' => $request->peg_tempat_lahir,
				'peg_tanggal_lahir' => $tgl_lahir,
				'peg_jk' => $request->peg_jk,
				'peg_agama' => $request->peg_agama
			]);
		}
		// alihkan halaman ke halaman pegawai
		
		$resp['status'] = 1;
		$resp['desc'] = "Berhasil menyimpan data";
		echo json_encode($resp);
	}
	
	public function cari(Request $request){
		// cari data ke table pegawai
    	$pegawai = DB::table('bnd_pegawai')->where('peg_id',$request->peg_id)->get();
		echo json_encode($pegawai);
	}
	public function hapus(Request $request){
		// cari data ke table pegawai
    	$pegawai = DB::table('bnd_pegawai')->where('peg_id',$request->peg_id)->delete();
		
		$resp['status'] = 1;
		$resp['desc'] = "data berhasil dihapus";
		echo json_encode($resp);
	}
}