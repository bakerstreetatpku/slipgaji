<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CetakGajiController extends Controller
{
    public function index(){
    	$pegawai = DB::table('bnd_pegawai')->get();
    	$periodeabsen = DB::table('bnd_periodeabsen')->get();
		$bln = array(1=> "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$d = [
		'judul' => "Data Master",
		'subjudul' => "Cetak Gaji",
		'pegawai' => $pegawai,
		'periodeabsen' => $periodeabsen,
		'bln' => $bln,
		];
		return view('cetakgaji', $d);
    }
	
	public function store(Request $request){
		// insert data ke table cetakgaji
		if ($request->gj_id == 0)
		{
			DB::table('bnd_cetakgaji')->insert([
				'gj_pokok' => $request->gj_pokok,
				'gj_makan' => $request->gj_makan,
				'gj_transport' => $request->gj_transport,
				'gj_peg_id' => $request->gj_peg_id,
				'gj_lembur' => $request->gj_lembur
			]);
		} 
		else 
		{
			// update data cetakgaji
			DB::table('bnd_cetakgaji')->where('gj_id',$request->gj_id)->update([
				'gj_pokok' => $request->gj_pokok,
				'gj_makan' => $request->gj_makan,
				'gj_transport' => $request->gj_transport,
				'gj_peg_id' => $request->gj_peg_id,
				'gj_lembur' => $request->gj_lembur
			]);
		}
		// alihkan halaman ke halaman cetakgaji
		
		$resp['status'] = 1;
		$resp['desc'] = "Berhasil menyimpan data";
		echo json_encode($resp);
	}
	
	public function cetak(Request $request){
		// cari data ke table cetakgaji
		$peg_id = $request->peg;
		$pra_id = $request->pra;
    	$pegawai = DB::table('bnd_pegawai')->where('peg_id',$peg_id)->first();
    	$gaji = DB::table('bnd_gaji')->where('gj_peg_id',$peg_id)->first();
    	$periodeabsen = DB::table('bnd_periodeabsen')->where('pra_id',$pra_id)->first();
    	$absen = DB::table('bnd_absen')->where('abs_pra_id',$pra_id)->where('abs_peg_id',$peg_id)->first();
		// print_r($absen);die();
		
		$tidakhadir = 0;
		$telathadir = 0;
		if (!empty($absen))
		{
			$takhdr = $periodeabsen->pra_jml_hr - $absen->abs_jml_hadir;
			$tlthdr = $periodeabsen->pra_jml_hr - $absen->abs_jml_tepat_waktu;
			$tidakhadir = $takhdr * 200000;
			$telathadir = $tlthdr * 50000;
		}
		$jamsostek = $gaji->gj_pokok * 0.02;
		$iuranpensiun = $gaji->gj_pokok * 0.02;
		$bpjs = $gaji->gj_pokok * 0.02;
		$pph = $gaji->gj_pokok * 0.01;
		$lembur = 0;
		
		$totalincome = $gaji->gj_pokok + $gaji->gj_makan + $gaji->gj_transport + $lembur;
		$totaldeduction = $jamsostek + $iuranpensiun + $bpjs + $pph + $telathadir + $tidakhadir;
		$total = $totalincome - $totaldeduction;
		$d = [
		'nama' => $pegawai->peg_nama,
		'pph' => $pph,
		'gajipokok' => $gaji->gj_pokok,
		'uangmakan' => $gaji->gj_makan,
		'transport' => $gaji->gj_transport,
		'lembur' => $lembur,
		'jamsostek' => $jamsostek,
		'iuranpensiun' => $iuranpensiun,
		'bpjs' => $bpjs,
		'tidakhadir' => $tidakhadir,
		'telathadir' => $telathadir,
		'totalincome' => $totalincome,
		'totaldeduction' => $totaldeduction,
		'total' => $total,
		];
    	return view('cetakgaji_p', $d);
	}
	public function cari(Request $request){
		// cari data ke table cetakgaji
    	$cetakgaji = DB::table('bnd_cetakgaji')->where('gj_id',$request->gj_id)->get();
		echo json_encode($cetakgaji);
	}
	public function hapus(Request $request){
		// cari data ke table cetakgaji
    	$cetakgaji = DB::table('bnd_cetakgaji')->where('gj_id',$request->gj_id)->delete();
		
		$resp['status'] = 1;
		$resp['desc'] = "data berhasil dihapus";
		echo json_encode($resp);
	}
}