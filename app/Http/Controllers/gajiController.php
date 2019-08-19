<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GajiController extends Controller
{
    public function index(){
    	$gaji = DB::table('bnd_gaji')->get();
    	$pegawai = DB::table('bnd_pegawai')->get();
		
		$d = [
		'judul' => "Data Master",
		'subjudul' => "Gaji",
		'table' => $gaji,
		'pegawai' => $pegawai,
		];
		return view('gaji', $d);
    }
	
	public function store(Request $request){
		// insert data ke table gaji
		if ($request->gj_id == 0)
		{
			DB::table('bnd_gaji')->insert([
				'gj_pokok' => $request->gj_pokok,
				'gj_makan' => $request->gj_makan,
				'gj_transport' => $request->gj_transport,
				'gj_peg_id' => $request->gj_peg_id,
				'gj_lembur' => $request->gj_lembur
			]);
		} 
		else 
		{
			// update data gaji
			DB::table('bnd_gaji')->where('gj_id',$request->gj_id)->update([
				'gj_pokok' => $request->gj_pokok,
				'gj_makan' => $request->gj_makan,
				'gj_transport' => $request->gj_transport,
				'gj_peg_id' => $request->gj_peg_id,
				'gj_lembur' => $request->gj_lembur
			]);
		}
		// alihkan halaman ke halaman gaji
		
		$resp['status'] = 1;
		$resp['desc'] = "Berhasil menyimpan data";
		echo json_encode($resp);
	}
	
	public function cari(Request $request){
		// cari data ke table gaji
    	$gaji = DB::table('bnd_gaji')->where('gj_id',$request->gj_id)->get();
		echo json_encode($gaji);
	}
	public function hapus(Request $request){
		// cari data ke table gaji
    	$gaji = DB::table('bnd_gaji')->where('gj_id',$request->gj_id)->delete();
		
		$resp['status'] = 1;
		$resp['desc'] = "data berhasil dihapus";
		echo json_encode($resp);
	}
}