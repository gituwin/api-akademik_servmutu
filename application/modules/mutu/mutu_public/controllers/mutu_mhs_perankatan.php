<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutu_mhs_perankatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->model('m_akreditasi/mhs_per_ankatan', 'akrd');
			$this->mutu = $this->load->database('mutu');
	}

	public function index()
	{
		//  query nya tinal di cleaerin
// 		SELECT DISTINCT  nm_jenis,
// (SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
// ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ad ON 
// tmp_akd_master_prodi.kd_jenis=ad.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ad.nm_jenis=bb.nm_jenis 
// AND status='A' AND tmp_akd_d_mahasiswa.angkatan = 2013 AND kd_smt=1 AND reguler='1')AS maba_reguler,

// (SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
// ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ae ON 
// tmp_akd_master_prodi.kd_jenis=ae.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE ae.nm_jenis= bb.nm_jenis
// AND status='A' AND tmp_akd_d_mahasiswa.angkatan = 2013 AND kd_smt=1 AND reguler='0')AS maba_trnsf, 

// (SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
// ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis af ON 
// tmp_akd_master_prodi.kd_jenis=af.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE af.nm_jenis= bb.nm_jenis 
// AND status='A' AND tmp_akd_d_mahasiswa.angkatan =2013 AND reguler='1')AS total_reg,

// (SELECT count(DISTINCT tmp_akd_d_mahasiswa.nim) FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
// ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis ag ON 
// tmp_akd_master_prodi.kd_jenis=ag.kd_jenis 
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim WHERE  ag.nm_jenis= bb.nm_jenis 
// AND status='A' AND tmp_akd_d_mahasiswa.angkatan =2013  AND reguler='0') AS total_trnsfr

// FROM tmp_akd_d_mahasiswa LEFT JOIN tmp_akd_master_prodi 
// ON tmp_akd_d_mahasiswa.kd_prodi=tmp_akd_master_prodi.kd_prodi LEFT JOIN tmp_akd_master_jurusan ON
// tmp_akd_master_prodi.kd_jur=tmp_akd_master_jurusan.kd_jur LEFT JOIN tmp_akd_master_jenis bb ON 
// tmp_akd_master_prodi.kd_jenis=bb.kd_jenis
// LEFT JOIN tmp_akd_status_mhs ON tmp_akd_d_mahasiswa.nim=tmp_akd_status_mhs.nim 
// WHERE status='A' AND angkatan BETWEEN 2012 AND 2018 GROUP BY nm_jenis
	}

}

/* End of file mutu_mhs_perankatan.php */
/* Location: ./application/controllers/mutu_mhs_perankatan.php */