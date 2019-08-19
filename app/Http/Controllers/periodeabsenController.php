<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PeriodeAbsenController extends Controller
{
    public function index(){
    	$periodeabsen = DB::table('bnd_periodeabsen')->get();
		$bln = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		
		$d = [
		'judul' => "Data Master",
		'subjudul' => "Periode Absen",
		'table' => $periodeabsen,
		'bln' => $bln,
		];
		return view('periodeabsen', $d);
    }
	
	public function store(Request $request){
		// insert data ke table periodeabsen
		$tgls = explode(";",$request->periode);
		if ($request->pra_id == 0)
		{
			DB::table('bnd_periodeabsen')->insert([
				'pra_bln' => $tgls[1],
				'pra_thn' => $tgls[0],
				'pra_jml_hr' => $request->pra_jml_hr,
			]);
		} 
		else 
		{
			// update data periodeabsen
			DB::table('bnd_periodeabsen')->where('pra_id',$request->pra_id)->update([
				'pra_bln' => $tgls[1],
				'pra_thn' => $tgls[0],
				'pra_jml_hr' => $request->pra_jml_hr,
			]);
		}
		// alihkan halaman ke halaman periodeabsen
		
		$resp['status'] = 1;
		$resp['desc'] = "Berhasil menyimpan data";
		echo json_encode($resp);
	}
	
	public function cari(Request $request){
		// cari data ke table periodeabsen
    	$periodeabsen = DB::table('bnd_periodeabsen')->where('pra_id',$request->pra_id)->get();
		echo json_encode($periodeabsen);
	}
	public function hapus(Request $request){
		// cari data ke table periodeabsen
    	$periodeabsen = DB::table('bnd_periodeabsen')->where('pra_id',$request->pra_id)->delete();
		
		$resp['status'] = 1;
		$resp['desc'] = "data berhasil dihapus";
		echo json_encode($resp);
	}
}