<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_Sinkron extends CI_Model
{
    public $variable;

    public function __construct()
    {
        parent::__construct();
        $this->mutu = $this->load->database('mutu');


    }

    // function create_coba_fauzi($data){
    // 	$return = $this->mutu->insert('mutu_master_prodi', $data);
    // 	return $return;
    // }

    public function data_ipepa($id_jenis)
    {
        return $this->mutu->query(
            " SELECT tmp_akd_master_prodi.kd_prodi, nm_prodi,nilai_huruf, nm_fak,kd_jenis,kd_akreditasi
			FROM public.tmp_akd_master_prodi LEFT join public.tmp_akd_master_jurusan ON tmp_akd_master_jurusan.kd_jur = tmp_akd_master_prodi.kd_jur
			LEFT join public.tmp_akd_master_fak ON tmp_akd_master_fak.kd_fak = tmp_akd_master_jurusan.kd_fak
			
			
			LEFT join akreditasi_master_data ON tmp_akd_master_prodi.kd_pddikti= akreditasi_master_data.kd_unit
			
			WHERE tmp_akd_master_prodi.tampil=1 and tmp_akd_master_prodi.kd_jenis='$id_jenis' and akreditasi_master_data.tampilkan='YA'
			"
        )->result_array();
    }
    public function ms_slm_api($kd_unit = '', $tgl_akreditasi)
    {
        // 		$sekarang=date("Y-m-d");
        // $kd_unit=$data['kd_unit'];
        // $tgl_akreditasi=$data['tgl'];
        // $tgl_kadaluarsa=$data['tgl_kadaluarsa'];

        // $newDate = date("Y-m-d", strtotime($tgl_akreditasi));
        // $date=date_create($tgl_akreditasi);
        // $newDate=date_format($date,"Y-m-d");
        $date = str_replace('/', '-', $tgl_akreditasi);
        $newDate = date('Y-m-d', strtotime($date));
        return $this->mutu->query("SELECT kd_akreditasi, kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, nomor_sk, tahun_sk, nomor_sertifikat, tgl_submit_sapto, tgl_input_borang, 
	lembaga_akreditasi.id_lembaga_akreditasi, lembaga_akreditasi.nm_lembaga_akreditasi,lembaga_akreditasi.nama_lembaga_s_1,lembaga_akreditasi.nama_lembaga_en,lembaga_akreditasi.nama_lembaga_en_s1
	,lembaga_akreditasi.nama_lembaga_ar,lembaga_akreditasi.nama_lembaga_ar_s1 FROM akreditasi_master_data 
	LEFT join lembaga_akreditasi ON akreditasi_master_data.kd_lembaga_kreditasi=lembaga_akreditasi.id_lembaga_akreditasi WHERE kd_unit='$kd_unit' AND tgl_akreditasi<='$newDate' AND tgl_kadaluarsa>='$newDate'
	ORDER BY akreditasi_master_data.tgl_kadaluarsa DESC LIMIT 1
	")->result_array();
    }
    public function ms_slm_api_prd($kd_unit = '', $tgl_akreditasi)
    {
        // 		$sekarang=date("Y-m-d");
        // $kd_unit=$data['kd_unit'];
        // $tgl_akreditasi=$data['tgl'];
        // $tgl_kadaluarsa=$data['tgl_kadaluarsa'];

        // $newDate = date("Y-m-d", strtotime($tgl_akreditasi));
        // $date=date_create($tgl_akreditasi);
        // $newDate=date_format($date,"Y-m-d");
        // return 'kd_unit kosong';

        $date = str_replace('/', '-', $tgl_akreditasi);
        $newDate = date('Y-m-d', strtotime($date));
        if (empty($kd_unit)) {
            return 'kd_unit kosong';
        } elseif (empty($tgl_akreditasi)) {
            return 'tanggal kosong';

        }
        // return 'kd_unit kosonaag';

        return $this->mutu->query("SELECT lembaga_akreditasi.id_lembaga_akreditasi, lembaga_akreditasi.nm_lembaga_akreditasi,lembaga_akreditasi.nama_lembaga_s_1,lembaga_akreditasi.nama_lembaga_en,lembaga_akreditasi.nama_lembaga_en_s1
	,lembaga_akreditasi.nama_lembaga_ar,lembaga_akreditasi.nama_lembaga_ar_s1, kd_akreditasi, akreditasi_master_data.kd_unit, tmp_akd_master_fak.kd_fak,
	akreditasi_master_data.kd_prodi, nm_fak, nm_prodi,nm_prodi_en,nm_prodi_ar,tgl_akreditasi,tmp_akd_master_jenis.kd_jenis,tgl_kadaluarsa,nomor_sk,tgl_izin,nilai_huruf, maks_studi,nilai_angka,jenjang,kd_lembaga_kreditasi FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
	ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
	INNER JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
	INNER JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	INNER JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
	INNER JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak  
	INNER join lembaga_akreditasi ON akreditasi_master_data.kd_lembaga_kreditasi=lembaga_akreditasi.id_lembaga_akreditasi
	WHERE tmp_akd_master_prodi.kd_prodi='$kd_unit' AND tgl_akreditasi<='$newDate' AND tgl_kadaluarsa>='$newDate' AND ck_luar_negri ISNULL ORDER BY akreditasi_master_data.tgl_kadaluarsa DESC LIMIT 1 	")->result_array();
    }
    public function sinkron()
    {
        $query = "SELECT * FROM tmp_akd_sumber_prodi";
        $sql = $this->mutu->query($query);
        return $sql->result_array();

    }
    public function abraham($value)
    {
        $return = $this->mutu->insert('tmp_akd_sumber_prodi', $value);
        return $return;
    }

    public function coba_hapus()
    {
        $query = "TRUNCATE tmp_akd_sumber_prodi";
        $sql = $this->mutu->query($query);
        return $sql->result_array();

    }
    public function datath()
    {
        $query = "SELECT * FROM (
  SELECT 
    DISTINCT ON (nm_jenis) nm_jenis,urut
  FROM tmp_akd_master_jenis WHERE urut BETWEEN 1 AND 10
  ORDER BY nm_jenis, urut DESC
)as t
ORDER BY t.urut ASC  ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
        // $query1="SELECT jenjang FROM tmp_akd_master_jenis WHERE ";
        // $sql1=$sql->kd_jenis;
        // foreach ($sql as $key ) {
        // // $data_jen="SELECT count (DISTINCT jenjang) from tmp_akd_master_jenis WHERE nm_jenis = $key['nm_jenis'] ";
        // // $hasil=$key['nm_jenis'];
        // 	return $key;
        // }



    }
    public function datath_dwa()
    {
        $query = "SELECT  jenjang,nm_jenis  FROM tmp_akd_master_jenis WHERE urut BETWEEN 1 AND 10
ORDER BY urut  ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
        // $query1="SELECT jenjang FROM tmp_akd_master_jenis WHERE ";
        // $sql1=$sql->kd_jenis;
        // foreach ($sql as $key ) {
        // // $data_jen="SELECT count (DISTINCT jenjang) from tmp_akd_master_jenis WHERE nm_jenis = $key['nm_jenis'] ";
        // // $hasil=$key['nm_jenis'];
        // 	return $key;
        // }



    }
    public function semua()
    {
        $query = "SELECT *  FROM tmp_akd_master_jenis   ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function hitung_data()
    {
        # code...
    }
    // public function tes_dokumentasi($value='')
    // {

    // 		$query="SELECT * FROM aspek_dokumentasi";
    // 	$sql = $this->mutu->query($query);
    // 	return $sql->result_array();
    // }
    public function cl_mahasiswa()
    {
        $query = "SELECT jenjang  FROM tmp_akd_master_jenis   ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function data_url_3_1_5()
    {
        $query = "SELECT DISTINCT nm_jenis,jenjang  FROM tmp_akd_master_jenis ORDER BY nm_jenis";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function tot_akre_A()
    {
        $query = "SELECT COUNT(akreditasi_master_data.nilai_huruf),tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut  FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'A' GROUP BY tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut ORDER by tmp_akd_master_jenis.urut";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function all_akr_A()
    {

        $query = "SELECT COUNT(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'A' ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function tot_akre_B()
    {
        $query = "SELECT COUNT(akreditasi_master_data.nilai_huruf),tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut  FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'B' GROUP BY tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut ORDER by tmp_akd_master_jenis.urut";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function all_akr_B()
    {

        $query = "SELECT COUNT(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'B' ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function tot_akre_C()
    {
        $query = "SELECT COUNT(akreditasi_master_data.nilai_huruf),tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut  FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'C' GROUP BY tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut ORDER by tmp_akd_master_jenis.urut";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function all_akr_C()
    {

        $query = "SELECT COUNT(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'C' ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function tot_akre_kadaluarsa()
    {
        $sekarang = date("Y-m-d");
        $query = "SELECT count(akreditasi_master_data.tgl_kadaluarsa),tmp_akd_master_jenis.jenjang, tmp_akd_master_jenis.urut FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.tgl_kadaluarsa <'$sekarang' GROUP BY tmp_akd_master_jenis.jenjang,  tmp_akd_master_jenis.urut ORDER BY  tmp_akd_master_jenis.urut ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function tot_all_akre_kadaluarsa()
    {
        $sekarang = date("Y-m-d");
        $query = "SELECT count(akreditasi_master_data.tgl_kadaluarsa) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.tgl_kadaluarsa <'$sekarang'  ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function api_kadaluarsa()
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
		ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $xs1 = $this->mutu->query("SELECT tgl_mulai FROM public.tgl_acuan where status =1")->result_array();
            $sekarang1 = $xs1[0]['tgl_mulai'];

            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang1 = date("Y-m-d");
            $sekarang = date("Y-m-d");

        }
        // $sekarang=date("Y-m-d");

        return $this->mutu->query("SELECT kd_akreditasi, tmp_akd_master_prodi.nm_prodi, tmp_akd_master_fak.kd_fak,tmp_akd_master_fak.nm_fak,akreditasi_master_unit.nm_unit,akreditasi_master_data.nilai_huruf,akreditasi_master_data.nilai_angka,
akreditasi_master_data.tgl_akreditasi, akreditasi_master_data.tgl_kadaluarsa,tmp_akd_master_prodi.tgl_izin,tmp_akd_master_jenis.jenjang,
akreditasi_master_data.nomor_sk,  
tmp_akd_master_jenis.kd_jenis FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
 INNER JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
 INNER JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
  WHERE akreditasi_master_data.tgl_kadaluarsa >  '$sekarang1' AND akreditasi_master_data.tgl_kadaluarsa < '$sekarang'
  GROUP BY kd_akreditasi,tmp_akd_master_jenis.jenjang,
  tmp_akd_master_jenis.kd_jenis ,akreditasi_master_data.tgl_akreditasi,tmp_akd_master_jenis.jenjang,
  akreditasi_master_data.tgl_kadaluarsa,akreditasi_master_unit.nm_unit, akreditasi_master_data.nilai_huruf,
  akreditasi_master_data.nilai_angka,akreditasi_master_data.nilai_angka, akreditasi_master_data.nomor_sk,
  tmp_akd_master_prodi.tgl_izin,tmp_akd_master_fak.kd_fak,tmp_akd_master_fak.nm_fak, tmp_akd_master_prodi.nm_prodi
  ORDER BY  tmp_akd_master_jenis.urut")->result_array();
    }
    public function tot_akre_belum_terakre()
    {
        # code...
    }
    public function mahasiswa_dan_lulusan()
    {
        $query = "SELECT urut,maks_studi,jenjang FROM tmp_akd_master_jenis WHERE maks_studi IS NOT NULL  ORDER BY urut ";

        $sql = $this->mutu->query($query)->result_array();
        return $sql;
    }
    public function semua_data_b()
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }

        return $this->mutu->query("SELECT tmp_akd_master_prodi.kd_jenis,  akreditasi_master_unit.kd_unit, kd_pddikti, jenjang,nm_unit, tgl_akreditasi, tgl_kadaluarsa,nilai_huruf, nilai_angka, nomor_sk,tgl_izin
 FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
 WHERE akreditasi_master_data.nilai_huruf= 'B'  AND tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND  tampilkan ='YA' ORDER BY tmp_akd_master_prodi.kd_jenis ")->result_array();
    }
    public function semua_data_a()
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }

        return $this->mutu->query(" SELECT tampilkan , tmp_akd_master_prodi.kd_jenis,  akreditasi_master_unit.kd_unit, kd_pddikti, jenjang,nm_unit, tgl_akreditasi, tgl_kadaluarsa,nilai_huruf, nilai_angka, nomor_sk,tgl_izin
		FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
	   ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
	   tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
		tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
		WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND  tampilkan ='YA' AND akreditasi_master_data.nilai_huruf= 'A'  AND tampilkan ='YA'  ORDER BY tmp_akd_master_prodi.kd_jenis  ")->result_array();
    }
    public function semua_data_c()
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }
        return $this->mutu->query(" SELECT tmp_akd_master_prodi.kd_jenis,  akreditasi_master_unit.kd_unit, kd_pddikti, jenjang,nm_unit, tgl_akreditasi, tgl_kadaluarsa,nilai_huruf, nilai_angka, nomor_sk,tgl_izin
 FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
 WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND  tampilkan ='YA' AND akreditasi_master_data.nilai_huruf= 'C'   ORDER BY tmp_akd_master_prodi.kd_jenis ")->result_array();
    }
    public function terakreditasi_S3()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='S3'")->result_array();
    }
    public function terakreditasi_S2()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='S2'")->result_array();
    }
    public function terakreditasi_S1()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='S1'")->result_array();
    }
    public function terakreditasi_sp2()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='SP-2'")->result_array();
    }
    public function terakreditasi_sp1()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='SP-1'")->result_array();
    }
    public function terakreditasi_prof()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='prof'")->result_array();
    }
    public function terakreditasi_d4()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='D4'")->result_array();
    }
    public function terakreditasi_d3()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='D3'")->result_array();
    }
    public function terakreditasi_d2()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='D2'")->result_array();
    }
    public function terakreditasi_d1()
    {
        return $this->mutu->query("SELECT nm_unit,nm_prodi,nilai_huruf,jenis,jenjang FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='D1'")->result_array();
    }
    public function prodi_jenis_S3()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND jenjang='S3'")->result_array();
    }
    public function prodi_jenis_S2()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE  jenjang='S2'")->result_array();
    }
    public function prodi_jenis_S1()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='S1'")->result_array();
    }
    public function prodi_jenis_sp2()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='SP-2'")->result_array();
    }
    public function prodi_jenis_sp1()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='SP-1'")->result_array();
    }
    public function prodi_jenis_prof()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='prof'")->result_array();
    }
    public function prodi_jenis_D4()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='D4'")->result_array();
    }
    public function prodi_jenis_D3()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='D3'")->result_array();
    }
    public function prodi_jenis_D2()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='D2'")->result_array();
    }
    public function prodi_jenis_D1()
    {
        return $this->mutu->query("SELECT  tmp_akd_master_jenis.kd_jenis,jenjang, nm_prodi,kd_prodi FROM tmp_akd_master_jenis INNER JOIN tmp_akd_master_prodi on 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE jenjang='D1'")->result_array();
    }
    public function api_sem()
    {
        return $this->mutu->query("SELECT akreditasi_master_unit.kd_unit, kd_pddikti, jenjang,nm_unit, tgl_akreditasi, tgl_kadaluarsa,nilai_huruf, nilai_angka, nomor_sk,tgl_izin
FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON
  tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis ")->result_array();
    }
    public function jen_fak()
    {
        return $this->mutu->query("SELECT * FROM public.tmp_akd_master_fak
ORDER BY kd_fak ASC ")->result_array();
    }
    public function data_akrd_fak()
    {
        return $this->mutu->query("SELECT kd_pddikti,tmp_akd_master_fak.kd_fak, nm_fak,nm_jur,nm_prodi,
tgl_akreditasi, tgl_kadaluarsa,nilai_huruf, nilai_angka, nomor_sk,tgl_izin,nomor_sertifikat,jenjang FROM
tmp_akd_master_fak LEFT JOIN tmp_akd_master_jurusan 
ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN akreditasi_master_unit ON akreditasi_master_unit.kd_unit=tmp_akd_master_prodi.kd_pddikti
LEFT JOIN akreditasi_master_data ON akreditasi_master_data.kd_unit=akreditasi_master_unit.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis ")->result_array();
    }
    public function cari_blm_ter_akrd()
    {
        return $this->mutu->query(" SELECT nm_fak, nm_prodi,tgl_akreditasi,tmp_akd_master_jenis.kd_jenis,tgl_kadaluarsa,nomor_sk,tgl_izin,nilai_huruf,jenjang, maks_studi,nilai_angka,jenjang FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak ")->result_array();
    }
    public function data_A_S3()
    {
        return $this->mutu->query("SELECT tmp_akd_master_fak.kd_fak,kd_prodi, nm_fak, nm_prodi,tgl_akreditasi,tmp_akd_master_jenis.kd_jenis,tgl_kadaluarsa,nomor_sk,tgl_izin,nilai_huruf, 
maks_studi,nilai_angka,jenjang FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.kd_jenis='1'AND nilai_huruf='A'")->result_array();
    }
    public function tot_akademik_kus($data)
    {
        $sekarang = date("Y-m-d");
        $jenis = $data['jenis'];
        $nilai = $data['nilai'];

        return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND nilai_huruf='$nilai' AND akreditasi_master_data.tgl_kadaluarsa >(SELECT tgl_acuan
	FROM public.tgl_acuan WHERE status='1')")->result_array();
    }
    public function tgl_acuana()
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {

            return $this->mutu->query("SELECT tgl_acuan
	FROM public.tgl_acuan WHERE status='1';")->result_array();
        } else {
            return array(array('tgl_acuan' =>  date("Y-m-D")) );
            // return array( date("Y-m-D"));
        }
    }
    // ==================================kadaluarsa
    public function tot_akademik_kus_kad($data)
    {
        // $data=$this->tgl_acuana();
        // date("Y-m-d")
        // $sekarang=date("Y-m-d");
        $jenis = $data['jenis'];


        return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND akreditasi_master_data.tgl_kadaluarsa >  (SELECT tgl_mulai
	FROM public.tgl_acuan WHERE status='1') AND akreditasi_master_data.tgl_kadaluarsa < (SELECT tgl_acuan
	FROM public.tgl_acuan WHERE status='1')")->result_array();
    }
    public function tot_akademik_kus_kad_asli($data)
    {
        // $data=$this->tgl_acuana();
        // date("Y-m-d")
        $sekarang = date("Y-m-d");
        $jenis = $data['jenis'];


        return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND  akreditasi_master_data.tgl_kadaluarsa <'$sekarang'")->result_array();
    }
    public function tot_akademik_kus_kad_all()
    {
        $sekarang = date("Y-m-d");

        return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE akreditasi_master_data.tgl_kadaluarsa >  (SELECT tgl_mulai
	FROM public.tgl_acuan WHERE status='1') AND akreditasi_master_data.tgl_kadaluarsa < (SELECT tgl_acuan
	FROM public.tgl_acuan WHERE status='1');")->result_array();
    }
    public function tot_akademik_kus_blm_akrditasi($data)
    {

        $jenis = $data['jenis'];


        return $this->mutu->query(" SELECT COUNT(tmp_akd_master_jenis.kd_jenis) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tgl_akreditasi ISNULL AND tmp_akd_master_jenis.jenjang='$jenis' ")->result_array();
    }
    public function tot_akademik_kus_blm_akrditasi_all()
    {

        return $this->mutu->query(" SELECT COUNT(tmp_akd_master_jenis.kd_jenis) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tgl_akreditasi ISNULL  ")->result_array();
    }
    public function tot_akademik_kus_sel_jen($data)
    {

        $jenis = $data['jenis'];


        return $this->mutu->query("SELECT COUNT(nm_prodi) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND akreditasi_master_data.tgl_kadaluarsa !=(SELECT tgl_acuan
	FROM public.tgl_acuan WHERE status='1'); ")->result_array();


    }
    // ==============================ini
    public function tot_akademik_kus_nil($data)
    {
        $sekarang = date("Y-m-d");

        $nilai = $data['nilai'];

        return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE  nilai_huruf='$nilai' AND akreditasi_master_data.tgl_kadaluarsa >(SELECT tgl_acuan
	FROM public.tgl_acuan WHERE status='1')")->result_array();
    }
    public function api_sem_bar()
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }
        return $this->mutu->query(" SELECT kd_akreditasi, akreditasi_master_data.kd_unit,akreditasi_master_data.tampilkan,akreditasi_master_data.tgl_submit_sapto,akreditasi_master_data.tgl_input_borang, tmp_akd_master_fak.kd_fak,tmp_akd_master_prodi.kd_prodi, 
			nm_fak, nm_prodi,tgl_akreditasi,tmp_akd_master_jenis.kd_jenis,tgl_kadaluarsa,nomor_sk,tgl_izin,nilai_huruf, maks_studi,nilai_angka,jenjang 
			FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
		ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
		INNER JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
		INNER JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
		INNER JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
		INNER JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak  
		AND  tampilkan ='YA' AND tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi and akreditasi_master_data.ck_luar_negri isnull ORDER by akreditasi_master_data.log_input desc, tmp_akd_master_prodi.nm_prodi ")->result_array();



    }
    public function tot_akademik_kus_all()
    {

        // $jenisa=2;
        // $nilaia='A';
        return $this->mutu->query("SELECT COUNT(nm_prodi) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
")->result_array();
    }

    public function test()
    {
        return $this->mutu->query("SELECT COUNT(jenjang) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis WHERE tmp_akd_master_jenis.kd_jenis='3'
")->result_array();
    }
    public function mah_dal_lim_th($data)
    {
        $jenjang = $data['jenjang'];
        $taunini = date("Y");
        $taunsebelumnya = $taunini - 4;
        // return'a';
        // return array('a'=>$jenjang);
        return $this->mutu->query("SELECT count(tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE jenjang='$jenjang' 
AND status='A' AND tmp_akd_d_mahasiswa.angkatan BETWEEN $taunsebelumnya AND $taunini
")->result_array();
    }

    // ========================================permintaan api toni=============================================
    public function totala()
    {

        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }

        return $this->mutu->query("SELECT count(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
 WHERE akreditasi_master_data.nilai_huruf= 'A' AND akreditasi_master_data.tgl_kadaluarsa >  '$sekarang' AND tampilkan ='YA' 
")->row_array();
    }

    public function totalb()
    {

        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }

        return $this->mutu->query("SELECT count(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
 WHERE akreditasi_master_data.nilai_huruf= 'B'AND akreditasi_master_data.tgl_kadaluarsa >  '$sekarang' AND tampilkan ='YA' 
")->row_array();
    }

    public function totalc()
    {
        return $this->mutu->query("SELECT count(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
 WHERE akreditasi_master_data.nilai_huruf= 'C'
")->row_array();
    }

    public function belum_terakreditasi()
    {
        return $this->mutu->query("SELECT count(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis   
 WHERE akreditasi_master_data.nilai_huruf is null
")->row_array();
    }
    // ====================================tgl_acuan===========================================

    public function tgl_acuan($data)
    {
        $tgl_acuan = $data['tgl_acuan'];
        $info_acuan = $data['info_acuan'];
        $status = $data['status'];
        $ket = $data['ket'];
        $log_pgw = $data['log_pgw'];
        $tgl_sebelumnya = $data['tgl_sebelumnya'];
        $log_input = date("Y-m-d H:i:s");
        // return array($data,$log_input);
        return $this->mutu->query("INSERT INTO public.tgl_acuan(tgl_mulai, tgl_acuan, info_acuan, status, ket, log_pgw,log_input)
	VALUES ('$tgl_sebelumnya','$tgl_acuan', '$info_acuan', '$status', '$ket', '$log_pgw','$log_input')
");
    }

    public function liat_acuan()
    {
        return $this->mutu->query("SELECT * FROM public.tgl_acuan")->result_array();
    }
    public function tmpl_updte_acuan($data)
    {
        $id = $data['id'];
        return $this->mutu->query("SELECT * FROM public.tgl_acuan WHERE id_acuan = $id")->result_array();
    }
    public function update_acuan($data)
    {
        $id = $data['id'];
        $tgl_mulai = $data['tgl_sebelumnya'];
        $tgl_acuan = $data['tgl_acuan'];
        $info_acuan = $data['info_acuan'];
        $status = $data['status'];
        $ket = $data['ket'];
        $log_pgw = $data['log_pgw'];
        $log_input = date("Y-m-d H:i:s");
        // return $data;
        // return 'array($tgl_mulai)';

        // return $this->mutu->query("UPDATE tgl_acuan
        // SET info_acuan='info'
        // WHERE id_acuan=39");
        return $this->mutu->query("UPDATE tgl_acuan
	SET tgl_mulai='$tgl_mulai', tgl_acuan='$tgl_acuan', info_acuan='$info_acuan', status='$status', ket='$ket', log_pgw='$log_pgw', log_input='$log_input'
	WHERE id_acuan=$id;
");
    }


    public function bese_64($data)
    {
        $kd_unit = $data['kd_unit'];

        return $this->mutu->query("SELECT kd_unit, nomor_sk,ekstensi_doc_sertifikat, ENCODE(doc_sertifikat, 'base64') 
		FROM public.akreditasi_master_data WHERE kd_akreditasi='$kd_unit'
ORDER BY kd_unit  ASC ")->result_array();
    }

    public function bese_64_sk($data)
    {
        $kd_unit = $data['kd_unit'];

        return $this->mutu->query("SELECT kd_unit, nomor_sk,ekstensi_sert_akrd, ENCODE(doc_sk, 'base64') 
		FROM public.akreditasi_master_data WHERE kd_akreditasi='$kd_unit'
ORDER BY kd_unit  ASC ")->result_array();
    }

    public function bese_64_check()
    {


        return $this->mutu->query("SELECT kd_unit, nomor_sk,ekstensi_doc_sertifikat, ENCODE(doc_sertifikat, 'base64') 
		FROM public.akreditasi_master_data WHERE kd_akreditasi='131'
ORDER BY kd_unit  ASC ")->result_array();
    }
    public function FunctionName($value = '')
    {
        return $this->mutu->query("SELECT *
	FROM public.tgl_acuan WHERE status='1'")->result_array();
    }
    public function b_d3()
    {
        return $this->mutu->query("SELECT akreditasi_master_data.kd_unit, tmp_akd_master_fak.kd_fak,kd_prodi,nm_fak,nm_prodi,tgl_akreditasi,tmp_akd_master_jenis.kd_jenis,tgl_kadaluarsa,nomor_sk,tgl_izin,nilai_huruf, maks_studi,nilai_angka,jenjang FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
WHERE jenjang ='D3'")->result_array();
    }
    public function hapus_acuan($data)
    {
        $id = $data['id'];
        return $this->mutu->query("DELETE FROM public.tgl_acuan
	WHERE id_acuan=$id;
");
    }

    public function thead_baru($data)
    {
        $cek = $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
	ORDER BY id ASC ")->result_array();
        if ($cek[0]['acuannya'] == 'YA') {
            $xs = $this->mutu->query("SELECT tgl_acuan FROM public.tgl_acuan where status =1")->result_array();
            $sekarang = $xs[0]['tgl_acuan'];
        } else {
            $sekarang = date("Y-m-d");

        }

        // $sekarang=date("Y-m-d");

        $kd_jumlah_prdi = $data['kd_jumlah_prdi'];
        if ($kd_jumlah_prdi == 'semua') {
            return $this->mutu->query("SELECT count(nm_jenis) FROM tmp_akd_master_jenis WHERE urut in(1,2,3,6)")->result_array();		# code...
        } elseif ($kd_jumlah_prdi == 'sub') {
            # code...
            return $this->mutu->query("SELECT nm_jenis, count(*) as NUM FROM tmp_akd_master_jenis WHERE urut in(1,2,3,6)   GROUP BY nm_jenis ORDER BY nm_jenis
 ")->result_array();
        } elseif ($kd_jumlah_prdi == 'sub_sub') {
            return $this->mutu->query("SELECT jenjang, count(*) as NUM FROM tmp_akd_master_jenis WHERE urut in(1,2,3,6)  GROUP BY jenjang,urut  ORDER BY urut ")->result_array();
        } elseif ($kd_jumlah_prdi == 'kada' and !empty($data['jenis'])) {

            $jenis = $data['jenis'];
            return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND akreditasi_master_data.tgl_kadaluarsa > '$sekarang' AND akreditasi_master_data.tgl_kadaluarsa < '$sekarang'AND tampilkan='YA'")->result_array();
        } elseif ($kd_jumlah_prdi == 'blm_terakr') {
            $jenis = $data['jenis'];

            // 	return $this->mutu->query("SELECT COUNT(tmp_akd_master_jenis.kd_jenis) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit
            // ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
            // LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
            // LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
            // LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
            // LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
            // WHERE  akreditasi_master_data.kd_akreditasi NOTNULL AND akreditasi_master_data.nilai_angka ISNULL OR akreditasi_master_data.nilai_angka=0

            // AND tmp_akd_master_jenis.jenjang='$jenis'AND
            // tampilkan='YA'")->result_array();

            return $this->mutu->query("SELECT COUNT(kd_prodi) FROM public.yg_belum_inpt_sertifikat where jenjang ='$jenis' ")->result_array();


        } elseif ($kd_jumlah_prdi == 'total') {
            $jenis = $data['jenis'];

            // return
            $data = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND tampilkan='YA'")->result_array();

            $data2 = $this->mutu->query("SELECT COUNT(tmp_akd_master_jenis.kd_jenis) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tgl_akreditasi ISNULL AND tmp_akd_master_jenis.jenjang='$jenis' AND tampilkan='YA'")->result_array();
            $data3 = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_jenis.jenjang='$jenis' AND  tampilkan='YA'")->result_array();
            $ggg = $data[0]['count'] + $data2[0]['count'] + $data3[0]['count'];

            $jum_all = $this->mutu->query(" SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
	ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
	LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
	LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
	WHERE 
	 tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND  tampilkan='YA' and  tmp_akd_master_jenis.jenjang='$jenis'")->result_array();

            $ttl_prd_bru = $this->mutu->query("SELECT COUNT(kd_prodi) FROM public.yg_belum_inpt_sertifikat where jenjang ='$jenis' ")->result_array();
            $all_jum = $jum_all[0]['count'] + $ttl_prd_bru[0]['count'];
            // if($jum_all[0]['count'] == 0) {
            //     $all_jum =  $ttl_prd_bru[0]['count'];

            // }

            return array(array("count" => "$all_jum"));
        } elseif ($kd_jumlah_prdi == 'total_A' or $kd_jumlah_prdi == 'total_B' or $kd_jumlah_prdi == 'total_C' or $kd_jumlah_prdi == 'total_Baik' or $kd_jumlah_prdi == 'total_Baik_sekali' or $kd_jumlah_prdi == 'unggul') {//OR $kd_jumlah_prdi= 'total_Baik'

            if ($kd_jumlah_prdi == 'total_A') {
                # code...
                $nilai = 'A';

            } elseif ($kd_jumlah_prdi == 'total_B') {

                $nilai = 'B';

            } elseif ($kd_jumlah_prdi == 'total_C') {

                $nilai = 'C';

            } elseif ($kd_jumlah_prdi == 'total_Baik') {

                $nilai = 'Baik';

            } elseif ($kd_jumlah_prdi == 'total_Baik_sekali') {

                $nilai = 'Baik Sekali';

            } elseif ($kd_jumlah_prdi == 'unggul') {

                $nilai = 'Unggul';

            }
            $data = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE nilai_huruf='$nilai'AND tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND tampilkan='YA'")->result_array();
            return $data;

        } elseif ($kd_jumlah_prdi == 'total_akreditasi_kadaluarsa') {
            $data = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE akreditasi_master_data.tgl_kadaluarsa >  '$sekarang 'AND tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND akreditasi_master_data.tgl_kadaluarsa < '$sekarang' AND tampilkan='YA'")->result_array();
            return $data;

        } elseif ($kd_jumlah_prdi == 'total_Belum_terakreditasi') {
            return $this->mutu->query(
                "SELECT COUNT(kd_prodi) FROM public.yg_belum_inpt_sertifikat




"
            )->result_array();

        } elseif ($kd_jumlah_prdi == 'tottal_tottal') {

            $data = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND akreditasi_master_data.tgl_kadaluarsa >'$sekarang'AND tampilkan='YA'")->result_array();

            $data2 = $this->mutu->query("SELECT COUNT(tmp_akd_master_jenis.kd_jenis) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND tampilkan='YA' AND nilai_angka =0 ")->result_array();//data yang belum ter akreditasi

            $data3 = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND  akreditasi_master_data.tgl_kadaluarsa >  '$sekarang'
 AND akreditasi_master_data.tgl_kadaluarsa < '$sekarang' AND tampilkan='YA'")->result_array();
            $ggg = $data[0]['count'] + $data2[0]['count'] + $data3[0]['count'];
            // return array(array("count"=>"$ggg"));


            $alll = $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
			ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
			LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
			LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
			LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
			LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
			WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND  tampilkan='YA'")->result_array();
            $h = $alll[0]['count'];

            $blm_diinputkan = $this->mutu->query("SELECT * FROM public.yg_belum_inpt_sertifikat ")->result_array();
            $blm_diinputkan = count($blm_diinputkan);
            $h = $h + $blm_diinputkan;

            return array(array("count" => "$h"));
        } else {
            $jenis = $data['jenis'];
            return $this->mutu->query("SELECT COUNT(nilai_huruf) FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
LEFT JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
LEFT JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi AND tmp_akd_master_jenis.jenjang='$jenis' AND nilai_huruf='$kd_jumlah_prdi' AND tampilkan='YA'")->result_array();

            // AND akreditasi_master_data.tgl_kadaluarsa >'$sekarang'

        }


    }
    public function data_toni()
    {
        return $this->mutu->query("SELECT nm_unit,tgl_izin, akreditasi_master_unit.jenis, kd_akreditasi,akreditasi_master_data.kd_unit,
	tgl_akreditasi, tgl_kadaluarsa, nomor_sk, nilai_huruf, nilai_angka,tampilkan
	 FROM akreditasi_master_unit 
	LEFT JOIN akreditasi_master_data 
	ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
	LEFT JOIN tmp_akd_master_pt ON akreditasi_master_unit.kd_unit=tmp_akd_master_pt.kd_pddikti
	WHERE akreditasi_master_data.kd_unit ='201002' AND akreditasi_master_data.tampilkan='YA'
 ")->row_array();
    }

    public function aktifkan_tabel($data)
    {
        $acuannya = $data['acuannya'];

        // return'a';
        // return array('a'=>$jenjang);
        $kembali = $this->mutu->query("UPDATE public.acuan_tanggal_acuan
	SET acuannya='$acuannya'
	WHERE id=1
");
        if ($kembali) {
            if ($acuannya == 'YA') {
                return 'Acuan Tanggal Berhasil di aktifkan';
            } else {
                return 'Acuan Tanggal Berhasil di Matikan';
            }
        }
    }
    public function check_aktif()
    {
        return $this->mutu->query("SELECT acuannya FROM public.acuan_tanggal_acuan
	ORDER BY id=1 ")->result_array();
        # code...
    }



}
// public function check_aktif ()
// {
// 	return $this->mutu->query("SELECT * FROM public.acuan_tanggal_acuan
// 	ORDER BY id ASC ")->result_array();
// 	# code...
// }

/* End of file sinkron.php */
/* Location: ./application/models/sinkron.php */
