<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sinkronkan extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');

		
	}
	public function mah_dal_lim_th($data)
{
 $jenjang=$data['jenjang'];
 $tahun=$data['tahun'];

	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE jenjang='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=1 AND reguler='1'
")->result_array();
}
public function tranfer($data='')
{
 $jenjang=$data['jenjang'];
 $tahun=$data['tahun'];

	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE jenjang='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=1 AND reguler='0'
")->result_array();

}
	public function mah_dal_lim_th_all($data)
{
 $jenjang=$data['jenjang'];


	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE status='A'AND reguler='1' AND  kd_smt=1 AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya  AND $taunini 
")->result_array();
}

public function mah_dal_lim_th_all_trf()
{


	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE status='A'AND reguler='0' AND  kd_smt=1 AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya  AND $taunini 
")->result_array();
}

	public function mah_dal_lim_th_tot($data)
{
 $jenjang=$data['jenjang'];
 $tahun=$data['tahun'];

	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE jenjang='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND reguler='1'
")->result_array();
}
public function tot_transfer($data)
{
	 $jenjang=$data['jenjang'];
 $tahun=$data['tahun'];

	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE jenjang='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah  AND reguler='0'
")->result_array();
}

public function mah_dal_lim_th_tot_all($data)
{
 $jenjang=$data['jenjang'];


	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE reguler='1'
AND status='A'  AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya  AND $taunini 
")->result_array();
}
public function mah_dal_lim_th_tot_all_trf()
{



	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE reguler='0'
AND status='A'  AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya  AND $taunini 
")->result_array();
}

public function mah_dal_lim_th_all_all()
{
 $jenjang='S1';


	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis LEFT JOIN tmp_akd_status_mhs 
ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE status='A'  
AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunini  AND $taunsebelumnya 
")->result_array();
}
public function url_3_1_5_detail_1($data)
{
	$jenjang=$data['jenjang'];
 $tahun=$data['ts'];
 $kd_smt=$data['kd_smt'];
	$taunini=2017;
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	if (empty($kd_smt)) {
		return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$jenjang' 
AND status='A'  AND kd_smt>1 AND d.kd_prodi= h.kd_prodi  AND tmp_akd_d_mahasiswa.angkatan = $pltah) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$jenjang' ORDER BY total DESC

")->result_array();
	}else {
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=$kd_smt AND d.kd_prodi= h.kd_prodi) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$jenjang'ORDER BY total DESC

")->result_array();
	}
	
}

public function url_3_1_5_detail_1_total($data)
{
	$jenjang=$data['jenjang'];
 $tahun=$data['ts'];
 $kd_smt=$data['kd_smt'];
	$taunini=2017;
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	if (empty($kd_smt)) {
		return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$jenjang' 
AND status='A' AND kd_smt>1 AND d.kd_prodi= h.kd_prodi AND  tmp_akd_d_mahasiswa.angkatan = $pltah) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$jenjang'ORDER BY total DESC

")->result_array();
	}else {
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT kd_prodi,jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count( DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah  AND d.kd_prodi= h.kd_prodi ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$jenjang'ORDER BY total DESC

")->result_array();
	}
	
}
public function dtl_jml_jenis($data)
{
	$jenjang=$data['jenjang'];
	return $this->mutu->query(" SELECT kd_prodi,jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE nm_jenis='Akademik' 
AND status='A'AND kd_smt=1 AND tmp_akd_d_mahasiswa.reguler ='1' AND d.kd_prodi= h.kd_prodi AND 
 tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017 ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='Akademik'

ORDER BY total DESC")->result_array();
}
public function url_3_1_5_detail_2($data)

{
	$jenjang=$data['jenjang'];
	$kd_prodi=$data['kd_prodi'];
	$tahun=$data['ts'];
	$taunini=2017;
	$taunsebelumnya=$taunini-4;

	 $tot=$data['tot'];
if ($tot=='no') {
	if ($tahun=='semua') {
			return $this->mutu->query("SELECT *
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
	LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE   jenjang='$jenjang' AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND status='A'AND  kd_smt=1 AND angkatan BETWEEN $taunsebelumnya AND $taunini ")->result_array();
	}else{
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	// $kode_prodi=$data['kd_prodi'];
return $this->mutu->query("SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND angkatan=$pltah AND kd_smt=1 AND status='A' GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk")->result_array();}
}elseif($tot=='yes'){
	if ($tahun=='semua') {
		return $this->mutu->query("SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
	LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE   jenjang='$jenjang' AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND status='A'AND   angkatan BETWEEN $taunsebelumnya AND $taunini
	GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk")->result_array();

	}else{
	if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	// $kode_prodi=$data['kd_prodi'];
return $this->mutu->query("SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
	LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND angkatan=$pltah  AND status='A' 
	GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk")->result_array();
}

}	

}
public function prodi($value)
{
	$kd_prodi=$value['kd_prodi'];
	// return $kd_prodi;
	return $this->mutu->query("SELECT nm_prodi FROM tmp_akd_master_prodi
WHERE kd_prodi='$kd_prodi' ")->result_array();
}


public function jenis()
{
	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	return $this->mutu->query("SELECT DISTINCT  nm_jenis FROM tmp_akd_master_jenis Where urut BETWEEN 1 AND 10  order BY nm_jenis ")->result_array();
}
public function jenjang ($data)
{
$nm_jenis=$data['nm_jenis'];
return $this->mutu->query("SELECT DISTINCT  jenjang FROM tmp_akd_master_jenis  WHERE nm_jenis='$nm_jenis'  order BY jenjang")->result_array();
}
public function semua_data_mah()
{
	return $this->mutu->query("SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis LEFT JOIN tmp_akd_status_mhs 
ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE status='A'")->result_array();
}

public function url_3_1_5_detail_1_total_all()
{
	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE reguler='1' 
AND d.kd_prodi= h.kd_prodi AND status='A' AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis 
")->result_array();
}
public function url_3_1_5_detail_2_total_all($data)
{
	$kd_prodi=$data['kd_prodi'];
return $this->mutu->query("SELECT tmp_akd_d_mahasiswa.nim,nama,tgl_masuk FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE d.kd_prodi='$kd_prodi' AND status='A' AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017
  GROUP BY tmp_akd_d_mahasiswa.nim,nama,tgl_masuk
")->result_array();
}

public function tot_mamba_reg()
{

	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE reguler='1' 
AND status='A'  AND kd_smt=1 AND d.kd_prodi= h.kd_prodi AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya AND $taunini) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis")->result_array();
}

public function tot_mamba_reg_sem()
{

	$taunini=2017;
	$taunsebelumnya=$taunini-4;
	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE reguler='1' 
AND status='A'   AND d.kd_prodi= h.kd_prodi AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya AND $taunini ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis")->result_array();
}

public function url_3_1_5_detail_1_trnsr($data)
{
	$jenjang=$data['jenjang'];
 $tahun=$data['ts'];
 $kd_smt=$data['kd_smt'];
	$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	if (empty($kd_smt)) {
		return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$jenjang' 
AND status='A'AND kd_smt>1 AND reguler='0' AND d.kd_prodi= h.kd_prodi AND tmp_akd_d_mahasiswa.angkatan = $pltah) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$jenjang' ORDER BY total DESC

")->result_array();
	}else {
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
// 	return'a';
// return array('a'=>$pltah);
	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$jenjang' 
AND status='A'AND reguler='0' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=$kd_smt AND d.kd_prodi= h.kd_prodi) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$jenjang'  ORDER BY total DESC
")->result_array();
	}
	
}
public function url_3_1_5_detail_1_trnsr_all($data){

// $jenjang=$data['jenjang'];
 // $tahun=$data['ts'];
 $kd_smt=$data['kd_smt'];
	$taunini=2017;
	if (empty($kd_smt)) {
		return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE  
 status='A'AND kd_smt>1 AND reguler='0' AND d.kd_prodi= h.kd_prodi AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis  ORDER BY total DESC")->result_array();
	}else{
		
return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE  
 status='A'AND reguler='0' AND kd_smt=$kd_smt AND d.kd_prodi= h.kd_prodi AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis  ORDER BY total DESC")->result_array();


	}	
}

public function url_3_1_5_detail_2_trnsr($data)
{
	$kode_prodi=$data['kode_prodi'];
	// $status =$data['status'];
	// $reguler=$data['reguler'];
	$kd_smt=$data['kd_smt'];
// return $data['kode_prodi'];
	if (!empty($kd_smt)) {
		return $this->mutu->query("SELECT tmp_akd_status_mhs.nim,nama,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
	LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
	
	WHERE   tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi' AND status='A'AND reguler='0' 
	AND kd_smt=$kd_smt
	 AND angkatan BETWEEN 2013 AND 2017 GROUP BY  nama,tmp_akd_status_mhs.nim, tgl_masuk ")->result_array();
	}else{
		return $this->mutu->query("SELECT tmp_akd_status_mhs.nim,nama,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
	LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
	
	WHERE  tmp_akd_d_mahasiswa.kd_prodi='$kode_prodi' AND status='A'AND reguler='0' 
	AND kd_smt>1
	 AND angkatan BETWEEN 2013 AND 2017 GROUP BY  nama,tmp_akd_status_mhs.nim, tgl_masuk ")->result_array();
	}
}

public function dat_calon_mahasiswa($data)
{
	$kd_ta=$data['ts'];
	$jenjang=$data['jenjang'];
	$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
return $this->mutu->query("SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE kd_ta= $pltah AND jenjang='$jenjang' ")->result_array();
}
public function dat_lulus_calon_mahasiswa($data)
{
	$tahun=$data['ts'];
	$jenjang=$data['jenjang'];
	$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
return $this->mutu->query("SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS total_lulus FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE kd_ta= $pltah AND jenjang='$jenjang' AND lulus_seleksi='Y' ")->result_array();
}
public function dayatampung($data)
{ 
	$tahun=$data['ts'];
	$jenjang=$data['jenjang'];

$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	return $this->mutu->query("SELECT count(daya_tampung) FROM tmp_adm_jalur
INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE kd_ta= $pltah AND jenjang='$jenjang' ")->result_array();
}
public function tot_lul_sel()
{
	return $this->mutu->query("SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS total_lulus FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE lulus_seleksi='Y'
")->result_array();
}
public function tot_sel()
{
	return $this->mutu->query("SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis")->result_array();
}
public function tot_dayatampung()
{
	return $this->mutu->query("SELECT count(DISTINCT daya_tampung) FROM tmp_adm_jalur
INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis")->result_array();
}
public function detail_llls_slksi($data)
{

$tahun=$data['ts'];
	$jenjang=$data['jenjang'];

$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}

	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE lulus_seleksi='Y'
  AND d.kd_prodi= h.kd_prodi AND kd_ta= $pltah AND jenjang='$jenjang' ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}

public function slks_dytmpng($data)
{

$tahun=$data['ts'];
	$jenjang=$data['jenjang'];

$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}

	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_jalur 
INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE d.kd_prodi= h.kd_prodi AND kd_ta=2013 AND jenjang='S1' ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}
public function dy_tmpng($data)
{

$tahun=$data['ts'];
	$jenjang=$data['jenjang'];

$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}

	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT daya_tampung)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE d.kd_prodi= h.kd_prodi AND kd_ta= $pltah AND jenjang='$jenjang' ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}
public function detail_slksi($data)
{

$tahun=$data['ts'];
	$jenjang=$data['jenjang'];

$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}

	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE 
  d.kd_prodi= h.kd_prodi AND kd_ta= $pltah AND jenjang='$jenjang' ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}


public function dtl2_lls_slksi($data)
{

$tahun=$data['ts'];
	$jenjang=$data['jenjang'];
$kd_prodi=$data['kd_prodi'];
$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}

	return $this->mutu->query("SELECT * FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE kd_ta= $pltah AND jenjang='$jenjang' AND lulus_seleksi='Y' AND tmp_adm_calon.kd_prodi='$kd_prodi'")->result_array();
}
public function dtl2_ikt_slksi($data)
{

$tahun=$data['ts'];
	$jenjang=$data['jenjang'];
$kd_prodi=$data['kd_prodi'];
$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}

	return $this->mutu->query("SELECT no_pmb,nama,tgl_seleksi,seleksi,daya_tampung FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE kd_ta= $pltah AND jenjang='$jenjang'  AND tmp_adm_calon.kd_prodi='$kd_prodi'")->result_array();
}

public function all_ttl_dtl1_dy_tmpng()
{
	$taunini=2017;
	$taunsebelumnya=$taunini-4;

	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT daya_tampung)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE d.kd_prodi= h.kd_prodi AND  kd_ta BETWEEN $taunsebelumnya  AND $taunini ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}

public function all_ttl_dtl1_ikt_slsksi()
{

	$taunini=2017;
	$taunsebelumnya=$taunini-4;



	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE 
  d.kd_prodi= h.kd_prodi AND kd_ta BETWEEN $taunsebelumnya  AND $taunini ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}

public function all_ttl_dtl1_lls_slsksi()
{



	$taunini=2017;
	$taunsebelumnya=$taunini-4;



	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE lulus_seleksi='Y'
  AND d.kd_prodi= h.kd_prodi AND kd_ta BETWEEN $taunsebelumnya  AND $taunini   ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}
public function dtl2_all($data)
{
	$kd_prodi=$data['kd_prodi'];
return $this->mutu->query("SELECT no_pmb,nama,tgl_seleksi,seleksi,daya_tampung FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE  tmp_adm_calon.kd_prodi='$kd_prodi'")->result_array();
}
public function ikt_slksi_all()
{
	$taunini=2017;
	$taunsebelumnya=$taunini-4;

	return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi d on tmp_adm_calon.kd_prodi=d.kd_prodi 
INNER JOIN tmp_akd_master_jenis on d.kd_jenis = tmp_akd_master_jenis.kd_jenis WHERE 
  d.kd_prodi= h.kd_prodi kd_ta BETWEEN $taunsebelumnya  AND $taunini) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC")->result_array();
}
public function all_lls_slksi2($data)
{
	$kd_prodi=$data['kd_prodi'];
	return $this->mutu->query("SELECT no_pmb,nama,tgl_seleksi,seleksi,daya_tampung FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis on tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
WHERE lulus_seleksi='Y' AND tmp_adm_calon.kd_prodi='$kd_prodi'")->result_array();
}
public function data_sem_lima($data)
{
	$tahun=$data['ts'];
	$enjang=$data['jenjang'];
	$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
		$taunini=2017;
	$taunsebelumnya=$taunini-4;

	return $this->mutu->query("SELECT DISTINCT jenjang, urut,nm_jenis, (SELECT count(daya_tampung) FROM tmp_adm_jalur
INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis aa on tmp_akd_master_prodi.kd_jenis = aa.kd_jenis
WHERE kd_ta= $pltah AND aa.jenjang=bb.jenjang)AS dya_tampung,(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ab on tmp_akd_master_prodi.kd_jenis = ab.kd_jenis
WHERE kd_ta= $pltah AND ab.jenjang=bb.jenjang)AS ikut_slksi,(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS total_lulus FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ac on tmp_akd_master_prodi.kd_jenis = ac.kd_jenis
WHERE kd_ta= $pltah AND ac.jenjang=bb.jenjang AND lulus_seleksi='Y')AS lls_slksi,(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ad ON 
tmp_akd_master_prodi.kd_jenis=ad.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ad.jenjang=bb.jenjang 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=1 AND reguler='1')AS maba_reguler,(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ae ON 
tmp_akd_master_prodi.kd_jenis=ae.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ae.jenjang= bb.jenjang
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=1 AND reguler='0')AS maba_trnsf, 
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis af ON 
tmp_akd_master_prodi.kd_jenis=af.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE af.jenjang= bb.jenjang 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND reguler='1')AS total_reg,
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ag ON 
tmp_akd_master_prodi.kd_jenis=ag.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE  ag.jenjang= bb.jenjang 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah  AND reguler='0') AS total_trnsfr
FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis bb ON 
tmp_akd_master_prodi.kd_jenis=bb.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
WHERE status='A'  AND jenjang ='$enjang' AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya AND $taunini GROUP BY jenjang, urut,nm_jenis
ORDER BY urut")->result_array();
}
public function total_semua($data)
{
	$nama_jenis=$data['nm_jenis'];
	// return '$nama_jenis';
		$taunini=2017;
	$taunsebelumnya=$taunini-4;
	$a=$this->mutu->query("SELECT nm_jenis, (SELECT count( DISTINCT daya_tampung) FROM tmp_adm_jalur
INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis aa on tmp_akd_master_prodi.kd_jenis = aa.kd_jenis WHERE aa.nm_jenis=bb.nm_jenis) AS dya_tampung,

(SELECT count( DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ab on tmp_akd_master_prodi.kd_jenis = ab.kd_jenis 
 WHERE ab.nm_jenis=bb.nm_jenis ) AS ikut_slksi,

 (SELECT count( DISTINCT tmp_adm_calon.no_pmb)AS total_lulus FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis abb on tmp_akd_master_prodi.kd_jenis = abb.kd_jenis
WHERE lulus_seleksi='Y' AND abb.nm_jenis=bb.nm_jenis) AS lls_slksi,

(SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ac ON 
tmp_akd_master_prodi.kd_jenis=ac.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ac.nm_jenis=bb.nm_jenis AND status='A'
 AND reguler='1' AND  kd_smt=1 AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017) 
 AS maba_reguler,

 (SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ad ON 
tmp_akd_master_prodi.kd_jenis=ad.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ad.nm_jenis=bb.nm_jenis AND status='A'AND reguler='0' 
  AND  kd_smt=1  AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013  AND 2017 ) AS maba_trnsf,

  (SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ag ON 
tmp_akd_master_prodi.kd_jenis=ag.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ag.nm_jenis=bb.nm_jenis AND reguler='1'
AND status='A'  AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013  AND 2017) AS total_reg,

(SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ae ON 
tmp_akd_master_prodi.kd_jenis=ae.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ae.nm_jenis=bb.nm_jenis AND  reguler='0'
AND status='A'  AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013  AND 2017 )AS total_trnsfr

 FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis bb ON 
tmp_akd_master_prodi.kd_jenis=bb.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
WHERE status='A' AND nm_jenis='$nama_jenis' AND jenjang NOTNULL AND tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017 
GROUP BY nm_jenis
")->result_array();

if (count($a)==0) {
		$a[]=array('nm_jenis'=>$nm_jenis,'dya_tampung'=>'0','ikut_slksi'=>'0','lls_slksi'=>'0','maba_reguler'=>'0','maba_trnsf'=>'0','total_reg'=>'0','total_trnsfr'=>'0');
	return $a;
	}else{
	return $a;
		
	}
}

public function total_total_ts($data)
{

	$tahun=$data['ts'];
	$nm_jenis=$data['nm_jenis'];
	$taunini=2017;
	// $taunsebelumnya=$taunini-4;
		if ($tahun=='TS-4') {
		$pltah=$taunini-4;
	}
	elseif ($tahun=='TS-3') {
		$pltah=$taunini-3;
		# code...
	}
	elseif ($tahun=='TS-2') {
		$pltah=$taunini-2;
		# code...
	}
	elseif ($tahun=='TS-1') {
		$pltah=$taunini-1;
		# code...
	}
	elseif ($tahun=='TS') {
		$pltah=$taunini;
		# code...
	}
	// kd_ta = $pltah AND (setelah where seperti ini (SELECT count(daya_tampung) FROM tmp_adm_jalur
/*INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis aa on tmp_akd_master_prodi.kd_jenis = aa.kd_jenis
WHERE kd_ta= $pltah AND aa.nm_jenis=bb.nm_jenis)AS dya_tampung,
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ab on tmp_akd_master_prodi.kd_jenis = ab.kd_jenis
WHERE kd_ta = $pltah AND ab.nm_jenis=bb.nm_jenis)AS ikut_slksi,
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS total_lulus FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ac on tmp_akd_master_prodi.kd_jenis = ac.kd_jenis
WHERE kd_ta= $pltah AND ac.nm_jenis=bb.nm_jenis AND lulus_seleksi='Y')AS lls_slksi*/
	$a= $this->mutu->query("

SELECT DISTINCT  nm_jenis, (SELECT count(daya_tampung) FROM tmp_adm_jalur
INNER JOIN tmp_adm_calon on tmp_adm_jalur.kd_jalur=tmp_adm_calon.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis aa on tmp_akd_master_prodi.kd_jenis = aa.kd_jenis
WHERE kd_ta= '$pltah' AND aa.nm_jenis=bb.nm_jenis)AS dya_tampung,
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS ikut_seleksi FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ab on tmp_akd_master_prodi.kd_jenis = ab.kd_jenis
WHERE kd_ta= '$pltah' AND ab.nm_jenis=bb.nm_jenis)AS ikut_slksi,
(SELECT count(DISTINCT tmp_adm_calon.no_pmb)AS total_lulus FROM tmp_adm_calon 
INNER JOIN tmp_adm_jalur on tmp_adm_calon.kd_jalur=tmp_adm_jalur.kd_jalur 
INNER JOIN tmp_akd_master_prodi on tmp_adm_calon.kd_prodi=tmp_akd_master_prodi.kd_prodi 
INNER JOIN tmp_akd_master_jenis ac on tmp_akd_master_prodi.kd_jenis = ac.kd_jenis
WHERE kd_ta= '$pltah' AND  ac.nm_jenis=bb.nm_jenis AND lulus_seleksi='Y')AS lls_slksi,
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ad ON 
tmp_akd_master_prodi.kd_jenis=ad.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ad.nm_jenis=bb.nm_jenis 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=1 AND reguler='1')AS maba_reguler,
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ae ON 
tmp_akd_master_prodi.kd_jenis=ae.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ae.nm_jenis= bb.nm_jenis
AND status='A' AND tmp_akd_d_mahasiswa.angkatan = $pltah AND kd_smt=1 AND reguler='0')AS maba_trnsf, 
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis af ON 
tmp_akd_master_prodi.kd_jenis=af.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE af.nm_jenis= bb.nm_jenis 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan =$pltah AND reguler='1')AS total_reg,
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ag ON 
tmp_akd_master_prodi.kd_jenis=ag.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE  ag.nm_jenis= bb.nm_jenis 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan =$pltah  AND reguler='0') AS total_trnsfr
FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis bb ON 
tmp_akd_master_prodi.kd_jenis=bb.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
WHERE status='A'  AND nm_jenis ='$nm_jenis'  GROUP BY nm_jenis")->result_array();
	if (count($a)==0) {
		$a[]=array('nm_jenis'=>$nm_jenis,'dya_tampung'=>'0','ikut_slksi'=>'0','lls_slksi'=>'0','maba_reguler'=>'0','maba_trnsf'=>'0','total_reg'=>'0','total_trnsfr'=>'0');
	}
	return $a;
}

public function cek_jenis($data)
{
	$nm_jenis=$data['nm_jenis'];
	return $this->mutu->query("SELECT count(tmp_akd_status_mhs.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis bb ON 
tmp_akd_master_prodi.kd_jenis=bb.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
WHERE status='A'  AND nm_jenis ='$nm_jenis' "  )->result_array();
}

public function tott_mah()
{
return $this->mutu->query("SELECT DISTINCT   
(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis af ON 
tmp_akd_master_prodi.kd_jenis=af.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE status='A'  AND reguler='1' AND tmp_akd_d_mahasiswa.angkatan=2017)AS jumlah_reguler,

(SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ag ON 
tmp_akd_master_prodi.kd_jenis=ag.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE   status='A'  AND reguler='0' AND tmp_akd_d_mahasiswa.angkatan = 2017) AS jumlah_transfer

FROM tmp_akd_d_mahasiswa ")->result_array();
}
public function dtl_jml_jenis2($data)
{
	$jenjang=$data['jenjang'];
	$kd_prodi=$data['kd_prodi'];
	
	return $this->mutu->query("
	


SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND kd_smt=1 AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND status='A'AND 
 tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017
	AND tmp_akd_d_mahasiswa.reguler ='1'
	GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk


	")->result_array();
}
public function tot_mh($data)
{
	$reguler=$data['jenjang'];
	return $this->mutu->query("SELECT kd_prodi,jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count( DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE  status='A' AND d.kd_prodi= h.kd_prodi AND reguler='1'  ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis ORDER BY total DESC"
)->result_array();
}
public function tot_mh2($data)
{
	$jenjang=$data['jenjang'];
	$kd_prodi=$data['kd_prodi'];
	$reguler=$data['reguler'];

	return $this->mutu->query("SELECT nama,tmp_akd_d_mahasiswa.nim,tgl_masuk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND tmp_akd_d_mahasiswa.kd_prodi='$kd_prodi' AND reguler='$reguler' AND kd_smt=1 AND status='A'
	GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_masuk")->result_array();
}
public function total_nm_jens($data)
{
	$nm_jenis=$data['nm_jenis'];
	$reguler=$data['reg'];
	$crumb=$data['crumb'];
	return $crumb;
// return $nm_jenis;
// 	return $data;
// $taunini=2017;
	// $taunsebelumnya=$taunini-4;
	// 	if ($tahun=='TS-4') {
	// 	$pltah=$taunini-4;
	// }
	// elseif ($tahun=='TS-3') {
	// 	$pltah=$taunini-3;
	// 	# code...
	// }
	// elseif ($tahun=='TS-2') {
	// 	$pltah=$taunini-2;
	// 	# code...
	// }
	// elseif ($tahun=='TS-1') {
	// 	$pltah=$taunini-1;
	// 	# code...
	// }
	// elseif ($tahun=='TS') {
	// 	$pltah=$taunini;
	// 	# code...
	// }
	// if ($reguler!='1') {
// 		return $this->mutu->query(" SELECT kd_prodi,jenjang,nm_fak,nm_prodi AS nama_prodi, 
// (SELECT count( DISTINCT nama)FROM tmp_akd_d_mahasiswa
// LEFT JOIN tmp_akd_master_prodi d
// ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
// d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
// d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$nama_jenis' 
// AND status='A'AND kd_smt=1 AND tmp_akd_d_mahasiswa.reguler ='$reguler' AND d.kd_prodi= h.kd_prodi AND 
//  tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017 ) AS total  
// FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
// ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
// LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
// LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='Akademik'

// ORDER BY total DESC ")->result_array();

// 	}else{
	if ($crumb='total_mahasiswa_reguler') {
	
		$a= $this->mutu->query(" SELECT kd_prodi,jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$nm_jenis' 
AND status='A'AND kd_smt!=1 AND tmp_akd_d_mahasiswa.reguler ='$reguler' AND d.kd_prodi= h.kd_prodi AND 
 tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017 ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$nm_jenis'
ORDER BY total DESC ")->result_array();
return $a;
	
	}
	elseif ($crumb='total_maba_reguler') {
			$a= $this->mutu->query(" SELECT kd_prodi,jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count( DISTINCT tmp_akd_d_mahasiswa.nim)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE nm_jenis='$nm_jenis' 
AND status='A'AND kd_smt =1 AND tmp_akd_d_mahasiswa.reguler ='$reguler' AND d.kd_prodi= h.kd_prodi AND 
 tmp_akd_d_mahasiswa.angkatan BETWEEN 2013 AND 2017 ) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis ON h.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE nm_jenis='$nm_jenis'
ORDER BY total DESC ")->result_array();
return $a;
	}







// 	}
	 
}
}




/* End of file m_sinkronkan.php */
/* Location: ./application/models/m_sinkronkan.php */