<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_something extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}

function istlah_standard_dokumentasi($key= array())
{
	$data=$this->mutu->query("
		SELECT istilah_standard FROM public.dokumentasi
        WHERE id_dokumentasi = ".$key['id_dokumentasi']."
		");
		return $data;
}

 function cek_nilai_harkat_yang_sesuai($key=array())
{
	
	$data=$this->mutu->query("
	SELECT  min(peringkat) as nilai_terendah ,id_harkat
	FROM public.t_harkat WHERE id_harkat IN(SELECT  id_harkat
	FROM public.t_matrik WHERE id_borang=".$key['id_borang']." AND id_butir=".$key['id_butir']." AND ikuikt='".$key['ikuikt']."')  GROUP BY peringkat,id_harkat order BY peringkat  LIMIT 1
	");
	return $data;
}

function cek_nilai_harkat_yang_sesuai_tr($key=array())
{
	
	$data=$this->mutu->query("
	SELECT  max(peringkat) as nilai_terendah ,id_harkat
	FROM public.t_harkat WHERE id_harkat IN(SELECT  id_harkat
	FROM public.t_matrik WHERE id_borang=".$key['id_borang']." AND id_butir=".$key['id_butir']." AND ikuikt='".$key['ikuikt']."')  GROUP BY peringkat,id_harkat order BY peringkat  DESC 
	");
	return $data;
}
 function cek_kriteria ($key= array() )
{
	$data=$this->mutu->query("
	SELECT  COUNT ( *)  from( SELECT DISTINCT B.id_ksk, B.nm_ksk
							   FROM item_lkps AS A
							   JOIN ksk AS B ON B.id_ksk = A.id_ksk
							   WHERE A.id_lkps =".$key['id_kriteria']."
							   ORDER BY B.id_ksk ASC )AS ksk
		");
		return $data;
}

// isrilah standard borang
function istlah_standard ($key= array())
	{
		$data=$this->mutu->query("
		SELECT istilah_standard FROM public.borang
        WHERE id_borang = ".$key['id_borang']."
		");
		return $data;
	}
	// istilah penilaian

	// isrilah standard borang
function istlah_standard_lkps ($key= array())
{
	$data=$this->mutu->query("
	SELECT istilah_standard FROM public.lkps
	WHERE id_lkps = ".$key['id_lkps']."
	");
	return $data;
}

function istlah_standard_ipepa ($key= array())
{
	$data=$this->mutu->query("
	SELECT istilah_standard FROM public.ipepa
	WHERE id_ipepa = ".$key['id_ipepa']."
	");
	return $data;
}
// istilah penilaian
function istlah_penilaian ($key= array())
	{
		$data=$this->mutu->query("
		SELECT istilah_standard FROM public.penilaian
        WHERE id_penilaian = ".$key['id_penilaian']."
		");
		return $data;
	}	
	// TABEL JOIN BORANG, VERSI_AKREDITASI START
	function join_b_va_1($key = array()){ // READ LEMBAGA AKREDITASI WHERE JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT B.id_lembaga_akreditasi
			FROM borang AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].")
		");
		return $data;
	}

	function join_b_va_2($key = array()){ // READ VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG
		$KD_JENJANG = "";
		if (!empty($key['KD_JENJANG'])) {
			
			// $key['KD_UNIT']='ada';
			if (!empty($key['KD_UNIT'])) {
	
				$KD_JENJANG = " AND (B.kd_jenjang IN (".$key['KD_JENJANG'].") OR B.kd_jenjang ='' )";
	 		}else {
				
				$KD_JENJANG = " AND B.kd_jenjang IN (".$key['KD_JENJANG'].") ";

			 }

		}
		
		$data = $this->mutu->query("
			SELECT B.id_versi_akreditasi
			FROM borang AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].",5)
			AND B.id_lembaga_akreditasi IN (".$key['LEMBAGA_AKREDITASI'].")
			".$KD_JENJANG."
		");
		return $data;
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI END
	

	// TABEL JOIN BORANG, VERSI_AKREDITASI START
	function join_lkps_va_1($key = array()){ // READ LEMBAGA AKREDITASI WHERE JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT B.id_lembaga_akreditasi
			FROM lkps AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].")
		");
		return $data;
	}
	function join_lkps_va_2($key = array()){ // READ VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG
		$KD_JENJANG = "";
		if (!empty($key['KD_JENJANG'])) {
			$KD_JENJANG = " AND B.kd_jenjang IN (".$key['KD_JENJANG'].") ";
		}
		$data = $this->mutu->query("
			SELECT B.id_versi_akreditasi
			FROM lkps AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].")
			AND B.id_lembaga_akreditasi IN (".$key['LEMBAGA_AKREDITASI'].")
			".$KD_JENJANG."
		");
		return $data;
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI END


	function join_lkps_va_2_ipepa($key = array()){ // READ VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG ipepa
		$KD_JENJANG = "";
		if (!empty($key['KD_JENJANG'])) {
			$KD_JENJANG = " AND B.kd_jenjang IN (".$key['KD_JENJANG'].") ";
		}
		$data = $this->mutu->query("
			SELECT B.id_versi_akreditasi
			FROM ipepa AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].")
			AND B.id_lembaga_akreditasi IN (".$key['LEMBAGA_AKREDITASI'].")
			".$KD_JENJANG."
		");
		return $data;
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI END

	// TABEL LEMBAGA_AKREDITASI START
	function la_1($key = array()){ // READ SEMUA WHERE ID_LEMBAGA_AKREDITASI
		$data = $this->mutu->query("
			SELECT *
			FROM lembaga_akreditasi
			WHERE id_lembaga_akreditasi IN (".$key['ID_LEMBAGA_AKREDITASI'].")
		");
		return $data;
	}
	// TABEL LEMBAGA_AKREDITASI END
	
	// TABEL VERSI_AKREDITASI START
	function va_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT *
			FROM versi_akreditasi
			WHERE status = 1
			AND id_versi_akreditasi IN (".$key['ID_VERSI_AKREDITASI'].") ORDER BY nm_versi_akreditasi
		");
		return $data;
	}
	// TABEL VERSI_AKREDITASI END

  // Versi Akreditasi Laporan Monitoring
  function va_monitoring($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT *
			FROM versi_akreditasi
			WHERE status = 1
			AND id_versi_akreditasi IN (".$key['ID_VERSI_AKREDITASI'].")
      AND versi_jenis IN ('101')
		");
		return $data;
	}
  // End of Versi Akreditasi Laporan Monitoring

  // Versi Akreditasi Laporan Evaluasi
  function va_evaluasi($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT *
			FROM versi_akreditasi
			WHERE status = 1
			AND id_versi_akreditasi IN (".$key['ID_VERSI_AKREDITASI'].")
      AND versi_jenis IN ('102')
		");
		return $data;
	}
  // End of Versi Akreditasi Laporan Evaluasi

  // Versi Akreditasi Laporan AMI
  function va_ami($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
    $data = $this->mutu->query("
      SELECT *
      FROM versi_akreditasi
      WHERE status = 1
      AND id_versi_akreditasi IN (".$key['ID_VERSI_AKREDITASI'].")
      AND versi_jenis IN ('111')
    ");
    return $data;
  }
  // End of Versi Akreditasi Laporan AMI

  // Versi Akreditasi Laporan ATL
  function va_atl($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
    $data = $this->mutu->query("
      SELECT *
      FROM versi_akreditasi
      WHERE status = 1
      AND id_versi_akreditasi IN (".$key['ID_VERSI_AKREDITASI'].")
      AND versi_jenis IN ('112')
    ");
    return $data;
  }
  // End of Versi Akreditasi Laporan AMI
	
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI START
	function join_va_ja_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT A.*, B.nm_jenis_akreditasi,B.id_jenis_akreditasi
			FROM versi_akreditasi AS A
			JOIN jenis_akreditasi AS B
			ON B.id_jenis_akreditasi = A.id_jenis_akreditasi
			WHERE A.status = 1
			AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
		");
		return $data;
	}
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI END
	
	// TABEL BORANG START
	function b_1($key = array()){ // READ ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT id_jenis_akreditasi
			FROM borang
			WHERE status = 1
			AND id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
		");
		return $data;
	}
	// TABEL BORANG END
	
	// TABEL lkps START
	function lkps_1($key = array()){ // READ ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT id_jenis_akreditasi
			FROM lkps
			WHERE status = 1
			AND id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
		");
		return $data;
	}

	function ipepa_1($key = array()){ // READ ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT id_jenis_akreditasi
			FROM ipepa
			WHERE status = 1
			AND id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
		");
		return $data;
	}
	// TABEL lkps END

	// TABEL JENIS_AKREDITASI START
	function ja_1($key = array()){ // READ SEMUA WHERE ID_JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT *
			FROM jenis_akreditasi
			WHERE id_jenis_akreditasi IN (".$key['ID_JENIS_AKREDITASI'].")
		");
		return $data;
	}
	function ja_1aa($key = array()){ // READ SEMUA WHERE ID_JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT *
			FROM jenis_akreditasi
			WHERE id_jenis_akreditasi IN (".$key['ID_JENIS_AKREDITASI'].")
		");
		return $data;
	}
	// TABEL JENIS_AKREDITASI END
	
	// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function join_b_va_ja_la_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM borang AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
			AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
		");
		return $data;
	}

	function join_b_va_ja_la_2($key = array()){ // READ SEMUA WHERE ID_BORANG
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM borang AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = A.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_borang = ".$key['ID_BORANG']."
		");
		return $data;
	}


	// SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi,j.nm_periode,j.status_periode,j.id_periode_pengisian,
	// j.tgl_mulai,j.tgl_selesai
	// FROM borang AS A
	// LEFT JOIN versi_akreditasi AS B
	// ON B.id_versi_akreditasi = A.id_versi_akreditasi
	// LEFT JOIN jenis_akreditasi AS C
	// ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
	// LEFT JOIN lembaga_akreditasi AS D
	// ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
	// LEFT JOIN tb_config_periode_pengisian AS j ON j.id_borang=A.id_borang 
	
	// WHERE A.status = 1
	// AND B.status = 1
	// AND A.id_versi_akreditasi =  ".$key['ID_VERSI_AKREDITASI']."
	// AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."

	function join_b_va_ja_la_1a($key = array()){ // READ SEMUA WHERE ID_BORANG
		$data = $this->mutu->query("
			
		SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi,jn.jenjang,
			B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi,j.nm_periode,j.status_periode,j.id_periode_pengisian,
			j.tgl_mulai AS tglm_prd,j.tgl_selesai AS tgls_prd,k.institusi,k.kd_fak,k.kd_prodi,k.kd_unit,k.aud,k.tgl_mulai,k.tgl_selesai,k.aktif 
					,j.keterangan AS ket_perid,k.id_jadwal_pengisian
					FROM borang AS A
					LEFT JOIN versi_akreditasi AS B
					ON B.id_versi_akreditasi = A.id_versi_akreditasi
					LEFT JOIN jenis_akreditasi AS C
					ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
					LEFT JOIN lembaga_akreditasi AS D
					ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
					LEFT JOIN tb_config_periode_pengisian AS j ON j.id_borang=A.id_borang 
					LEFT JOIN tb_config_jadwal_pengisian AS k ON  k.id_periode_pengisian = j.id_periode_pengisian
					LEFT join tmp_akd_master_jenis AS jn ON jn.urut=B.id_jenis_akreditasi
					WHERE A.status = 1
					AND B.status = 1
					AND A.id_versi_akreditasi =  ".$key['ID_VERSI_AKREDITASI']."
			AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
					AND j.status_periode=1
		
		");
		return $data;
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END
	
	// TABEL JOIN lkps, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function join_lkps_va_ja_la_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM lkps AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
			AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
		");
		return $data;
	}

	function join_lkps_va_ja_la_2($key = array()){ // READ SEMUA WHERE ID_lkps
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM lkps AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = A.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_lkps = ".$key['ID_lkps']."
		");
		return $data;
	}
	// TABEL JOIN BORANG, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END

	// TABEL JOIN ipepa, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function join_ipepa_va_ja_la_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
		// return 'dkflghdlf';
		// die();
		if (!empty($key['fak'])) {
		// 	# code...
			$data = $this->mutu->query("
				SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
				FROM ipepa AS A
				LEFT JOIN versi_akreditasi AS B
				ON B.id_versi_akreditasi = A.id_versi_akreditasi
				LEFT JOIN jenis_akreditasi AS C
				ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
				LEFT JOIN lembaga_akreditasi AS D
				ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
				WHERE A.status = 1
				AND B.status = 1
				AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
				AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
			");
		}elseif (!empty($key['prd'])) {
			$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			,tmp_akd_master_prodi.kd_prodi
						FROM ipepa AS A
						LEFT JOIN versi_akreditasi AS B
						ON B.id_versi_akreditasi = A.id_versi_akreditasi
						LEFT JOIN jenis_akreditasi AS C
						ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
						LEFT JOIN lembaga_akreditasi AS D
						ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
						LEFT JOIN tmp_akd_master_jenis AS msj ON msj.kd_jenis_sia=B.kd_jenjang
						LEFT JOIN tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_jenis = msj.kd_jenis
						WHERE A.status = 1
						AND B.status = 1
						AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
						AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
						AND tmp_akd_master_prodi.kd_prodi='".$key['prd']."'
		");
		}else {
			$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM ipepa AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
			AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
		");
		}
		
		return $data;
	}

	function join_ipepa_va_ja_la_2($key = array()){ // READ SEMUA WHERE ID_ipepa
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM ipepa AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = A.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_ipepa = ".$key['ID_ipepa']."
		");
		return $data;
	}
	// TABEL JOIN ipepa, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END

	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI START
	function join_dts_va_1($key = array()){ // READ LEMBAGA AKREDITASI WHERE JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT B.id_lembaga_akreditasi
			FROM dokumentasi AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].")
		");
		return $data;
	}

	function join_dts_va_2($key = array()){ // READ VERSI AKREDITASI WHERE JENIS_AKREDITASI, LEMBAGA_AKREDITASI, KD_JENJANG
		$KD_JENJANG = "";
		if (!empty($key['KD_JENJANG'])) {
			$KD_JENJANG = " AND B.kd_jenjang IN (".$key['KD_JENJANG'].") ";
		}
		$data = $this->mutu->query("
			SELECT B.id_versi_akreditasi
			FROM dokumentasi AS A
			JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_jenis_akreditasi IN (".$key['JENIS_AKREDITASI'].")
			AND B.id_lembaga_akreditasi IN (".$key['LEMBAGA_AKREDITASI'].")
			".$KD_JENJANG."
		");
		return $data;
	}
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI END
	
	// TABEL DOKUMENTASI START
	function dts_1($key = array()){ // READ ID_JENIS_AKREDITASI WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT id_jenis_akreditasi
			FROM dokumentasi
			WHERE status = 1
			AND id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
		");
		return $data;
	}
	// TABEL DOKUMENTASI END
	
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function join_dts_va_ja_la_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI, ID_JENIS_AKREDITASI
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.id_jenis_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM dokumentasi AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = B.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
			AND A.id_jenis_akreditasi = ".$key['ID_JENIS_AKREDITASI']."
		");
		return $data;
	}

	function join_dts_va_ja_la_2($key = array()){ // READ SEMUA WHERE ID_DOKUMENTASI
		$data = $this->mutu->query("
			SELECT A.*, B.nm_versi_akreditasi, B.id_lembaga_akreditasi, B.kd_jenjang, C.nm_jenis_akreditasi, D.nm_lembaga_akreditasi
			FROM dokumentasi AS A
			LEFT JOIN versi_akreditasi AS B
			ON B.id_versi_akreditasi = A.id_versi_akreditasi
			LEFT JOIN jenis_akreditasi AS C
			ON C.id_jenis_akreditasi = A.id_jenis_akreditasi
			LEFT JOIN lembaga_akreditasi AS D
			ON D.id_lembaga_akreditasi = B.id_lembaga_akreditasi
			WHERE A.status = 1
			AND B.status = 1
			AND A.id_dokumentasi = ".$key['ID_DOKUMENTASI']."
		");
		return $data;
	}
	// TABEL JOIN DOKUMENTASI, VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END
	
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI START
	function join_va_ja_la_1($key = array()){ // READ SEMUA WHERE ID_VERSI_AKREDITASI
		$data = $this->mutu->query("
			SELECT A.*, B.nm_jenis_akreditasi, C.nm_lembaga_akreditasi
			FROM versi_akreditasi AS A
			JOIN jenis_akreditasi AS B
			ON B.id_jenis_akreditasi = A.id_jenis_akreditasi
			JOIN lembaga_akreditasi AS C
			ON C.id_lembaga_akreditasi = A.id_lembaga_akreditasi
			WHERE A.status = 1
			AND A.id_versi_akreditasi = ".$key['ID_VERSI_AKREDITASI']."
		");
		return $data;
	}
	// TABEL JOIN VERSI_AKREDITASI, JENIS_AKREDITASI, LEMBAGA_AKREDITASI END
	
	// TABEL T_ATUR_NM_TAMPILAN START
	function tant_1($key = array()){ // READ SEMUA WHERE ID_BORANG, INSTITUSI, KD_FAK, KD_PRODI
		$INSTITUSI = "";
		if (!empty($key['INSTITUSI'])) {
			$INSTITUSI = " AND institusi = '".$key['INSTITUSI']."' ";
		}
		$KD_FAK = "";
		if (!empty($key['KD_FAK'])) {
			$KD_FAK = " AND kd_fak = '".$key['KD_FAK']."' ";
		}
		$KD_PRODI = "";
		if (!empty($key['KD_PRODI'])) {
			$KD_PRODI = " AND kd_prodi = '".$key['KD_PRODI']."' ";
		}
		$data = $this->mutu->query("
			SELECT *
			FROM t_atur_nm_tampilan
			WHERE id_borang = ".$key['ID_BORANG']."
			".$INSTITUSI."
			".$KD_FAK."
			".$KD_PRODI."
		");
		return $data;
	}

	function tant_2($key = array()){ // READ SEMUA WHERE ID_BORANG, LOKASI_TAMPIL, INSTITUSI, KD_FAK, KD_PRODI
		$INSTITUSI = "";
		if (!empty($key['INSTITUSI'])) {
			$INSTITUSI = " AND institusi = '".$key['INSTITUSI']."' ";
		}
		$KD_FAK = "";
		if (!empty($key['KD_FAK'])) {
			$KD_FAK = " AND kd_fak = '".$key['KD_FAK']."' ";
		}
		$KD_PRODI = "";
		if (!empty($key['KD_PRODI'])) {
			$KD_PRODI = " AND kd_prodi = '".$key['KD_PRODI']."' ";
		}
		$data = $this->mutu->query("
			SELECT *
			FROM t_atur_nm_tampilan
			WHERE id_borang = ".$key['ID_BORANG']."
			AND lokasi_tampil = '".$key['LOKASI_TAMPIL']."'
			".$INSTITUSI."
			".$KD_FAK."
			".$KD_PRODI."
		");
		return $data;
	}

	function tant_3($key = array()){ // READ SEMUA WHERE ID_DOKUMENTASI, INSTITUSI, KD_FAK, KD_PRODI
		$INSTITUSI = "";
		if (!empty($key['INSTITUSI'])) {
			$INSTITUSI = " AND institusi = '".$key['INSTITUSI']."' ";
		}
		$KD_FAK = "";
		if (!empty($key['KD_FAK'])) {
			$KD_FAK = " AND kd_fak = '".$key['KD_FAK']."' ";
		}
		$KD_PRODI = "";
		if (!empty($key['KD_PRODI'])) {
			$KD_PRODI = " AND kd_prodi = '".$key['KD_PRODI']."' ";
		}
		$data = $this->mutu->query("
			SELECT *
			FROM t_atur_nm_tampilan
			WHERE id_dokumentasi = ".$key['ID_DOKUMENTASI']."
			".$INSTITUSI."
			".$KD_FAK."
			".$KD_PRODI."
		");
		return $data;
	}

	function tant_4($key = array()){ // READ SEMUA WHERE ID_DOKUMENTASI, LOKASI_TAMPIL, INSTITUSI, KD_FAK, KD_PRODI
		$INSTITUSI = "";
		if (!empty($key['INSTITUSI'])) {
			$INSTITUSI = " AND institusi = '".$key['INSTITUSI']."' ";
		}
		$KD_FAK = "";
		if (!empty($key['KD_FAK'])) {
			$KD_FAK = " AND kd_fak = '".$key['KD_FAK']."' ";
		}
		$KD_PRODI = "";
		if (!empty($key['KD_PRODI'])) {
			$KD_PRODI = " AND kd_prodi = '".$key['KD_PRODI']."' ";
		}
		$data = $this->mutu->query("
			SELECT *
			FROM t_atur_nm_tampilan
			WHERE id_dokumentasi = ".$key['ID_DOKUMENTASI']."
			AND lokasi_tampil = '".$key['LOKASI_TAMPIL']."'
			".$INSTITUSI."
			".$KD_FAK."
			".$KD_PRODI."
		");
		return $data;
	}
	// TABEL T_ATUR_NM_TAMPILAN END
	
	// TABEL JOIN ITEM_BORANG, KSK START
	function join_it_k_1_test($key = array()){ // READ NO_URUT, NM_KSK WHERE ID_BORANG
		$data = $this->mutu->query("
				SELECT ROW_NUMBER() OVER (ORDER BY id_item_borang) AS no_urut, id_ksk, nm_ksk
				FROM (
					SELECT DISTINCT B.id_ksk, B.nm_ksk,A.id_item_borang
					FROM item_borang AS A
					JOIN ksk AS B ON B.id_ksk = A.id_ksk
					WHERE A.id_borang = ".$key['ID_BORANG']."
					ORDER BY A.id_item_borang ASC
				) AS ksk
		");
		return $data;
	}

	function join_it_k_1($key = array()){ // READ NO_URUT, NM_KSK WHERE ID_BORANG
		$data = $this->mutu->query("
				SELECT ROW_NUMBER() OVER (ORDER BY id_ksk) AS no_urut, id_ksk, nm_ksk
				FROM (
					SELECT DISTINCT B.id_ksk, B.nm_ksk
					FROM item_borang AS A
					JOIN ksk AS B ON B.id_ksk = A.id_ksk
					WHERE A.id_borang = ".$key['ID_BORANG']."
					ORDER BY B.id_ksk ASC
				) AS ksk
		");
		return $data;
	}
	public function join_it_k_1_ami($key = array())
	{
		
		$data = $this->mutu->query("
			

		SELECT ROW_NUMBER() OVER (ORDER BY no_urut) AS no_urut, id_ksk, nm_ksk
		FROM (
			SELECT DISTINCT B.id_ksk, B.nm_ksk,A.no_urut
			FROM item_borang AS A
			JOIN ksk AS B ON B.id_ksk = A.id_ksk
			WHERE A.id_borang = ".$key['ID_BORANG']."
			ORDER BY A.no_urut ASC
		) AS ksk
		");

		// foreach ($data as $key ) {

		// 	$dt[$key['id_ksk']]=array('no_urut'=>$key['no_urut'],'id_ksk'=>$key['id_ksk'],'nm_ksk'=>$key['nm_ksk']);
		// 	# code...
		// }

		return $data;
	}
	// TABEL JOIN ITEM_BORANG, KSK END

		// TABEL JOIN ITEM_lkps, KSK START
		function lkps_join_it_k_1($key = array()){ // READ NO_URUT, NM_KSK WHERE ID_BORANG
			$data = $this->mutu->query("
					SELECT ROW_NUMBER() OVER (ORDER BY id_ksk) AS no_urut, id_ksk, nm_ksk
					FROM (
						SELECT DISTINCT B.id_ksk, B.nm_ksk
						FROM item_lkps AS A
						JOIN ksk AS B ON B.id_ksk = A.id_ksk
						WHERE A.id_lkps = ".$key['ID_lkps']."
						ORDER BY B.id_ksk ASC
					) AS ksk
			");
			return $data;
		}

		function lkps_join_it_k_1_v2($key = array()){ // READ NO_URUT, NM_KSK WHERE ID_BORANG

			// NB : KALAU DATA NYA DUPLKAT, DI CONTROLLER API NYA DISAMAKAN SAMA KAYAK YANG BORANG

			$data = $this->mutu->query("
				SELECT ROW_NUMBER() OVER (ORDER BY no_urut) AS no_urut, id_ksk, nm_ksk
					FROM (
						SELECT DISTINCT B.id_ksk, B.nm_ksk, A.no_urut
						FROM item_lkps AS A
						JOIN ksk AS B ON B.id_ksk = A.id_ksk
						WHERE A.id_lkps = ".$key['ID_lkps']."
						ORDER BY A.no_urut ASC
					) AS ksk
			");
			return $data;
		}
		// TABEL JOIN ITEM_lkps, KSK END

		// TABEL JOIN ITEM_ipepa, KSK START
		function ipepa_join_it_k_1($key = array()){ // READ NO_URUT, NM_KSK WHERE ID_BORANG
			$data = $this->mutu->query("
					SELECT ROW_NUMBER() OVER (ORDER BY id_ksk) AS no_urut, id_ksk, nm_ksk
					FROM (
						SELECT DISTINCT B.id_ksk, B.nm_ksk
						FROM item_ipepa AS A
						JOIN ksk AS B ON B.id_ksk = A.id_ksk
						WHERE A.id_ipepa = ".$key['ID_ipepa']."
						ORDER BY B.id_ksk ASC
					) AS ksk
			");
			return $data;
		}

		function ipepa_join_it_k_1_v2($key = array()){ // READ NO_URUT, NM_KSK WHERE ID_BORANG

			// NB : KALAU DATA NYA DUPLKAT, DI CONTROLLER API NYA DISAMAKAN SAMA KAYAK YANG BORANG

			$data = $this->mutu->query("
				SELECT ROW_NUMBER() OVER (ORDER BY no_urut) AS no_urut, id_ksk, nm_ksk
					FROM (
						SELECT DISTINCT B.id_ksk, B.nm_ksk, A.no_urut
						FROM item_ipepa AS A
						JOIN ksk AS B ON B.id_ksk = A.id_ksk
						WHERE A.id_ipepa = ".$key['ID_ipepa']."
						ORDER BY A.no_urut ASC
					) AS ksk
			");
			return $data;
		}
		// TABEL JOIN ITEM_ipepa, KSK END
	
	// TABEL ITEM_BORANG
	function ib_1($key = array()){ // READ ID_ITEM_BORANG, ID_BORANG, NO_URUT WHERE ID_BORANG, NO_URUT <=
		$data = $this->mutu->query("
				SELECT id_item_borang, id_borang, no_urut
				FROM item_borang
				WHERE id_borang = ".$key['ID_BORANG']."
				AND no_urut <= ".$key['NO_URUT']."
				ORDER BY no_urut DESC
				LIMIT 2;
		");
		return $data;
	}

	function ib_2($key = array()){ // READ ID_ITEM_BORANG, ID_BORANG, NO_URUT WHERE ID_BORANG, NO_URUT >=
		$data = $this->mutu->query("
				SELECT id_item_borang, id_borang, no_urut
				FROM item_borang
				WHERE id_borang = ".$key['ID_BORANG']."
				AND no_urut >= ".$key['NO_URUT']."
				ORDER BY no_urut ASC
				LIMIT 2;
		");
		return $data;
	}
	// TABEL ITEM_lkps
	
	// TABEL JOIN item_lkps, KSK END
	
	// TABEL item_lkps
	function ibb_1($key = array()){ // READ ID_item_lkps, ID_lkps, NO_URUT WHERE ID_lkps, NO_URUT <=
		$data = $this->mutu->query("
				SELECT id_item_lkps, id_lkps, no_urut
				FROM item_lkps
				WHERE id_lkps = ".$key['ID_lkps']."
				AND no_urut <= ".$key['NO_URUT']."
				ORDER BY no_urut DESC
				LIMIT 2;
		");
		return $data;
	}

	function ibb_2($key = array()){ // READ ID_item_lkps, ID_lkps, NO_URUT WHERE ID_lkps, NO_URUT >=
		$data = $this->mutu->query("
				SELECT id_item_lkps, id_lkps, no_urut
				FROM item_lkps
				WHERE id_lkps = ".$key['ID_lkps']."
				AND no_urut >= ".$key['NO_URUT']."
				ORDER BY no_urut ASC
				LIMIT 2;
		");
		return $data;
	}
	// TABEL item_lkps
	
	// TABEL item_ipepa
	function item_ipepa_1($key = array()){ // READ ID_item_ipepa, ID_ipepa, NO_URUT WHERE ID_lkps, NO_URUT <=
		$data = $this->mutu->query("
				SELECT id_item_ipepa, id_ipepa, no_urut
				FROM item_ipepa
				WHERE id_ipepa = ".$key['ID_ipepa']."
				AND no_urut <= ".$key['NO_URUT']."
				ORDER BY no_urut DESC
				LIMIT 2;
		");
		return $data;
	}

	function item_ipepa_2($key = array()){ // READ ID_item_ipepa, ID_ipepa, NO_URUT WHERE ID_ipepa, NO_URUT >=
		$data = $this->mutu->query("
				SELECT id_item_ipepa, id_ipepa, no_urut
				FROM item_ipepa
				WHERE id_ipepa = ".$key['ID_ipepa']."
				AND no_urut >= ".$key['NO_URUT']."
				ORDER BY no_urut ASC
				LIMIT 2;
		");
		return $data;
	}
	// TABEL item_lkps


	// TABEL ASPEK_PENILAIAN
	function ap_1($key = array()){ // READ ID_ASPEK_PENILAIAN, ID_PENILAIAN, NO_URUT WHERE ID_PENILAIAN, NO_URUT <=
		$data = $this->mutu->query("
				SELECT id_aspek_penilaian, id_penilaian, no_urut
				FROM aspek_penilaian
				WHERE id_penilaian = ".$key['ID_PENILAIAN']."
				AND no_urut <= ".$key['NO_URUT']."
				ORDER BY no_urut DESC
				LIMIT 2;
		");
		return $data;
	}

	function ap_2($key = array()){ // READ ID_ASPEK_PENILAIAN, ID_PENILAIAN, NO_URUT WHERE ID_PENILAIAN, NO_URUT >=
		$data = $this->mutu->query("
				SELECT id_aspek_penilaian, id_penilaian, no_urut
				FROM aspek_penilaian
				WHERE id_penilaian = ".$key['ID_PENILAIAN']."
				AND no_urut >= ".$key['NO_URUT']."
				ORDER BY no_urut ASC
				LIMIT 2;
		");
		return $data;
	}
	// TABEL ASPEK_PENILAIAN
	
	// TABEL ASPEK_DOKUMENTASI
	function ad_1($key = array()){ // READ ID_ASPEK_DOKUMENTASI, ID_DOKUMENTASI, NO_URUT WHERE ID_DOKUMENTASI, NO_URUT <=
		$data = $this->mutu->query("
				SELECT id_aspek_dokumentasi, id_dokumentasi, no_urut
				FROM aspek_dokumentasi
				WHERE id_dokumentasi = ".$key['ID_DOKUMENTASI']."
				AND no_urut <= ".$key['NO_URUT']."
				ORDER BY no_urut DESC
				LIMIT 2;
		");
		return $data;
	}

	function ad_2($key = array()){ // READ ID_ASPEK_DOKUMENTASI, ID_DOKUMENTASI, NO_URUT WHERE ID_DOKUMENTASI, NO_URUT >=
		$data = $this->mutu->query("
				SELECT id_aspek_dokumentasi, id_dokumentasi, no_urut
				FROM aspek_dokumentasi
				WHERE id_dokumentasi = ".$key['ID_DOKUMENTASI']."
				AND no_urut >= ".$key['NO_URUT']."
				ORDER BY no_urut ASC
				LIMIT 2;
		");
		return $data;
	}

	function ad_3($key = array()){ // READ ID_ASPEK_DOKUMENTASI, ID_DOKUMENTASI, NO_URUT WHERE ID_DOKUMENTASI, NO_URUT >=
		$data = $this->mutu->query("
			SELECT ROW_NUMBER() OVER (ORDER BY no_standar) AS no_urut, no_standar, nm_ksk
			FROM (
				SELECT DISTINCT AD.no_standar, K.nm_ksk
				FROM aspek_dokumentasi AS AD
				JOIN ksk AS K ON K.id_ksk = AD.no_standar
				WHERE AD.id_dokumentasi = '".$key['ID_DOKUMENTASI']."'
				ORDER BY AD.no_standar ASC
			) AS ksk
		");
		return $data;
	}
	// TABEL ASPEK_DOKUMENTASI
	
	// TABEL ASDOK_DOKUMEN
	function asd_1($key = array()){ // READ ID_ASDOK_DOKUMEN, ID_ASPEK_DOKUMENTASI, NO_URUT WHERE ID_ASPEK_DOKUMENTASI, NO_URUT <=
		$data = $this->mutu->query("
				SELECT id_asdok_dokumen, id_aspek_dokumentasi, no_urut
				FROM asdok_dokumen
				WHERE id_aspek_dokumentasi = ".$key['ID_ASPEK_DOKUMENTASI']."
				AND no_urut <= ".$key['NO_URUT']."
				ORDER BY no_urut DESC
				LIMIT 2;
		");
		return $data;
	}

	function asd_2($key = array()){ // READ ID_ASDOK_DOKUMEN, ID_ASPEK_DOKUMENTASI, NO_URUT WHERE ID_ASPEK_DOKUMENTASI, NO_URUT >=
		$data = $this->mutu->query("
				SELECT id_asdok_dokumen, id_aspek_dokumentasi, no_urut
				FROM asdok_dokumen
				WHERE id_aspek_dokumentasi = ".$key['ID_ASPEK_DOKUMENTASI']."
				AND no_urut >= ".$key['NO_URUT']."
				ORDER BY no_urut ASC
				LIMIT 2;
		");
		return $data;
	}
	// TABEL ASDOK_DOKUMEN
	
	// TABEL FILE_lkps START
	function flkps_1($key = array()){ // READ SEMUA KECUALI FILE_BORANG WHERE ID_BORANG, INSTITUSI, KD_FAK, KD_PRODI
		$INSTITUSI = "";
		if (!empty($key['INSTITUSI'])) {
			$INSTITUSI = " AND institusi = '".$key['INSTITUSI']."' ";
		}
		$KD_FAK = "";
		if (!empty($key['KD_FAK'])) {
			$KD_FAK = " AND kd_fak = '".$key['KD_FAK']."' ";
		}
		$KD_PRODI = "";
		if (!empty($key['KD_PRODI'])) {
			$KD_PRODI = " AND kd_prodi = '".$key['KD_PRODI']."' ";
		}
		$data = $this->mutu->query("
			SELECT id_file_lkps, id_lkps, nm_file_lkps, tipe_file, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan
			FROM file_lkps
			WHERE id_lkps = ".$key['ID_lkps']."
			".$INSTITUSI."
			".$KD_FAK."
			".$KD_PRODI."
		");
		return $data;
	}
	// TABEL FILE_BORANG END
	
	// TABEL JOIN ASPEK_DOKUMENTASI, KSK START
	function join_ad_k_1($key = array()){ // READ NO_URUT, NO_STANDAR, NM_KSK WHERE ID_DOKUMENTASI
		$data = $this->mutu->query("
			SELECT ROW_NUMBER() OVER (ORDER BY no_standar) AS no_urut, no_standar, nm_ksk
			FROM (
				SELECT DISTINCT A.no_standar, B.nm_ksk
				FROM aspek_dokumentasi AS A
				JOIN ksk AS B ON B.id_ksk = A.no_standar
				WHERE A.id_dokumentasi = ".$key['ID_DOKUMENTASI']."
				ORDER BY A.no_standar ASC
			) AS ksk
		");
		return $data;
	}

	function join_ad_k_2($key = array()){ // READ NO_URUT, NO_STANDAR, NM_KSK WHERE ID_DOKUMENTASI IN ASDOK_DOKUMEN
		$data = $this->mutu->query("
			SELECT ROW_NUMBER() OVER (ORDER BY no_standar) AS no_urut, no_standar, nm_ksk
			FROM (
				SELECT DISTINCT A.no_standar, B.nm_ksk
				FROM aspek_dokumentasi AS A
				JOIN ksk AS B ON B.id_ksk = A.no_standar
				WHERE A.id_dokumentasi = ".$key['ID_DOKUMENTASI']."
				AND A.id_aspek_dokumentasi IN (
					SELECT id_aspek_dokumentasi
					FROM asdok_dokumen
					WHERE id_asdok_dokumen IN (
						SELECT id_asdok_dokumen
						FROM link_sapto
						WHERE institusi = '".$key['INSTITUSI']."'
						AND kd_fak = '".$key['KD_FAK']."'
						AND kd_prodi = '".$key['KD_PRODI']."'
					)
				)
				ORDER BY A.no_standar ASC
			) AS ksk
		");
		return $data;
	}
	// TABEL JOIN ASPEK_DOKUMENTASI, KSK END
	
	// TABEL JOIN CARI_FILE_DOKUMENTASI START
	function cfd_1($key = array()){ // FILE_DOKUMEN IN ASDOK_DOKUMEN IN ASPEK_DOKUMENTASI WHERE INSTITUSI, KD_FAK, KD_PRODI, ID_DOKUMENTASI, NO_STANDAR
		$where[] = (!empty($key['institusi']))? "institusi = '".$key['institusi']."'" : "institusi = ''";
		$where[] = (!empty($key['kd_fak']))? "kd_fak = '".$key['kd_fak']."'" : "kd_fak = ''";
		$where[] = (!empty($key['kd_prodi']))? "kd_prodi = '".$key['kd_prodi']."'" : "kd_prodi = ''";
		$where = "AND ".implode(" AND ", $where);
		$like = "";
		if (!empty($key['search'])) {
			$like .= " AND (";
			$like .= " LOWER(nm_file_dokumen) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(nm_link_dokumen) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(nm_link_video) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(nm_file_gambar) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(penjelasan) LIKE '%".$key['search']."%'";
			$like .= ")";
		}
		$data = $this->mutu->query("
				SELECT id_file_dokumen, id_asdok_dokumen, nm_file_dokumen, tipe_file, institusi, kd_fak, kd_prodi, kd_pgw, waktu_simpan, is_public, link_dokumen, nm_link_dokumen, link_video, nm_link_video, file_gambar, nm_file_gambar, is_asesor, nm_group, no_group, penjelasan
				FROM file_dokumen
				WHERE id_asdok_dokumen IN (
					SELECT id_asdok_dokumen
					FROM asdok_dokumen
					WHERE id_aspek_dokumentasi IN (
						SELECT id_aspek_dokumentasi
						FROM aspek_dokumentasi
						WHERE id_dokumentasi = ".$key['id_dokumentasi']."
						AND no_standar IN (".$key['no_standar'].")
					)
				)
				".$where."
				".$like."
				ORDER BY waktu_simpan ASC
				LIMIT ".$key['limit']."
				OFFSET ".$key['start']."
		");
		return $data;
	}
	
	function cfd_2($key = array()){ // COUNT FILE_DOKUMEN IN ASDOK_DOKUMEN IN ASPEK_DOKUMENTASI WHERE INSTITUSI, KD_FAK, KD_PRODI, ID_DOKUMENTASI, NO_STANDAR
		$where[] = (!empty($key['institusi']))? "institusi = '".$key['institusi']."'" : "institusi = ''";
		$where[] = (!empty($key['kd_fak']))? "kd_fak = '".$key['kd_fak']."'" : "kd_fak = ''";
		$where[] = (!empty($key['kd_prodi']))? "kd_prodi = '".$key['kd_prodi']."'" : "kd_prodi = ''";
		$where = "AND ".implode(" AND ", $where);
		$like = "";
		if (!empty($key['search'])) {
			$like .= " AND (";
			$like .= " LOWER(nm_file_dokumen) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(nm_link_dokumen) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(nm_link_video) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(nm_file_gambar) LIKE '%".$key['search']."%'";
			$like .= " OR LOWER(penjelasan) LIKE '%".$key['search']."%'";
			$like .= ")";
		}
		$data = $this->mutu->query("
				SELECT COUNT(id_file_dokumen) AS total
				FROM file_dokumen
				WHERE id_asdok_dokumen IN (
					SELECT id_asdok_dokumen
					FROM asdok_dokumen
					WHERE id_aspek_dokumentasi IN (
						SELECT id_aspek_dokumentasi
						FROM aspek_dokumentasi
						WHERE id_dokumentasi = ".$key['id_dokumentasi']."
						AND no_standar IN (".$key['no_standar'].")
					)
				)
				".$where."
				".$like."
		");
		return $data;
	}
	// TABEL JOIN CARI_FILE_DOKUMENTASI END
	
	// TABEL JOIN ASPEK_DOKUMENTASI_V START
	function adv_1($key = array()){ // ASPEK_DOKUMENTASI_V WHERE ID_DOKUMENTASI, NO_STANDAR IN ASDOK_DOKUMEN IN LINK_SAPTO
		$data = $this->mutu->query("
				SELECT *
				FROM aspek_dokumentasi_v
				WHERE id_dokumentasi = ".$key['ID_DOKUMENTASI']."
				AND no_standar = ".$key['NO_STANDAR']."
				AND id_aspek_dokumentasi IN (
					SELECT id_aspek_dokumentasi
					FROM asdok_dokumen
					WHERE id_asdok_dokumen IN (
						SELECT id_asdok_dokumen
						FROM link_sapto
						WHERE institusi = '".$key['INSTITUSI']."'
						AND kd_fak = '".$key['KD_FAK']."'
						AND kd_prodi = '".$key['KD_PRODI']."'
					)
				)
				ORDER BY no_urut ASC, no_butir ASC
		");
		return $data;
	}
	// TABEL JOIN ASPEK_DOKUMENTASI_V END
	
	// TABEL JOIN ASDOK_DOKUMEN_V START
	function asdv_1($key = array()){ // ASDOK_DOKUMEN_V WHERE ID_ASPEK_DOKUMENTASI IN LINK_SAPTO
		$data = $this->mutu->query("
				SELECT *
				FROM asdok_dokumen_v
				WHERE id_aspek_dokumentasi = ".$key['ID_ASPEK_DOKUMENTASI']."
				AND id_asdok_dokumen IN (
					SELECT id_asdok_dokumen
					FROM link_sapto
					WHERE institusi = '".$key['INSTITUSI']."'
					AND kd_fak = '".$key['KD_FAK']."'
					AND kd_prodi = '".$key['KD_PRODI']."'
				)
				ORDER BY no_grup ASC, id_jenis_dokumen DESC, no_urut ASC, kode ASC
		");
		return $data;
	}
	// TABEL JOIN ASDOK_DOKUMEN_V END
}
?>