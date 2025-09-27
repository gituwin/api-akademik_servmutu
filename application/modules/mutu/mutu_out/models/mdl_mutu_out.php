<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_mutu_out extends CI_Model {

    public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');

		
	}



    public function akreditasi_dng($kd_prodi)
    {
        // return $this->mutu->query("SELECT kd_akreditasi, kd_unit, tgl_akreditasi,
        //  tgl_kadaluarsa, nilai_huruf, nilai_angka, 
        // nomor_sk, tahun_sk, nomor_sertifikat, doc_sk, doc_sertifikat, tgl_submit_sapto, tgl_input_borang, 
        // kd_lembaga_kreditasia, log_pgw, log_input,
        // tampilkan, kd_lembaga_kreditasi, kd_prodi
        
        //     FROM akreditasi_master_data ")->result_array();
        if (!empty($kd_prodi)) {
            # code...
            $query="SELECT kd_akreditasi, kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, 
            nomor_sk, tahun_sk, nomor_sertifikat, tgl_submit_sapto, tgl_input_borang, 
            kd_lembaga_kreditasia, log_pgw, log_input, ekstensi_doc_sertifikat, ekstensi_sert_akrd, tampilkan, kd_lembaga_kreditasi, kd_prodi
            
                FROM public.akreditasi_master_data WHERE tampilkan='YA'and kd_prodi='$kd_prodi'";
            $sql = $this->mutu->query($query);
            return $sql->result_array();
        }else {
            $query="SELECT kd_akreditasi, kd_unit, tgl_akreditasi, tgl_kadaluarsa, nilai_huruf, nilai_angka, 
            nomor_sk, tahun_sk, nomor_sertifikat, tgl_submit_sapto, tgl_input_borang, 
            kd_lembaga_kreditasia, log_pgw, log_input, ekstensi_doc_sertifikat, ekstensi_sert_akrd, tampilkan, kd_lembaga_kreditasi, kd_prodi
            
                FROM public.akreditasi_master_data WHERE tampilkan='YA'and kd_unit='201002'";
            $sql = $this->mutu->query($query);
            return $sql->result_array();
        }
        // return array('aaa' =>$kd_prodi , );

    }
    public function cek_sink_ter($id_prodi,$sia_pddikti,$tahun)
    {
        // $y=$tahun;
        // die();
        // $th=implode(",",$tahun);
        // return  array('aaa' =>$sia_pddikti, ) ;
        $quer="SELECT id_tbl, ts, jum_mhs_br_reg, jum_mhs_br_trnsfr, dt_dplkt, tahun, sia_pddikti, jmlh_mhs_aktf, jmlh_lulusan, smester, kd_pgw, id_prodi, waktu_simpan
        FROM public.ipepa_total_mhs_lulusan WHERE id_prodi='$id_prodi' AND sia_pddikti=$sia_pddikti AND ts_thn =$tahun AND ts='TS' ORDER BY waktu_simpan DESC LIMIT 1";
        $seql=$this->mutu->query($quer);
        return $seql->result_array();
        
    }

    public function requestan_huda()
    {
        
        $query = "SELECT akreditasi_master_unit.nm_unit,akreditasi_master_data.tgl_akreditasi,akreditasi_master_data.tgl_kadaluarsa,
        akreditasi_master_data.nilai_angka,akreditasi_master_data.nilai_huruf,tmp_akd_master_prodi.kd_jenis,tmp_akd_master_jenis.jenjang,
        la.nm_lembaga_akreditasi ,nomor_sk
        FROM public.akreditasi_master_unit LEFT join akreditasi_master_data ON akreditasi_master_unit.kd_unit = akreditasi_master_data.kd_unit 
        left join tmp_akd_master_prodi ON akreditasi_master_unit.kd_unit=tmp_akd_master_prodi.kd_pddikti 
        left join tmp_akd_master_jenis ON tmp_akd_master_prodi.kd_jenis=tmp_akd_master_jenis.kd_jenis 
        left join lembaga_akreditasi la on akreditasi_master_data.kd_lembaga_kreditasi =la.id_lembaga_akreditasi 
        WHERE akreditasi_master_data.tampilkan='YA'";
        $result = $this->mutu->query($query);
        return $result->result_array();

    }

    public function tampilkan_data_dosen_tetap($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_dosen_tetap
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY waktu_simpan DESC LIMIT 1";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_data_dosen_tidak_tetap($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_dosen_tidak_tetap
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY waktu_simpan DESC LIMIT 1";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_data_ipk_lulusan($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_ipk_lulusan
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY waktu_simpan DESC LIMIT 1";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_data_kohort_lulusan_prodi($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_kohort_lulusan_prodi
                WHERE id_prodi = '$id_prodi' AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY waktu_simpan DESC LIMIT 1";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_data_mhs_lulusan($id_prodi,$sia_pddikti,$tahun=array())
    {
        $th=implode(",",$tahun);
        // return  array('aaa' =>$sia_pddikti, ) ;
        $quer="  SELECT id_tbl, id_prd, kd_pegawai, waktu_simpan, sia_pddikti, ts, tahun, semester, jmlh_mhs_aktif, jmlh_mhs_asng_ftime, jmlh_mhs_asng_prtime
	FROM public.ipepa_mhs_asing WHERE id_prd='$id_prodi' AND sia_pddikti=$sia_pddikti and tahun IN($th) ORDER BY waktu_simpan DESC LIMIT 1";
        $seql=$this->mutu->query($quer);
        return $seql->result_array();
    }

    public function tampilkan_data_mhs_asing($id_prodi, $sia_pddikti, $tahun=array()){
        $th = implode(",",$tahun);
        $quer = "SELECT * FROM public.ipepa_mhs_asing 
                WHERE id_prd = '$id_prodi' AND sia_pddikti = $sia_pddikti and tahun IN($th)";
        $seql = $this->mutu->query($quer);
        return $seql->result_array();
    }

    public function tampilkan_semua_data_mhs_asing($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_mhs_asing
                WHERE id_prd = '$id_prodi' AND sia_pddikti = $sia_pddikti AND tahun = $ts
                ORDER BY id_tbl ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_semua_data_dosen_tetap($id_prodi, $sia_pddikti, $ts ,$tgl_hist){
        if ($tgl_hist==1) {
            # code...
        $query = "SELECT * FROM public.ipepa_dosen_tetap
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY id_ipepa_dosen_tetap ASC";
        $result = $this->mutu->query($query);

        }

        else{

            $query = "SELECT * FROM public.ipepa_dosen_tetap
            WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts and waktu_simpan::date='$tgl_hist'
            ORDER BY id_ipepa_dosen_tetap ASC"; 
        $result = $this->mutu->query($query);

        }

        // $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_semua_data_dosen_tidak_tetap($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_dosen_tidak_tetap
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY id_ipepa_dosen_tidak_tetap ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_semua_data_ipk_lulusan($id_prodi, $sia_pddikti, $ts){
        $query = "SELECT * FROM public.ipepa_ipk_lulusan
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts
                ORDER BY id_ipepa_ipk_lulusan ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_data_total_mhs_lulusan($id_prodi, $sia_pddikti, $ts){
        // $query = "SELECT * FROM public.ipepa_kohort_lulusan_prodi
        //         WHERE id_prodi = '$id_prodi' AND sia_pddikti = $sia_pddikti AND ts = $ts
        //         ORDER by waktu_simpan desc, ts_masuk  DESC limit 4";

            $query = "SELECT * FROM public.ipepa_total_mhs_lulusan
            WHERE id_prodi = '$id_prodi' AND sia_pddikti = $sia_pddikti AND ts_thn = $ts
            ORDER by ts DESC,  waktu_simpan desc limit 10";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_semua_data_kohort_lulusan_prodi ($id_prodi, $sia_pddikti, $ts,$tgl_acn)
    {
        if ($tgl_acn==1) {
            # code...
            $query = "SELECT * FROM public.ipepa_kohort_lulusan_prodi
                    WHERE id_prodi = '$id_prodi' AND sia_pddikti = $sia_pddikti AND ts = $ts
                    ORDER by waktu_simpan desc, ts_masuk  DESC limit 4";
            $result = $this->mutu->query($query);
        }else {
            $query = "SELECT * FROM public.ipepa_kohort_lulusan_prodi
            WHERE id_prodi = '$id_prodi' AND sia_pddikti = $sia_pddikti AND ts = $ts and waktu_simpan::date='$tgl_acn'
            ORDER by waktu_simpan desc, ts_masuk  DESC limit 4";
            $result = $this->mutu->query($query);
        }
        return $result->result_array();
    }

    public function tampilkan_matakuliah_dosen_tetap($id_prodi, $sia_pddikti, $ts, $nidn){
        $query = "SELECT * FROM public.ipepa_dosen_tetap
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts AND nidn = '$nidn'
                ORDER BY id_ipepa_dosen_tetap ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_matakuliah_dosen_tidak_tetap($id_prodi, $sia_pddikti, $ts, $id_dosen){
        $query = "SELECT * FROM public.ipepa_dosen_tidak_tetap
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts AND id_dosen = '$id_dosen'
                ORDER BY id_ipepa_dosen_tidak_tetap ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    public function tampilkan_detail_data_ipk_lulusan($id_prodi, $sia_pddikti, $ts, $ts_lulus){
        $query = "SELECT * FROM public.ipepa_detail_ipk_lulusan
                WHERE id_prodi = $id_prodi AND sia_pddikti = $sia_pddikti AND ts = $ts AND ts_lulus = '$ts_lulus'
                ORDER BY id_ipepa_detail_ipk_lulusan ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

    // public function tampilkan_jumlah_mahasiswa_aktif($id_prodi, $sia_pddikti, $tahun){
    //     $query = "SELECT * FROM public.ipepa_total_mhs_lulusan
    //             WHERE id_prodi = '$id_prodi' AND sia_pddikti = $sia_pddikti AND tahun = $tahun AND ts = 'TS'
    //             ORDER BY id_tbl ASC";
    //     $result = $this->mutu->query($query);
    //     return $result->result_array();
    // }

    public function tampilkan_jumlah_mahasiswa_aktif($id_prodi, $sia_pddikti, $tahun){
        $query = "SELECT * FROM public.ipepa_mhs_asing
                WHERE id_prd = '$id_prodi' AND sia_pddikti = $sia_pddikti AND tahun = $tahun AND ts = 'TS'
                ORDER BY id_tbl ASC";
        $result = $this->mutu->query($query);
        return $result->result_array();
    }

}

/* End of file Mdl_mutu_out.php */




?>