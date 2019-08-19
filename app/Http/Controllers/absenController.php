<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AbsenController extends Controller
{
    public function index(){
    	$absen = DB::table('bnd_absen')->get();
    	$pegawai = DB::table('bnd_pegawai')->get();
    	$periodeabsen = DB::table('bnd_periodeabsen')->get();
		$bln = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$d = [
		'judul' => "Data Master",
		'subjudul' => "Absen",
		'table' => $absen,
		'pegawai' => $pegawai,
		'periodeabsen' => $periodeabsen,
		'bln' => $bln,
		];
		return view('absen', $d);
    }
	
	public function store(Request $request){
		// insert data ke table absen
		if ($request->abs_id == 0)
		{
			DB::table('bnd_absen')->insert([
				'abs_peg_id' => $request->abs_peg_id,
				'abs_pra_id' => $request->abs_pra_id,
				'abs_jml_hadir' => $request->abs_jml_hadir,
				'abs_jml_tepat_waktu' => $request->abs_jml_tepat_waktu,
			]);
		} 
		else 
		{
			// update data absen
			DB::table('bnd_absen')->where('abs_id',$request->abs_id)->update([
				'abs_peg_id' => $request->abs_peg_id,
				'abs_pra_id' => $request->abs_pra_id,
				'abs_jml_hadir' => $request->abs_jml_hadir,
				'abs_jml_tepat_waktu' => $request->abs_jml_tepat_waktu,
			]);
		}
		// alihkan halaman ke halaman absen
		
		$resp['status'] = 1;
		$resp['desc'] = "Berhasil menyimpan data";
		echo json_encode($resp);
	}
	
	public function cari(Request $request){
		// cari data ke table absen
    	$absen = DB::table('bnd_absen')->where('abs_id',$request->abs_id)->get();
		echo json_encode($absen);
	}
	public function hapus(Request $request){
		// cari data ke table absen
    	$absen = DB::table('bnd_absen')->where('abs_id',$request->abs_id)->delete();
		
		$resp['status'] = 1;
		$resp['desc'] = "data berhasil dihapus";
		echo json_encode($resp);
	}
}