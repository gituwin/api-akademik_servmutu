<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rata_rata_ipk_mhs extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
		
	}
	public function test($data)
	{
		$a= array($data['angkatan']);
		return $a;
	}
	public function rata2_ipk_1($data)
	{
		$angkatan=$data['angkatan'];
		$jenjang=$data['jenjang'];
		$rata2=$data['data'];
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
		// return array($rata2);
		return $this->mutu->query("SELECT AVG ( $rata2  ) FROM tmp_akd_d_mahasiswa dd 
LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

LEFT JOIN tmp_akd_master_prodi 
ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
WHERE  EXTRACT(YEAR FROM tgl_lulus) = $angkatan AND tmp_akd_master_jenis.jenjang= '$jenjang'")->result_array();
	}

	public function kd_ta($data)
	{
		 $angkatan=$data['angkatan'];
		$skarang=date('Y');
		// $a=array($skarang)
		// return $a;
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
		return $this->mutu->query("SELECT DISTINCT angkatan FROM public.tmp_akd_d_mahasiswa WHERE angkatan BETWEEN $angkatan AND $skarang
ORDER BY angkatan ASC ")->result_array();
		# code...
	}

	public function total_ts($data)
	{
		 $angkatan=$data['angkatan'];
		$skarang=date('Y');
		// $a=array($skarang)
		// return $a;
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
		return $this->mutu->query("SELECT count( DISTINCT angkatan) FROM public.tmp_akd_d_mahasiswa WHERE angkatan BETWEEN $angkatan AND $skarang ")->result_array();
		# code...
	}
// 	public function total_ts($data)
// 	{
// 				 $angkatan=$data['angkatan'];
// 		$skarang=date('Y');
// 		$a=array($skarang)
// 		return $a;
// // $sebelumnya=$skarang-6;
// 	if ($angkatan=='ts_6') {
// 		$angkatan=$skarang-6;
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

// 		$angkatan=$data['angkatan'];

// 		return $this->mutu->query("SELECT count( DISTINCT angkatan) FROM public.tmp_akd_d_mahasiswa WHERE angkatan BETWEEN $angkatan AND $skarang
//  ")->result_array();
// 		# code...
// 	}

	public function jenis()
	{
		# code...
		return $this->mutu->query('SELECT  nm_jenis,jenjang,urut FROM public.tmp_akd_master_jenis 
ORDER BY urut ASC ')->result_array();
	}


	public function detail1 ($data)
	{
		$angkatan=$data['angkatan'];
		$jenjang=$data['jenjang'];

		
		return $this->mutu->query("
SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
 d.kd_prodi= h.kd_prodi  AND EXTRACT(YEAR FROM tgl_lulus) = $angkatan
 AND tmp_akd_master_jenis.jenjang= '$jenjang' AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
 ORDER BY total DESC
			")->result_array();
	}

	public function detail2 ($data)
	{
		$jenjang=$data['jenjang'];
		$kd_prodi=$data['kd_prodi'];
		$angkatan=$data['angkatan'];

		return $this->mutu->query("

SELECT nama,tmp_akd_d_mahasiswa.nim,jenjang,tgl_masuk,tgl_lulus,lama_studi ,ipk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND  tmp_akd_master_prodi.kd_prodi='$kd_prodi' AND  EXTRACT(YEAR FROM tgl_lulus) = $angkatan 
 AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL  
	GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk,tgl_lulus,lama_studi,ipk,jenjang

			")->result_array();
	}
// ===============================================
	public function rata2_masa_studi($data)
	{
	$angkatan=$data['angkatan'];
		$jenjang=$data['jenjang'];

return $this->mutu->query("
SELECT AVG ( lama_studi) FROM tmp_akd_d_mahasiswa dd 
LEFT JOIN tmp_akd_status_mhs ON dd.nim=tmp_akd_status_mhs.nim 

LEFT JOIN tmp_akd_master_prodi 
ON dd.kd_prodi=tmp_akd_master_prodi.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  dd.angkatan =$angkatan AND tmp_akd_master_jenis.jenjang= '$jenjang'
	")->result_array();
		# code...
	}

}

/* End of file  */
/* Location: ./application/models/ */