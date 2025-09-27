<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tracer_5th_trahir extends CI_Model
{
    public $variable;

    public function __construct()
    {
        parent::__construct();
        $this->mutu = $this->load->database('mutu');


    }

    public function data_tracer($data)
    {

        $angkatan = $data['angkatan'];
        $skarang = date('Y');
        // $sebelumnya=$skarang-6;
        if ($angkatan == 'ts_6') {
            $angkatan = $skarang - 6;
        } elseif ($angkatan == 'ts_5') {
            $angkatan = $skarang - 5;

        } elseif ($angkatan == 'ts_4') {
            $angkatan = $skarang - 4;
        # code...
        } elseif ($angkatan == 'ts_3') {
            $angkatan = $skarang - 3;
        # code...
        } elseif ($angkatan == 'ts_2') {
            $angkatan = $skarang - 2;
        # code...
        } elseif ($angkatan == 'ts_1') {
            $angkatan = $skarang - 1;
        # code...
        } elseif ($angkatan == 'ts') {
            $angkatan = date('Y');
            # code...
        }

        // return array($angkatan);
        return $this->mutu->query("
SELECT (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
 EXTRACT(YEAR FROM tgl_lulus) = $angkatan  AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL )AS jumlah_lulusan ,  count(tmp_akd_d_mahasiswa.nim)AS jumlah_alumni_respon
FROM public.tmp_akd_d_alumni LEFT JOIN tmp_akd_d_mahasiswa ON tmp_akd_d_alumni.nim=tmp_akd_d_mahasiswa.nim
WHERE EXTRACT(YEAR FROM tgl_lulus) = $angkatan



			")->result_array();
    }
    public function detail1($data)
    {
        if (empty($data['angkatan'])) {
            $angkatan = '';
        } else {

            $angkatan = $data['angkatan'];
        }
        $jenjang = $data['alumni'];
        // return array($data);
        if (!empty($angkatan) and $jenjang == 'lulusan') {
            return $this->mutu->query("
 SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa 
 LEFT JOIN tmp_akd_d_alumni ON tmp_akd_d_mahasiswa.nim=tmp_akd_d_alumni.nim
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  
 LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur 
 LEFT JOIN tmp_akd_master_jenis scc ON 
d.kd_jenis=scc.kd_jenis
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE d.kd_prodi= h.kd_prodi  
 AND EXTRACT(YEAR FROM tgl_lulus) = $angkatan AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL
) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis sc ON h.kd_jenis=sc.kd_jenis
 ORDER BY total DESC
			")->result_array();
        } elseif (!empty($angkatan) and $jenjang == 'alumni_merespon') {
            return $this->mutu->query("
 SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_alumni 
 LEFT JOIN tmp_akd_d_mahasiswa ON tmp_akd_d_alumni.nim=tmp_akd_d_mahasiswa.nim
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  
 LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur 
 LEFT JOIN tmp_akd_master_jenis scc ON 
d.kd_jenis=scc.kd_jenis
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE d.kd_prodi= h.kd_prodi  
 AND EXTRACT(YEAR FROM tgl_lulus) = $angkatan AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL
) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis sc ON h.kd_jenis=sc.kd_jenis
 ORDER BY total DESC
			")->result_array();
        } elseif (empty($angkatan) and $jenjang == 'lulusan') {
            // return array('$angkatan');
            return $this->mutu->query("SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa 
 LEFT JOIN tmp_akd_d_alumni ON tmp_akd_d_mahasiswa.nim=tmp_akd_d_alumni.nim
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  
 LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur 
 LEFT JOIN tmp_akd_master_jenis scc ON 
d.kd_jenis=scc.kd_jenis
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE d.kd_prodi= h.kd_prodi  
 AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL
) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis sc ON h.kd_jenis=sc.kd_jenis
 ORDER BY total DESC")->result_array();
        } elseif (empty($angkatan) and $jenjang == 'alumni_merespon') {
            return $this->mutu->query("
 SELECT kd_prodi, jenjang,nm_fak,nm_prodi AS nama_prodi, 
(SELECT count(DISTINCT nama)FROM tmp_akd_d_alumni 
 LEFT JOIN tmp_akd_d_mahasiswa ON tmp_akd_d_alumni.nim=tmp_akd_d_mahasiswa.nim
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  
 LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur 
 LEFT JOIN tmp_akd_master_jenis scc ON 
d.kd_jenis=scc.kd_jenis
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
 WHERE d.kd_prodi= h.kd_prodi  
 AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL
) AS total  
FROM tmp_akd_master_prodi h LEFT JOIN tmp_akd_master_jurusan 
ON h.kd_jur=tmp_akd_master_jurusan.kd_jur
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
LEFT JOIN tmp_akd_master_jenis sc ON h.kd_jenis=sc.kd_jenis
 ORDER BY total DESC
			")->result_array();
        }


    }
    public function detail2($data)
    {
        $jenjang = $data['jenjang'];
        $kd_prodi = $data['kd_prodi'];
        $angkatan = $data['angkatan'];

        return $this->mutu->query("
SELECT nama,tmp_akd_d_mahasiswa.nim,jenjang,tgl_masuk,tgl_lulus,lama_studi ,ipk
	FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim
LEFT JOIN tmp_akd_master_prodi ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi
	LEFT JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	WHERE jenjang='$jenjang' AND  tmp_akd_master_prodi.kd_prodi='$kd_prodi' AND EXTRACT(YEAR FROM tgl_lulus) =$angkatan AND tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL 
	GROUP BY nama,tmp_akd_d_mahasiswa.nim,tgl_lulus,lama_studi,ipk,jenjang
			")->result_array();
    }
    public function jum_sem()
    {
        return $this->mutu->query("
SELECT (SELECT count(DISTINCT nama)FROM tmp_akd_d_mahasiswa
LEFT JOIN tmp_akd_master_prodi d
ON tmp_akd_d_mahasiswa.kd_prodi=d.kd_prodi  LEFT JOIN tmp_akd_master_jurusan ON
d.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ON 
d.kd_jenis=tmp_akd_master_jenis.kd_jenis 
LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
LEFT JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak WHERE 
 tmp_akd_d_mahasiswa.tgl_lulus IS NOT NULL )AS jumlah_lulusan ,  
  count(tmp_akd_d_mahasiswa.nim)AS jumlah_alumni_respon
FROM public.tmp_akd_d_alumni LEFT JOIN tmp_akd_d_mahasiswa ON tmp_akd_d_alumni.nim=tmp_akd_d_mahasiswa.nim

			")->result_array();
    }

    public function update($data)
    {
        // return $data;
        // $kd_unit=$data['kd_unit'];
        // $doc=$data['doc'];
        // $ekstensi=$data['ekstensi'];
        $kd_unit = $data['kd_id'];
        $tgl_akreditasi = $data['tgl_akreditasi'];
        $tgl_kadaluarsa = $data['tgl_kadaluarsa'];
        $nilai_huruf = $data['nilai_huruf'];
        $nilai_angka = $data['nilai_angka'];
        $nomor_sk = $data['nomor_sk'];
        $tahun_sk = $data['tahun_sk'];
        $nomor_sertifikat = $data['nomor_sertifikat'];
        // $tahun_sk=$data['thn_sk'];
        $doc_sk = $data['doc_sk'];
        $doc_sertifikat = $data['doc_sertifikat'];
        $tgl_diterima = $data['tgl_submit_sapto'];//tgl_pengajauan

        $tgl_input_borang = $data['tgl_input_borang'];//tgl diterima;
        $kd_lembaga_kreditasi = $data['kd_lembaga_kreditasi'];
        $log_pgw = $data['log_pgw'];
        $kd_ddikti = $data['ed_kd_unit'];
        // $log_input =$data['log_input'];
        $ekstensi_doc_sk = $data['ekstensi_doc_sk'];
        $ekstensi_sertif_akrd = $data['ekstensi_sertif_akrd'];
        // return $data;
        $tampilkan = $data['tampilkan'];

        if (empty($nomor_sertifikat)) {
            $noomor_sertifikat = $nomor_sk;
        } elseif (empty($nomor_sk)) {
            $noomor_sertifikat = $nomor_sertifikat;
        } else {
            $noomor_sertifikat = $nomor_sertifikat;

        }

        // return $noomor_sertifikat;SELECT kd_prodi	FROM public.tmp_akd_master_prodi WHERE kd_pddikti='60202'
        $kd_prd = $this->mutu->query("SELECT kd_prodi	FROM public.tmp_akd_master_prodi WHERE kd_pddikti='$kd_ddikti'")->result_array();
        $kd_prdi = $kd_prd[0]['kd_prodi'];
        if (empty($tgl_input_borang) && empty($tgl_diterima)) {
            $this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
		 tgl_akreditasi='$tgl_akreditasi',
	 tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
	 nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
	 doc_sertifikat='$doc_sertifikat',ekstensi_doc_sertifikat='$ekstensi_doc_sk',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
	
	  log_pgw='$log_pgw',kd_prodi='$kd_prdi'
	WHERE kd_akreditasi=$kd_unit ");

            return 'ok';
        } else {

            $this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
	tgl_akreditasi='$tgl_akreditasi',
tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
doc_sertifikat='$doc_sertifikat',ekstensi_doc_sertifikat='$ekstensi_doc_sk',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
 tgl_submit_sapto='$tgl_diterima', tgl_input_borang='$tgl_input_borang',
 log_pgw='$log_pgw',kd_prodi='$kd_prdi'
WHERE kd_akreditasi=$kd_unit ");

            return 'ok';
        }
        //  jika tanggal pengauan akreditasi,tanggal diterima , dokumen sk, dan dokumen sertifikat kosong
        // 	 if (empty($tgl_diterima) && empty($doc_sertifikat) && empty($doc_sk) && empty($tgl_input_borang)   ) {
        // 		// return $data;

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		 tgl_akreditasi='$tgl_akreditasi',
        // 	 tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	 nomor_sk='$noomor_sertifikat','nomor_sertifikat' ='$nomor_sertifikat', tahun_sk='$tahun_sk',
        // 	log_pgw='$log_pgw',tampilkan='$tampilkan'
        // 	WHERE kd_akreditasi='$kd_unit' ");
        // 	return 'ok';
        // 	 }
        // 	//  kalo tanggal diterima dan pengauan akreditasi dan sertifikat yang kosong

        // 	 elseif (empty($tgl_submit_sapto) && empty($tgl_input_borang) && empty($doc_sertifikat) ) {

        // 		// return $data;

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	ekstensi_doc_sertifikat='$ekstensi_doc_sk',

        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';
        // 	 }
        // 	 elseif (empty($tgl_input_borang) && empty($tgl_submit_sapto)   ) {
        // 		// return $data;
        // $this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // tgl_akreditasi='$tgl_akreditasi',
        // tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // doc_sertifikat='$doc_sertifikat',ekstensi_doc_sertifikat='$ekstensi_doc_sk',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // log_pgw='$log_pgw',tampilkan='$tampilkan'
        // WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';
        // 	 }
        // 	 elseif (empty($doc_sk) && empty($doc_sertifikat) ) {
        // 		// return $data;

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$nomor_sk',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',

        // 	 tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");

        // 		// return $arrayName = array('a' => 'a' );

        // return 'ok';
        // 	}
        // 	elseif (empty($tgl_input_borang) && empty($doc_sk)) {
        // 		# code...
        // 		// return $data;
        // 		// return 'data';

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',
        // 	doc_sertifikat='$doc_sertifikat',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // 	 tgl_submit_sapto='$tgl_submit_sapto',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';

        // 	}
        // 	elseif (empty($tgl_input_borang) && empty($doc_sertifikat)) {
        // 		# code...
        // 		// return 'data';
        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	ekstensi_doc_sertifikat='$ekstensi_doc_sk',
        // 	 tgl_submit_sapto='$tgl_submit_sapto',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';

        // 	}
        // 	elseif (empty($tgl_submit_sapto) && empty($doc_sk)) {
        // 		# code...
        // 		// return 'data';
        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',
        // 	doc_sertifikat='$doc_sertifikat',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // 	 tgl_input_borang='$tgl_input_borang',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';


        // 	}
        // 	elseif (empty($tgl_submit_sapto) && empty($doc_sertifikat)) {
        // 		# code...
        // 		// return 'data';

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	ekstensi_doc_sertifikat='$ekstensi_doc_sk',
        // 	  tgl_input_borang='$tgl_input_borang',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';

        // 	}
        // 	elseif (empty($tgl_input_borang)) {
        // 		//  return $data;
        // 		// return 'data';

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	doc_sertifikat='$doc_sertifikat',ekstensi_doc_sertifikat='$ekstensi_doc_sk',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // 	 tgl_submit_sapto='$tgl_submit_sapto',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';


        // 	 }
        // 	 elseif (empty($tgl_submit_sapto)) {
        // 		// return $data;
        // 		// return 'data';

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	doc_sertifikat='$doc_sertifikat',ekstensi_doc_sertifikat='$ekstensi_doc_sk',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // 	 tgl_input_borang='$tgl_input_borang',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 	return 'ok';


        // 	}

        // 	elseif (empty($doc_sk)) {
        // 		// return $data;
        // 		// return 'data';

        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',
        // 	doc_sertifikat='$doc_sertifikat',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // 	 tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit ");
        // 		// return $arrayName = array('a' => 'a' );

        // return 'ok';
        // 	}
        // 	elseif (empty($doc_sertifikat)) {
        // 		// return $data;
        // 		// return 'data';


        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		tgl_akreditasi='$tgl_akreditasi',
        // 	tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	ekstensi_doc_sertifikat='$ekstensi_doc_sk',
        // 	 tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        // 	 log_pgw='$log_pgw',tampilkan='$tampilkan'
        //    WHERE kd_akreditasi=$kd_unit  ");
        // 		// return $arrayName = array('a' => 'a' );

        // return 'ok';
        // 	}
        // 	else {
        // 		// return $data;
        // 		// return 'data';
        // // return    array('tgl_akreditasi' =>$tgl_akreditasi ,
        // // 'kd_lembaga_kreditasi' =>$kd_lembaga_kreditasi ,'tgl_kadaluarsa' =>$tgl_kadaluarsa ,'nilai_huruf'
        // //  =>$nilai_huruf ,'nilai_angka' => $nilai_angka ,'nomor_sk'=>$noomor_sertifikat,'nomor_sertifikat'=>$noomor_sertifikat,
        // //  'tahun_sk'=>$tahun_sk,'doc_sk'=>$doc_sk,'ekstensi_doc_sk'=>$ekstensi_doc_sk,'ekstensi_sertif_akrd'=>$ekstensi_sertif_akrd,
        // //  'tgl_submit_sapto'=>$tgl_submit_sapto,'tgl_input_borang'=>$tgl_input_borang,'log_pgw'=>$log_pgw,'tampilkan'=>$tampilkan,
        // // 'kd akreditasi'=>$kd_unit,'doc_sertifikat'=>$doc_sertifikat);
        //  		// return $doc_sk;
        // 		$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 		 tgl_akreditasi='$tgl_akreditasi',
        // 	 tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	 nomor_sk='$noomor_sertifikat',nomor_sertifikat ='$noomor_sertifikat', tahun_sk='$tahun_sk',doc_sk='$doc_sk',
        // 	 doc_sertifikat='$doc_sertifikat',ekstensi_doc_sertifikat='$ekstensi_doc_sk',ekstensi_sert_akrd='$ekstensi_sertif_akrd',
        // 	  tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        // 	  log_pgw='$log_pgw',tampilkan='$tampilkan'
        // 	WHERE kd_akreditasi=$kd_unit ");
        // 		// return $arrayName = array('a' => 'a' );
        // return 'ok';
        // 	}

        //  elseif (empty($tgl_submit_sapto) && empty($tgl_input_borang)  ) {

        // 	return $data;


        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	 tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sertifikat','nomor_sertifikat' ='$nomor_sertifikat', tahun_sk='$tahun_sk', doc_sk='$doc_sk',log_pgw='$log_pgw',
        //     ekstensi_doc_sertifikat='$ekstensi_doc_sk',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        //  }
        //  elseif (empty($tgl_submit_sapto) && empty($tgl_input_borang) && empty($nomor_sertifikat) ) {


        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	nomor_sertifikat='$nomor_sertifikat', tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',doc_sertifikat='$doc_sertifikat',
        //   log_pgw='$log_pgw',
        //     ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        //  }

        //  elseif (empty($doc_sk) && empty($doc_sertifikat) ) {

        // 	// return $data;


        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        //  tgl_akreditasi='$tgl_akreditasi', tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sertifikat','nomor_sertifikat' ='$nomor_sertifikat', tahun_sk='$tahun_sk',
        //   tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // 	return 'ok';

        //  }

        // elseif (empty($tgl_submit_sapto) && empty($nomor_sertifikat) ) {
        // 	// return 'adayang kosng';
        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',doc_sertifikat='$doc_sertifikat', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw',
        //     ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }

        //  elseif (empty($tgl_submit_sapto)) {
        // 	// return 'adayang kosng';
        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	nomor_sertifikat='$nomor_sertifikat', tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',doc_sertifikat='$doc_sertifikat', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw',
        //     ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }
        // elseif (empty($doc_sertifikat) && empty($nomor_sertifikat) ) {//okumen sk
        // 	// return $data;

        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',
        //   tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw', ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }

        // elseif (empty($doc_sertifikat)) {//okumen sk
        // 	// return $data;

        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	nomor_sertifikat='$nomor_sertifikat', tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',
        //   tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw', ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }
        // elseif (empty($doc_sk) && empty($nomor_sertifikat)) {//dokumensertifikat
        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk',doc_sertifikat='$doc_sertifikat',
        //   tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }

        // elseif (empty($doc_sk)) {//dokumensertifikat
        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	nomor_sertifikat='$nomor_sertifikat', tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk',doc_sertifikat='$doc_sertifikat',
        //   tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }

        // elseif (empty($tgl_input_borang) && empty($nomor_sertifikat) ) {
        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi', tgl_akreditasi='$tgl_akreditasi',
        // 	 tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        // 	 nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',doc_sertifikat='$doc_sertifikat',
        // 		tgl_submit_sapto='$tgl_submit_sapto',
        // 		log_pgw='$log_pgw',
        // 			ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // 	WHERE kd_akreditasi='$kd_unit' ");
        // 	return 'ok';
        // 	}
        // elseif (empty($tgl_input_borang)) {
        // $this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	nomor_sertifikat='$nomor_sertifikat', tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',doc_sertifikat='$doc_sertifikat',
        //   tgl_submit_sapto='$tgl_submit_sapto',
        //   log_pgw='$log_pgw',
        //     ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }
        //  else {

        // 	$this->mutu->query("UPDATE public.akreditasi_master_data SET kd_lembaga_kreditasi='$kd_lembaga_kreditasi',
        // 	nomor_sertifikat='$nomor_sertifikat', tgl_akreditasi='$tgl_akreditasi',
        //  tgl_kadaluarsa='$tgl_kadaluarsa', nilai_huruf='$nilai_huruf', nilai_angka=$nilai_angka,
        //  nomor_sk='$nomor_sk', tahun_sk='$tahun_sk', doc_sk='$doc_sk',doc_sertifikat='$doc_sertifikat',
        //   tgl_submit_sapto='$tgl_submit_sapto', tgl_input_borang='$tgl_input_borang',
        //   log_pgw='$log_pgw',
        //     ekstensi_doc_sertifikat='$ekstensi_doc_sertifikat', ekstensi_sert_akrd='$ekstensi_sert_akrd',tampilkan='$tampilkan'
        // WHERE kd_akreditasi='$kd_unit' ");
        // return 'ok';
        // }
        // $doc=base64_encode(file_get_contents($doca));
        // return array($nomor_sertifikat,$kd_lembaga_kreditasi,$kd_unit,$tgl_akreditasi,$tgl_kadaluarsa,$nilai_huruf,$nilai_angka,$nomor_sk,
        // $tahun_sk,$doc_sk,
        // $doc_sertifikat,$tgl_submit_sapto,$tgl_input_borang,$log_pgw,$ekstensi_doc_sertifikat,
        // $ekstensi_sert_akrd,$tampilkan);

        // return array('$doc_sertifikat');
        // return $kd_unit;
        // return array('ok');

        // if ($data) {
        // return $arrayName = array('a' => 'a' );
        // }
        // else{
        // return 'gak masuk';
        // }
    }
    public function update_tampilkan($data)
    {
        $tampilkan = $data['data'];
        $kd_akreditasi = $data['kd_akreditasi'];
        // $kd_unit=$data['kd_unit'];

        $this->mutu->query("UPDATE public.akreditasi_master_data SET tampilkan='$tampilkan'
		WHERE kd_akreditasi ='$kd_akreditasi' ");
    }

    public function insert($data)
    {
        // return $data;
        // return array($data['id_fak']);

        // if ($data['id_fak']==03) {
        // 	// return 1111;
        // 	return array($data['id_fak']);
        // }

        if ($data['id_fak'] != 201002) {
            $NM_PRODI_ASING = '';

            $KD_PRODI = $data['KD_PRODI'];
            if (!empty($data['NM_PRODI_ASING'])) {
                $NM_PRODI_ASING = $data['NM_PRODI_ASING'];
            }
            // return array($data);

            $TGL_AKTA = $data['TGL_AKTA'];
            $tglnya = date("Y-m-d", strtotime($TGL_AKTA));
            $KD_JURUSAN = $data['KD_JURUSAN'];
            $kd_ddikti = $data['kd_epsbed'];
            $nm_jenis = $data['nm_jenis'];
            $nm_prodi = $data['nm_prodi'];
        }

        // return array($kd_ddikti);

        $id_fak = $data['id_fak'];
        $kd_unit = $data['kd_unit'];
        $tgl_akreditasi = $data['tgl_akreditasi'];
        $tgl_kadaluarsa = $data['tgl_kadaluarsa'];
        $nilai_huruf = $data['nilai_huruf'];
        $nilai_angka = $data['nilai_angka'];
        $nomor_sk = $data['nomor_sk'];
        $tahun_sk = $data['tahun_sk'];
        $nomor_sertifikat = $data['nomor_sertif'];
        // $tahun_sk=$data['thn_sk'];
        $doc_sk = $data['doc_sk'];
        $doc_sertifikat = $data['doc_sertifikat'];
        $tgl_submit_sapto = $data['tgl_submit_sapto'];
        $tgl_input_borang = $data['tgl_input_borang'];
        $kd_lembaga_kreditasi = $data['lmbg_akreditasi'];
        $log_pgw = $data['log_pgw'];
        // $log_input =$data['log_input'];
        $ekstensi_doc_sertifikat = $data['ekstensi_dock_sert'];
        $ekstensi_sert_akrd = $data['ekstensi_doc_sk'];
        $tampilkan = $data['tampilkan'];
        //  $log_input=date("Y-m-d H:i:s");
        //  $kd_pegawai=$data['kd_pegawai'];
        // return array($nm_prodi,$nm_jenis,$KD_JURUSAN,$id_fak,$tglnya,$kd_ddikti,$NM_PRODI_ASING,$KD_PRODI,$kd_unit,$tgl_akreditasi,$tgl_kadaluarsa,$nilai_huruf
        // ,$nilai_angka,$nomor_sk,$tahun_sk,$doc_sk,
        // $doc_sertifikat,$tgl_submit_sapto,$tgl_input_borang,$log_pgw,$ekstensi_doc_sertifikat,
        // $ekstensi_sert_akrd);

        // return $nm_jenis ;
        // return $jen=$this->mutu->query("SELECT kd_jenis FROM public.tmp_akd_master_jenis WHERE jenjang='S2' ")->result_array();
        // $jen=array();
        // return array($data['id_fak']);

        // return $data;

        if ($data['id_fak'] == '201002') {
            // ============================================jika yang di inputkan universitas====================================
            // return 201002;
            $fakultas = $data['id_fak'];
            $this->mutu->query("INSERT INTO public.akreditasi_master_data(kd_lembaga_kreditasi,nomor_sertifikat,
	 kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, nomor_sk, 
	 tahun_sk,  doc_sk, doc_sertifikat, tgl_submit_sapto, tgl_input_borang,  log_pgw, ekstensi_doc_sertifikat, ekstensi_sert_akrd,tampilkan,kd_prodi)
	
	VALUES ( '$kd_lembaga_kreditasi','$nomor_sertifikat','$fakultas', '$tgl_akreditasi' , '$tgl_kadaluarsa', '$nilai_huruf', $nilai_angka, '$nomor_sk', '$tahun_sk', 
	' $doc_sk', '$doc_sertifikat', '$tgl_submit_sapto', '$tgl_input_borang', '$log_pgw', '$ekstensi_doc_sertifikat', '$ekstensi_sert_akrd',
	'$tampilkan','$kd_unit')");
            return 'ok';
        } else {
            // =============================================jika prodi===========================
            // return array($kd_ddikti);

            // return $kd_ddikti;
            $jen = $this->mutu->query("SELECT kd_jenis FROM public.tmp_akd_master_jenis WHERE jenjang='$nm_jenis' ")->result_array();
            $jenisnya = $jen[0]['kd_jenis'];
            $cek_unit = $this->mutu->query("SELECT kd_unit FROM public.akreditasi_master_unit WHERE kd_unit='$kd_ddikti' ")->result_array();
            // $cek_unit='';
            // return $cek_unit;
            // 	$this->mutu->query("SELECT kd_unit FROM public.akreditasi_master_unit
            // ORDER BY kd_unit ASC ")->result_array();
            // return  $cek_unit;
            if (!empty($cek_unit)) {

                // =============================================jika data unit ada==============
                // return $data;

                // return 'kd_ddikti';
                $this->mutu->query("INSERT INTO public.akreditasi_master_data(kd_lembaga_kreditasi,nomor_sertifikat,
		 kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, nomor_sk, 
		 tahun_sk,  doc_sk, doc_sertifikat, tgl_submit_sapto, tgl_input_borang,  log_pgw, ekstensi_doc_sertifikat, ekstensi_sert_akrd,tampilkan,kd_prodi)
		
		VALUES ( '$kd_lembaga_kreditasi','$nomor_sertifikat','$kd_ddikti', '$tgl_akreditasi' , '$tgl_kadaluarsa', '$nilai_huruf', $nilai_angka, '$nomor_sk', '$tahun_sk', 
		' $doc_sk', '$doc_sertifikat', '$tgl_submit_sapto', '$tgl_input_borang', '$log_pgw', '$ekstensi_doc_sertifikat', '$ekstensi_sert_akrd',
		'$tampilkan','$kd_unit')");

                return array($id_fak);


            } else {


                // return $qw='sampe else';
                //query yg ini mengkin ada yg  eror

                // ----------------------------cek tbl jrsn---------------------
                $ck_jrsn = $this->mutu->query("SELECT kd_jur
			FROM public.tmp_akd_master_jurusan WHERE kd_jur='$KD_JURUSAN'")->result_array();
                // $ck_jrsn='';
                // return $kd_ddikti;
                if (empty($ck_jrsn)) {

                    // return $data;

                    // return $kd_ddikti;

                    // -------------iki tbl jursan kdu di cek ---------
                    $this->mutu->query("INSERT INTO public.tmp_akd_master_jurusan(
				kd_jur, nm_jur, kd_fak, log_pgw)
				VALUES ('$KD_JURUSAN', '$nm_prodi','$id_fak' , '$log_pgw')");
                    // --------------------------------------------------
                }
                // return $data;
                // -----------------cek_tbl_prodi-----------------------------------
                $ck_tbl_prodi = $this->mutu->query("SELECT kd_prodi
			FROM public.tmp_akd_master_prodi WHERE kd_prodi='$KD_PRODI'")->result_array();
                // return $ck_tbl_prodi;
                // return $kd_ddikti;
                // return $data;
                // $ck_tbl_prodi='';
                // ---------------------jika kosong maka masukan data
                if (empty($ck_tbl_prodi)) {

                    // return $kd_ddikti;
                    // return '$data';

                    $this->mutu->query("INSERT INTO public.tmp_akd_master_prodi(
			kd_prodi, nm_prodi, nm_prodi_en,kd_jur, kd_jenis, kd_pddikti, tgl_izin, log_pgw)
			VALUES ('$KD_PRODI',' $nm_prodi', '$NM_PRODI_ASING',  '$KD_JURUSAN', '$jenisnya', '$kd_ddikti', '$tglnya','$log_pgw')");
                }
                // die();
                // return $kd_unit;
                // return $kd_ddikti;
                // return $data;

                // -------------------------------------------------------------------------

                // return $tes;
                // $msterunit=;
                // return $kd_ddikti;
                $this->mutu->query("INSERT INTO public.akreditasi_master_unit(kd_unit, nm_unit, log_pgw, jenis)VALUES
	 ('$kd_ddikti', '$nm_prodi','$log_pgw','$jenisnya')");

                // return $data;

                $data = $this->mutu->query("INSERT INTO public.akreditasi_master_data(kd_lembaga_kreditasi,nomor_sertifikat,
			kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, nomor_sk, 
			tahun_sk,  doc_sk, doc_sertifikat, tgl_submit_sapto, tgl_input_borang,  log_pgw, ekstensi_doc_sertifikat, ekstensi_sert_akrd,tampilkan,kd_prodi)
		 
		 VALUES ( '$kd_lembaga_kreditasi','$nomor_sertifikat','$kd_ddikti', '$tgl_akreditasi' , '$tgl_kadaluarsa', '$nilai_huruf', $nilai_angka, '$nomor_sk', '$tahun_sk', 
		 ' $doc_sk', '$doc_sertifikat', '$tgl_submit_sapto', '$tgl_input_borang', '$log_pgw', '$ekstensi_doc_sertifikat', '$ekstensi_sert_akrd',
		 '$tampilkan' ,'$kd_unit')");
                return $kd_ddikti;
            }
        }
        // return $fer='gak jelas';
    }

    public function prodi($value)
    {
        $kd_prodi = $value['kd_prodi'];
        // return $kd_prodi;
        return $this->mutu->query("SELECT nm_prodi FROM tmp_akd_master_prodi
WHERE kd_prodi='$kd_prodi' ")->result_array();
    }

    public function auto_nama_unit()
    {
        return $this->mutu->query("SELECT kd_unit FROM public.akreditasi_master_unit
ORDER BY kd_unit ASC ")->result_array();
    }

    public function nam_unit($value)
    {

        $kd_unit = $value['kd_unit'];

        return $this->mutu->query("SELECT nm_unit FROM public.akreditasi_master_unit Where kd_unit='$kd_unit'
ORDER BY kd_unit ASC  ")->row_array();	# code...
    }

    public function pilih_fakultas()
    {
        return $this->mutu->query("SELECT * FROM public.tmp_akd_master_fak
ORDER BY kd_fak ASC ")->result_array();
    }
    public function pilih_unit($data)
    {
        $kd_fak = $data['kd_fak'];
        return $this->mutu->query("SELECT tmp_akd_master_fak.kd_fak, jenjang,tmp_akd_master_prodi.kd_pddikti,akreditasi_master_unit.kd_unit ,nm_prodi,nm_unit,nm_fak
FROM tmp_akd_master_prodi INNER JOIN akreditasi_master_unit 
ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
INNER JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
INNER JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak 
INNER JOIN tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
WHERE tmp_akd_master_fak.kd_fak ='$kd_fak'")->result_array();
    }
    public function ambil_kd_akrd($data)
    {
        $kd_unit = $data['kd_unit'];
        $nomor_sk = $data['nomor_sk'];
        $nilai_angka = $data['nilai_angka'];
        $nomor_sertifikat = $data['nomor_sertifikat'];

        return $this->mutu->query("SELECT kd_akreditasi FROM akreditasi_master_data 
	WHERE kd_unit='$kd_unit' AND nomor_sk='$nomor_sk'
	AND nilai_angka=$nilai_angka 
	AND nomor_sertifikat='$nomor_sertifikat'")->result_array();
    }
    public function univ()
    {
        return $this->mutu->query("SELECT kd_akreditasi,akreditasi_master_data.kd_unit,nm_unit,tgl_akreditasi,ck_luar_negri,
	tgl_kadaluarsa,nomor_sk,nilai_huruf, nilai_angka,tampilkan,nomor_sertifikat,ekstensi_doc_sertifikat,
	ekstensi_sert_akrd,tahun_sk,tgl_submit_sapto,tgl_input_borang,kd_lembaga_kreditasi FROM public.akreditasi_master_unit LEFT JOIN akreditasi_master_data 
	ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
	WHERE akreditasi_master_data.kd_unit='201002'
	ORDER BY akreditasi_master_data.kd_unit ASC  ")->result_array();
        # code...
    }
    public function tamil_edit($data)
    {
        $kd_unit = $data['kd_unit'];
        return $this->mutu->query("SELECT kd_lembaga_kreditasi, kd_akreditasi,akreditasi_master_data.kd_unit,nm_unit,tgl_akreditasi,
	tgl_kadaluarsa,nomor_sk,nilai_huruf, nilai_angka,tgl_submit_sapto,
	tgl_input_borang,tahun_sk,nomor_sertifikat,tampilkan,ekstensi_doc_sertifikat,ekstensi_sert_akrd  FROM public.akreditasi_master_unit LEFT JOIN akreditasi_master_data 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
WHERE akreditasi_master_data.kd_akreditasi='$kd_unit'
ORDER BY akreditasi_master_data.kd_unit ASC ")->result_array();
        # code...
    }
    public function fak()
    {
        // $sekarang=date("Y-m-d");
        // AND akreditasi_master_data.tgl_kadaluarsa >  '$sekarang'

//         return $this->mutu->query(" SELECT kd_akreditasi, kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, nomor_sk, tahun_sk, nomor_sertifikat, tgl_submit_sapto, tgl_input_borang, kd_lembaga_kreditasia, log_pgw, log_input, ekstensi_doc_sertifikat, ekstensi_sert_akrd, tampilkan, kd_lembaga_kreditasi, kd_prodi, ck_luar_negri
// FROM public.akreditasi_master_data where kd_prodi in(select kd_prodi from prd_jurusan_v )  ")->result_array();

  return $this->mutu->query(" SELECT kd_akreditasi,akreditasi_master_data.kd_unit,kd_lembaga_kreditasi,ck_luar_negri,tampilkan, tmp_akd_master_fak.kd_fak,tmp_akd_master_prodi.kd_prodi, nm_fak, nm_prodi,tgl_akreditasi,
	tmp_akd_master_jenis.kd_jenis,tgl_kadaluarsa,nomor_sk,tgl_izin,nilai_huruf, maks_studi,nilai_angka,jenjang FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
	ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_unit.kd_unit
	INNER JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
	INNER JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	INNER JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
	INNER JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak
    WHERE tmp_akd_master_prodi.kd_prodi=akreditasi_master_data.kd_prodi
	ORDER BY tmp_akd_master_prodi.nm_prodi ,jenjang,akreditasi_master_data.tgl_kadaluarsa DESC  
  ")->result_array();
    }

    public function get_kd_fak($data)
    {
        $kdunit = $data['kdunit'];
        return $this->mutu->query("  SELECT DISTINCT tmp_akd_master_fak.kd_fak FROM tmp_akd_master_prodi LEFT JOIN akreditasi_master_unit 
	ON tmp_akd_master_prodi.nm_prodi=akreditasi_master_unit.nm_unit
	INNER JOIN akreditasi_master_data ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit
	INNER JOIN tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis
	INNER JOIN tmp_akd_master_jurusan ON tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur
	INNER JOIN tmp_akd_master_fak ON tmp_akd_master_jurusan.kd_fak=tmp_akd_master_fak.kd_fak  
	AND akreditasi_master_data.kd_unit ='$kdunit'    ")->result_array();
    }

}

/* End of file  */
/* Location: ./application/models/ */
