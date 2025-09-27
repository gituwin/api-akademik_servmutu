<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhs_per_ankatan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	public function url_3_2_1a($data)
	{
		// return echo "strissng";
$jenjang=$data['jenjang'];
		$kd_ta=$data['kd_ta'];
		$angkatan=$data['angkatan'];
		$skarang=date('Y');

		if ($angkatan=='ts_6') {
			$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date('Y');
			# code...
		}
		return $this->mutu->query("

SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

LEFT JOIN tmp_akd_master_prodi 
ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= '$jenjang'

")->result_array();
// 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// AND tmp_akd_status_mhs.kd_ta=$kd_ta
	}
	public function ts($angkataa)
	{
$angkatan=$angkataa['angkatan'];
		$skarang=date('Y');
// $sebelumnya=$skarang-6;
	if ($angkatan=='ts_6') {
		$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date('Y');
			# code...
		}
// print_r($skarang);
// echo "<br>";
// print_r($sebelumnya);
		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $angkatan AND $skarang
ORDER BY kd_ta ASC ")->result_array();
	}
	public function total_lulusan_sampai_ts($data)
	{
		// $kd_ta=$data['kd_ta'];
		$jenjang=$data['jenjang'];
		$angkatan=$data['angkatan'];
$skarang=date('Y');

		if ($angkatan=='ts_6') {
			$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date('Y');
			# code...
		}
		$akhir=date('Y');
		return $this->mutu->query("

SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_prodi 
ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
WHERE    status='A' 
AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir 
AND tmp_akd_master_jenis.jenjang= '$jenjang' AND dd.tgl_lulus IS NOT NULL
			
	")->result_array();
	}

	// ===============================================================================================================================
	public function detail1 ($data)
	{
		$jenjang=$data['jenjang'];
$kd_ts=$data['kd_ts'];// angkatan
 $angkatan=$data['angkatan'];// kd_ts
$skarang=date('Y');

		if ($angkatan=='ts_6') {
			$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date('Y');
			# code...
		}
		// $akhir=date('Y');

		return $this->mutu->query("
		
SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
tmp_akd_status_mhs.kd_ta BETWEEN $kd_ts AND $skarang 
AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan
AND tmp_akd_master_jenis.jenjang= '$jenjang') AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
ORDER BY total DESC



			")->result_array();
	}
	// ===============================================================================================================================
	public function detail_semua($data)
	{
		$jenjang=$data['jenjang'];
		$angkatan=$data['angkatan'];
$skarang=date('Y');

		if ($angkatan=='ts_6') {
			$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date('Y');
			# code...
		}
		$akhir=date('Y');

		return $this->mutu->query("

SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
 tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
AND status='A' AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan !=$angkatan 
AND tmp_akd_master_jenis.jenjang= '$jenjang' AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
 ORDER BY total DESC

			")->result_array();
	}
// =======================================================================================================================================
public function detail_2($data)
	{
		$t_angkatan=$data['t_angkatan'];
		$jenjang=$data['jenjang'];
		$angkatan=$data['angkatan'];
		$kode_prodi=$data['kode_prodi'];
		// $jenjang=$data['jenjang'];

$skarang=date('Y');

		if ($angkatan=='ts_6') {
			$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date('Y');
			# code...
		}
		$akhir=date('Y');

		return $this->mutu->query("

SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND tmp_akd_master_prodi.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
 AND kd_ta BETWEEN $t_angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

			")->result_array(); 
	}

public function detail_2_lulus($data)
	{
$angkatan=$data['angkatan'];
		$kode_prodi=$data['kode_prodi'];
		$jenjang=$data['jenjang'];
$skarang=date("Y");

		if ($angkatan=='ts_6') {
			$angkatan=$skarang-6;
		}elseif ($angkatan=='ts_5') {
			$angkatan=$skarang-5;
			# code...
		}elseif ($angkatan=='ts_4') {
			$angkatan=$skarang-4;
			# code...
		}elseif ($angkatan=='ts_3') {
			$angkatan=$skarang-3;
			# code...
		}elseif ($angkatan=='ts_2') {
			$angkatan=$skarang-2;
			# code...
		}elseif ($angkatan=='ts_1') {
			$angkatan=$skarang-1;
			# code...
		}elseif ($angkatan=='ts') {
			$angkatan=date("Y");
			# code...
		}
		$akhir=date("Y");

		return $this->mutu->query("


			

	SELECT  nama,tmp_akd_d_mahasiswa.nim,d.nm_prodi,tgl_masuk FROM tmp_akd_d_mahasiswa
	LEFT JOIN tmp_akd_master_prodi d
	ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
	d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
	d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
	LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
	LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
	tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir 
	AND status='A'   AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND  d.kd_prodi='$kode_prodi'
	AND tmp_akd_master_jenis.jenjang= '$jenjang' AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL 
	  
	
	")->result_array();
	}
// ===============================================S2================================================



// 	public function url_3_2_1a_s2($data)
// 	{
// 		// return echo "strissng";

// 		$kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// 		$skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
// AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= 'S1'
// ")->result_array();
// // 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// // LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// // AND tmp_akd_status_mhs.kd_ta=$kd_ta
// 	}
// 	public function ts_s2()
// 	{
// 		$skarang=date('Y');
// $sebelumnya=$skarang-6;
// // print_r($skarang);
// // echo "<br>";
// // print_r($sebelumnya);
// 		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $sebelumnya AND $skarang
// ORDER BY kd_ta ASC ")->result_array();
// 	}
// 	public function total_lulusan_sampai_ts_s2($data)
// 	{
// 		// $kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// WHERE    status='A' 
// AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir AND tmp_akd_master_jenis.jenjang= 'S1'
// 			")->result_array();
// 	}
// 	public function detail1_s2 ($data)
// 	{
// $kd_ts=$data['kd_ts'];
//  $angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		// $akhir=date('Y');

// 		return $this->mutu->query("
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $kd_ts 
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC



// 			")->result_array();
// 	}
// 	public function detail_semua_s2($data)
// 	{
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC

// 			")->result_array();
// 	}

// public function detail_2_s2($data)
// 	{
// 		$angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];

// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
//  AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

// 			")->result_array();
// 	}

// public function detail_2_lulus_s2($data)
// 	{
// $angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan  
// 	AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


// 			")->result_array();
// 	}
// // ==========================================================S3====================================================
// 	public function url_3_2_1a_s3($data)
// 	{
// 		// return echo "strissng";

// 		$kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// 		$skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
// AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= 'S1'
// ")->result_array();
// // 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// // LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// // AND tmp_akd_status_mhs.kd_ta=$kd_ta
// 	}
// 	public function ts_s3()
// 	{
// 		$skarang=date('Y');
// $sebelumnya=$skarang-6;
// // print_r($skarang);
// // echo "<br>";
// // print_r($sebelumnya);
// 		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $sebelumnya AND $skarang
// ORDER BY kd_ta ASC ")->result_array();
// 	}
// 	public function total_lulusan_sampai_ts_s3($data)
// 	{
// 		// $kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// WHERE    status='A' 
// AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir AND tmp_akd_master_jenis.jenjang= 'S1'
// 			")->result_array();
// 	}
// 	public function detail1_s3 ($data)
// 	{
// $kd_ts=$data['kd_ts'];
//  $angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		// $akhir=date('Y');

// 		return $this->mutu->query("
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $kd_ts 
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC



// 			")->result_array();
// 	}
// 	public function detail_semua_s3($data)
// 	{
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC

// 			")->result_array();
// 	}

// public function detail_2_s3($data)
// 	{
// 		$angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];

// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
//  AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

// 			")->result_array();
// 	}

// public function detail_2_lulus_s3($data)
// 	{
// $angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan  
// 	AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


// 			")->result_array();
// 	}
// // ================================================d4===================================================

// public function url_3_2_1a_d4($data)
// 	{
// 		// return echo "strissng";

// 		$kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// 		$skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
// AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= 'S1'
// ")->result_array();
// // 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// // LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// // AND tmp_akd_status_mhs.kd_ta=$kd_ta
// 	}
// 	public function ts_d4()
// 	{
// 		$skarang=date('Y');
// $sebelumnya=$skarang-6;
// // print_r($skarang);
// // echo "<br>";
// // print_r($sebelumnya);
// 		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $sebelumnya AND $skarang
// ORDER BY kd_ta ASC ")->result_array();
// 	}
// 	public function total_lulusan_sampai_ts_d4($data)
// 	{
// 		// $kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// WHERE    status='A' 
// AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir AND tmp_akd_master_jenis.jenjang= 'S1'
// 			")->result_array();
// 	}
// 	public function detail1_d4 ($data)
// 	{
// $kd_ts=$data['kd_ts'];
//  $angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		// $akhir=date('Y');

// 		return $this->mutu->query("
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $kd_ts 
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC



// 			")->result_array();
// 	}
// 	public function detail_semua_d4($data)
// 	{
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC

// 			")->result_array();
// 	}

// public function detail_2_d4($data)
// 	{
// 		$angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];

// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
//  AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

// 			")->result_array();
// 	}

// public function detail_2_lulus_d4($data)
// 	{
// $angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan  
// 	AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


// 			")->result_array();
// 	}
// // =================================================================d3=================================================

// 	public function url_3_2_1a_d3($data)
// 	{
// 		// return echo "strissng";

// 		$kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// 		$skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
// AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= 'S1'
// ")->result_array();
// // 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// // LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// // AND tmp_akd_status_mhs.kd_ta=$kd_ta
// 	}
// 	public function ts_d3()
// 	{
// 		$skarang=date('Y');
// $sebelumnya=$skarang-6;
// // print_r($skarang);
// // echo "<br>";
// // print_r($sebelumnya);
// 		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $sebelumnya AND $skarang
// ORDER BY kd_ta ASC ")->result_array();
// 	}
// 	public function total_lulusan_sampai_ts_d3($data)
// 	{
// 		// $kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// WHERE    status='A' 
// AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir AND tmp_akd_master_jenis.jenjang= 'S1'
// 			")->result_array();
// 	}
// 	public function detail1_d3 ($data)
// 	{
// $kd_ts=$data['kd_ts'];
//  $angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		// $akhir=date('Y');

// 		return $this->mutu->query("
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $kd_ts 
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC



// 			")->result_array();
// 	}
// 	public function detail_semua_d3($data)
// 	{
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC

// 			")->result_array();
// 	}

// public function detail_2_d3($data)
// 	{
// 		$angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];

// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
//  AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

// 			")->result_array();
// 	}

// public function detail_2_lulus_d3($data)
// 	{
// $angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan  
// 	AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


// 			")->result_array();
// 	}


// // ============================================d2==============================================================

// 	public function url_3_2_1a_d2($data)
// 	{
// 		// return echo "strissng";

// 		$kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// 		$skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
// AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= 'S1'
// ")->result_array();
// // 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// // LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// // AND tmp_akd_status_mhs.kd_ta=$kd_ta
// 	}
// 	public function ts_d2()
// 	{
// 		$skarang=date('Y');
// $sebelumnya=$skarang-6;
// // print_r($skarang);
// // echo "<br>";
// // print_r($sebelumnya);
// 		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $sebelumnya AND $skarang
// ORDER BY kd_ta ASC ")->result_array();
// 	}
// 	public function total_lulusan_sampai_ts_d2($data)
// 	{
// 		// $kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// WHERE    status='A' 
// AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir AND tmp_akd_master_jenis.jenjang= 'S1'
// 			")->result_array();
// 	}
// 	public function detail1_d2 ($data)
// 	{
// $kd_ts=$data['kd_ts'];
//  $angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		// $akhir=date('Y');

// 		return $this->mutu->query("
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $kd_ts 
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC



// 			")->result_array();
// 	}
// 	public function detail_semua_d2($data)
// 	{
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC

// 			")->result_array();
// 	}

// public function detail_2_d2($data)
// 	{
// 		$angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];

// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
//  AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

// 			")->result_array();
// 	}

// public function detail_2_lulus_d2($data)
// 	{
// $angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan  
// 	AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


// 			")->result_array();
// 	}

// // ==================================================================d1==============================================

// 	public function url_3_2_1a_d1($data)
// 	{
// 		// return echo "strissng";

// 		$kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// 		$skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  status='A' 
// AND dd.angkatan =$angkatan AND tmp_akd_status_mhs.kd_ta=$kd_ta AND tmp_akd_master_jenis.jenjang= 'S1'
// ")->result_array();
// // 	SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// // LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim WHERE    status='A' 
// // AND tmp_akd_status_mhs.kd_ta=$kd_ta
// 	}
// 	public function ts_d1()
// 	{
// 		$skarang=date('Y');
// $sebelumnya=$skarang-6;
// // print_r($skarang);
// // echo "<br>";
// // print_r($sebelumnya);
// 		return $this->mutu->query("SELECT DISTINCT kd_ta FROM public.tmp_akd_status_mhs WHERE kd_ta BETWEEN $sebelumnya AND $skarang
// ORDER BY kd_ta ASC ")->result_array();
// 	}
// 	public function total_lulusan_sampai_ts_d1($data)
// 	{
// 		// $kd_ta=$data['kd_ta'];
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');
// 		return $this->mutu->query("
// SELECT count(DISTINCT dd.nim) FROM tmp_akd_d_mahasiswa dd 
// LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_prodi 
// ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// WHERE    status='A' 
// AND dd.angkatan !=$angkatan  AND tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir AND tmp_akd_master_jenis.jenjang= 'S1'
// 			")->result_array();
// 	}
// 	public function detail1_d1 ($data)
// 	{
// $kd_ts=$data['kd_ts'];
//  $angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		// $akhir=date('Y');

// 		return $this->mutu->query("
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $kd_ts 
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC



// 			")->result_array();
// 	}
// 	public function detail_semua_d1($data)
// 	{
// 		$angkatan=$data['angkatan'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN $angkatan AND $akhir
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= 'S1') AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC

// 			")->result_array();
// 	}

// public function detail_2_d1($data)
// 	{
// 		$angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];

// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan 
//  AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk 
 

// 			")->result_array();
// 	}

// public function detail_2_lulus_d1($data)
// 	{
// $angkatan=$data['angkatan'];
// 		$kode_prodi=$data['kode_prodi'];
// 		// $jenjang=$data['jenjang'];
// $skarang=date('Y');

// 		if ($angkatan=='ts_6') {
// 			$angkatan=$skarang-6;
// 		}elseif ($angkatan=='ts_5') {
// 			$angkatan=$skarang-5;
// 			# code...
// 		}elseif ($angkatan=='ts_4') {
// 			$angkatan=$skarang-4;
// 			# code...
// 		}elseif ($angkatan=='ts_3') {
// 			$angkatan=$skarang-3;
// 			# code...
// 		}elseif ($angkatan=='ts_2') {
// 			$angkatan=$skarang-2;
// 			# code...
// 		}elseif ($angkatan=='ts_1') {
// 			$angkatan=$skarang-1;
// 			# code...
// 		}elseif ($angkatan=='ts') {
// 			$angkatan=date('Y');
// 			# code...
// 		}
// 		$akhir=date('Y');

// 		return $this->mutu->query("

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='S1' AND  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi'  AND status='A' AND angkatan = $angkatan  
// 	AND kd_ta BETWEEN $angkatan AND $akhir  GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


// 			")->result_array();
// 	}





}
//tambahan query yan asli=AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL
/* End of file mhs_per_ankatan.php */
/* Location: ./application/models/mhs_per_ankatan.php */

//yg asli
// SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
//  tmp_akd_status_mhs.kd_ta BETWEEN 2015 AND 2016
// AND status='A'   AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL) AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
//  ORDER BY total DESC


// query kedua berikutnya

// SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
// 	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
// LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
// 	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
// 	WHERE jenjang='$jenjang' AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND angkatan=$pltah AND kd_smt=1 AND status='A' GROUP 