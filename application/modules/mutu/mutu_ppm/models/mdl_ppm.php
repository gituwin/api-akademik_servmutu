<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_ppm extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}

	public function get_karya_jenis(){
		$query = "SELECT * FROM tmp_ppm_karya_jenis ORDER BY kd_karya_jenis DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_karya_jenis($nama_karya_jenis, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_karya_jenis (nm_karya_jenis, log_pgw, log_input) values ('$nama_karya_jenis', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_karya_jenis($kd_karya_jenis){
		$query = "SELECT * FROM tmp_ppm_karya_jenis WHERE kd_karya_jenis = '$kd_karya_jenis'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_karya_jenis($kd_karya_jenis, $nama_karya_jenis, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_ppm_karya_jenis SET nm_karya_jenis = '$nama_karya_jenis', log_pgw='$log_pgw', log_input = '$time'  WHERE kd_karya_jenis = '$kd_karya_jenis'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_karya_jenis($kd_karya_jenis){
		$query = "DELETE FROM tmp_ppm_karya_jenis WHERE kd_karya_jenis = '$kd_karya_jenis'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_karya_penghargaan(){
		$query = "SELECT * FROM tmp_ppm_karya_penghargaan ORDER BY kd_karya_penghargaan DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_karya_penghargaan($nama_karya_penghargaan, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_karya_penghargaan (nm_karya_penghargaan, log_pgw, log_input) values ('$nama_karya_penghargaan', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_karya_penghargaan($kd_karya_penghargaan){
		$query = "SELECT * FROM tmp_ppm_karya_penghargaan WHERE kd_karya_penghargaan = '$kd_karya_penghargaan'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_karya_penghargaan($kd_karya_penghargaan, $nama_karya_penghargaan, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_ppm_karya_penghargaan SET nm_karya_penghargaan = '$nama_karya_penghargaan', log_pgw='$log_pgw', log_input='$time' WHERE kd_karya_penghargaan = '$kd_karya_penghargaan'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_karya_penghargaan($kd_karya_penghargaan){
		$query = "DELETE FROM tmp_ppm_karya_penghargaan WHERE kd_karya_penghargaan = '$kd_karya_penghargaan'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_keu_sumber_dana(){
		$query = "SELECT * FROM tmp_keu_sumber_dana ORDER BY kd_sumber_dana DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function get_keu_sumber_dana_guna(){
		$query = "SELECT * FROM tmp_keu_sumber_dana WHERE jenis=2 ORDER BY kd_sumber_dana DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function get_keu_sumber_dana_sumber(){
		$query = "SELECT * FROM tmp_keu_sumber_dana WHERE jenis=1 ORDER BY kd_sumber_dana DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_keu_sumber_dana($nm_sumber_dana, $jenis, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_keu_sumber_dana (nm_sumber_dana, jenis, log_pgw, log_input) values ('$nm_sumber_dana', '$jenis', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_keu_sumber_dana($kd_sumber_dana){
		$query = "SELECT * FROM tmp_keu_sumber_dana WHERE kd_sumber_dana = '$kd_sumber_dana'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_keu_sumber_dana($kd_sumber_dana, $nama_sumber_dana, $jenis_sumber_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_keu_sumber_dana SET nm_sumber_dana = '$nama_sumber_dana', jenis='$jenis_sumber_dana', log_pgw='$log_pgw', log_input='$time' WHERE kd_sumber_dana = '$kd_sumber_dana'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_keu_sumber_dana($kd_sumber_dana){
		$query = "DELETE FROM tmp_keu_sumber_dana WHERE kd_sumber_dana = '$kd_sumber_dana'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_keu_jenis_dana(){
		$query = "SELECT * FROM tmp_keu_jenis_dana a join  tmp_keu_sumber_dana b on a.kd_sumber_dana = b.kd_sumber_dana ORDER BY kd_jenis_dana DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function keu_sumber_dana_mhs(){
		$query = "SELECT * FROM tmp_keu_sumber_dana_mhs a JOIN tmp_keu_jenis_dana b ON a.kd_jenis_dana = b.kd_jenis_dana ORDER BY a.kd_jenis_dana_mhs DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_keu_jenis_dana($nm_jenis_dana, $kd_sumber_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_keu_jenis_dana (nm_jenis_dana, kd_sumber_dana, log_pgw, log_input) values ('$nm_jenis_dana', '$kd_sumber_dana', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_keu_jenis_dana($kd_jenis_dana){
		$query = "SELECT * FROM tmp_keu_jenis_dana WHERE kd_jenis_dana = '$kd_jenis_dana'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_keu_jenis_dana($kd_jenis_dana, $nama_jenis_dana, $kd_sumber_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_keu_jenis_dana SET nm_jenis_dana = '$nama_jenis_dana', kd_sumber_dana='$kd_sumber_dana', log_pgw='$log_pgw', log_input='$time' WHERE kd_jenis_dana = '$kd_jenis_dana'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_keu_jenis_dana($kd_jenis_dana){
		$query = "DELETE FROM tmp_keu_jenis_dana WHERE kd_jenis_dana = '$kd_jenis_dana'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_sumber_dana_mhs($nim, $tgl_bayar, $jml_bayar, $ta, $smt, $kd_jenis_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_keu_sumber_dana_mhs (nim, tgl_bayar, jml_bayar, ta, smt, kd_jenis_dana, log_pgw, log_input) values ('$nim', '$tgl_bayar', '$jml_bayar', '$ta', '$smt', '$kd_jenis_dana', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_keu_sumber_dana_mhs($kd_jenis_dana_mhs){
		$query = "SELECT * FROM tmp_keu_sumber_dana_mhs WHERE kd_jenis_dana_mhs = '$kd_jenis_dana_mhs'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_keu_sumber_dana_mhs($kd_jenis_dana_mhs, $nim, $tgl_bayar, $jml_bayar, $ta, $smt, $kd_jenis_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_keu_sumber_dana_mhs SET nim = '$nim', tgl_bayar='$tgl_bayar', jml_bayar='$jml_bayar', ta='$ta', smt='$smt', kd_jenis_dana='$kd_jenis_dana', log_pgw = '$log_pgw', log_input = '$time' WHERE kd_jenis_dana_mhs = '$kd_jenis_dana_mhs'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_keu_sumber_dana_mhs($kd_jenis_dana_mhs){
		$query = "DELETE FROM tmp_keu_sumber_dana_mhs WHERE kd_jenis_dana_mhs = '$kd_jenis_dana_mhs'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_keu_guna_dana_ppm(){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a LEFT JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g LEFT JOIN tmp_keu_sumber_dana c on b.kd_sumber_dana = c.kd_sumber_dana LEFT JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis LEFT JOIN tmp_ppm_karya_penghargaan e ON a.kd_karya_penghargaan = e.kd_karya_penghargaan LEFT JOIN tmp_ppm_m_tingkat f ON a.kd_tingkat = f.kd_tingkat ORDER BY a.kd_guna_ppm DESC;";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function get_keu_jenis_guna(){
		$query = "SELECT * FROM tmp_keu_jenis_guna a join  tmp_keu_sumber_dana b on a.kd_sumber_dana = b.kd_sumber_dana ORDER BY kd_jenis_g DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function get_keu_jenis_guna_by_kd_sumber_dana($kd_sumber_dana){
		$query = "SELECT * FROM tmp_keu_jenis_guna a join  tmp_keu_sumber_dana b on a.kd_sumber_dana = b.kd_sumber_dana WHERE a.kd_sumber_dana = '$kd_sumber_dana' ORDER BY kd_jenis_g DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_keu_jenis_guna($nm_jenis_g, $kd_sumber_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_keu_jenis_guna (nm_jenis_g, kd_sumber_dana, log_pgw, log_input) values ('$nm_jenis_g', '$kd_sumber_dana', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_keu_jenis_guna($kd_jenis_g){
		$query = "SELECT * FROM tmp_keu_jenis_guna WHERE kd_jenis_g = '$kd_jenis_g'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_keu_jenis_guna($kd_jenis_g, $nm_jenis_g, $kd_sumber_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_keu_jenis_guna SET nm_jenis_g = '$nm_jenis_g', kd_sumber_dana='$kd_sumber_dana', log_pgw='$log_pgw', log_input='$time' WHERE kd_jenis_g = '$kd_jenis_g'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_keu_jenis_guna($kd_jenis_g){
		$query = "DELETE FROM tmp_keu_jenis_guna WHERE kd_jenis_g = '$kd_jenis_g'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_keu_guna_dana(){
		$query = "SELECT * FROM tmp_keu_guna_dana a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana ORDER BY a.kd_guna_d DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_keu_guna_dana($kd_jenis_g, $tgl_guna_d, $jml_guna_d, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_keu_guna_dana (kd_jenis_g, tgl_guna_d, jml_guna_d, log_pgw, log_input) values ('$kd_jenis_g', '$tgl_guna_d', '$jml_guna_d', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_keu_guna_dana($kd_guna_d){
		$query = "SELECT * FROM tmp_keu_guna_dana WHERE kd_guna_d = '$kd_guna_d'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_keu_guna_dana($kd_guna_d, $kd_jenis_g, $tgl_guna_dana, $jml_guna_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_keu_guna_dana SET kd_jenis_g = '$kd_jenis_g', tgl_guna_d='$tgl_guna_dana', jml_guna_d='$jml_guna_dana', log_pgw='$log_pgw', log_input='$time' WHERE kd_guna_d = '$kd_guna_d'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_keu_guna_dana($kd_guna_d){
		$query = "DELETE FROM tmp_keu_guna_dana WHERE kd_guna_d = '$kd_guna_d'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_data_tingkat(){
		$query = "SELECT * FROM tmp_ppm_m_tingkat ORDER BY kd_tingkat DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function get_data_jenis_recognisi(){
		$query = "SELECT * FROM tmp_ppm_m_jenis_recog_dosen ORDER BY kd_jenis_recog DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function get_data_jenis_haki(){
		$query = "SELECT * FROM tmp_m_jenis_haki ORDER BY kd_jenis_haki DESC";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
	}
	public function tambah_data_tingkat($nm_tingkat, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_m_tingkat (nm_tingkat, log_pgw, log_input) values ('$nm_tingkat', '$log_pgw', '$time')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_tingkat($kd_tingkat){
		$query = "SELECT * FROM tmp_ppm_m_tingkat WHERE kd_tingkat = '$kd_tingkat'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_tingkat($kd_tingkat, $nm_tingkat, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_ppm_m_tingkat SET nm_tingkat = '$nm_tingkat', log_pgw='$log_pgw', log_input = '$time'  WHERE kd_tingkat = '$kd_tingkat'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_tingkat($kd_tingkat){
		$query = "DELETE FROM tmp_ppm_m_tingkat WHERE kd_tingkat = '$kd_tingkat'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm($nip, $nm_ppm, $tgl_guna_ppm, $jml_guna_ppm, $kd_jenis_g, $nm_karya_d, $tgl_karya_d, $kd_karya_jenis, $kd_karya_penghargaan, $tgl_karya_penghargaan, $tingkat, $log_pgw, $tahun){
		$time = date('Y-m-d H:i:s');
		$kolom = '';
		$value = "";

		if (!empty($kd_jenis_g)) {
			$kolom .= 'kd_jenis_g, ';
			$value .= $kd_jenis_g.', ';
		}
		if (!empty($kd_karya_jenis)) {
			$kolom .= 'kd_karya_jenis, ';
			$value .= $kd_karya_jenis.', ';
		}
		if (!empty($kd_karya_penghargaan)) {
			$kolom .= 'kd_karya_penghargaan, ';
			$value .= $kd_karya_penghargaan.', ';
		}
		if (!empty($kd_tingkat)) {
			$kolom .= 'kd_tingkat, ';
			$value .= $kd_tingkat.', ';
		}

		if (!empty($tgl_guna_ppm)) {
			$kolom .= 'tgl_guna_ppm, ';
			$value .= $tgl_guna_ppm.', ';
		}if (!empty($tgl_karya_d)) {
			$kolom .= 'tgl_karya_d, ';
			$value .= $tgl_karya_d.', ';
		}if (!empty($tgl_karya_penghargaan)) {
			$kolom .= 'tgl_karya_penghargaan, ';
			$value .= $tgl_karya_penghargaan.', ';
		}

		$kolom .= 'nip, nm_ppm, jml_guna_ppm, nm_karya_d, log_pgw, log_input, tahun';
		$value .= "'$nip', '$nm_ppm', '$jml_guna_ppm', '$nm_karya_d', '$log_pgw', '$time', '$tahun'";

		$query = "INSERT INTO tmp_keu_guna_dana_ppm (".$kolom.") values (".$value.")";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_penelitian($nip, $nm_ppm, $kd_jenis_g, $kd_karya_jenis, $jml_guna_ppm, $tahun){
		if($kd_jenis_g == ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, jml_guna_ppm, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$jml_guna_ppm', '$tahun')";
		}else{
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_jenis_g, kd_karya_jenis, jml_guna_ppm, tahun) values('$nip', '$nm_ppm', '$kd_jenis_g', '$kd_karya_jenis', '$jml_guna_ppm', '$tahun')";
		}
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_lainnya($nip, $nm_ppm, $kd_jenis_g, $jml_guna_ppm, $tahun){
		if($kd_jenis_g == ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, jml_guna_ppm, tahun) values('$nip', '$nm_ppm', '$jml_guna_ppm', '$tahun')";
		}else{
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_jenis_g, jml_guna_ppm, tahun) values('$nip', '$nm_ppm', '$kd_jenis_g', '$jml_guna_ppm', '$tahun')";
		}
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_recognisi($nip, $nm_ppm, $kd_karya_jenis, $kd_jenis_recognisi, $nm_pertemuan, $tingkat, $jabatan, $lem_beri_penghargaan, $keterangan, $tahun){
		if($kd_jenis_recognisi == '' && $tingkat != ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, nm_karya_d, kd_tingkat, jabatan_recog, lem_beri_penghargaan, keterangan_recog, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$nm_pertemuan', '$tingkat', '$jabatan', '$lem_beri_penghargaan', '$keterangan', '$tahun')";
		}else if($tingkat == '' && $kd_jenis_recognisi != ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, kd_jenis_recog, nm_karya_d, jabatan_recog, lem_beri_penghargaan, keterangan_recog, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$kd_jenis_recognisi', '$nm_pertemuan', '$jabatan', '$lem_beri_penghargaan', '$keterangan', '$tahun')";
		}else if($tingkat == '' && $kd_jenis_recognisi == ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, nm_karya_d, jabatan_recog, lem_beri_penghargaan, keterangan_recog, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$nm_pertemuan', '$jabatan', '$lem_beri_penghargaan', '$keterangan', '$tahun')";
		}else{
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, kd_jenis_recog, nm_karya_d, kd_tingkat, jabatan_recog, lem_beri_penghargaan, keterangan_recog, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$kd_jenis_recognisi', '$nm_pertemuan', '$tingkat', '$jabatan', '$lem_beri_penghargaan', '$keterangan', '$tahun')";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function update_data_keu_guna_dana_ppm_recognisi($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $kd_jenis_recognisi, $nm_pertemuan, $tingkat, $jabatan, $lem_beri_penghargaan, $keterangan, $tahun){
		if($kd_jenis_recognisi == '' && $tingkat != ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', nm_karya_d='$nm_pertemuan', kd_tingkat = '$tingkat', jabatan_recog = '$jabatan', lem_beri_penghargaan = '$lem_beri_penghargaan', keterangan_recog = '$keterangan', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else if($tingkat == '' && $kd_jenis_recognisi != ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', kd_jenis_recog = '$kd_jenis_recognisi', nm_karya_d='$nm_pertemuan', jabatan_recog = '$jabatan', lem_beri_penghargaan = '$lem_beri_penghargaan', keterangan_recog = '$keterangan', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else if($tingkat == '' && $kd_jenis_recognisi == ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', nm_karya_d='$nm_pertemuan', jabatan_recog = '$jabatan', lem_beri_penghargaan = '$lem_beri_penghargaan', keterangan_recog = '$keterangan', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else{
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', kd_jenis_recog = '$kd_jenis_recognisi', nm_karya_d='$nm_pertemuan', kd_tingkat = '$tingkat', jabatan_recog = '$jabatan', lem_beri_penghargaan = '$lem_beri_penghargaan', keterangan_recog = '$keterangan', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_jurnal($nip, $nm_ppm, $kd_karya_jenis, $nm_karya_d, $vol_no_tahun, $tingkat, $url, $tahun){
		if($tingkat == ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, nm_karya_d, vol_no_tahun, url, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$nm_karya_d', '$vol_no_tahun', '$url', '$tahun')";
		}else{
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, nm_karya_d, vol_no_tahun, kd_tingkat, url, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$nm_karya_d', '$vol_no_tahun', '$tingkat', '$url', '$tahun')";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function simpan_data_keu_guna_dana_ppm_jurnal($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $nm_karya_d, $vol_no_tahun, $tingkat, $url, $tahun){
		if($tingkat == ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', nm_karya_d='$nm_karya_d', vol_no_tahun = '$vol_no_tahun', url = '$url', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else{
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', nm_karya_d='$nm_karya_d', vol_no_tahun = '$vol_no_tahun' , kd_tingkat = '$tingkat', url = '$url', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_buku($nip, $nm_ppm, $kd_karya_jenis, $penerbit, $isbn, $tahun, $kd_tingkat){
		$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, penerbit, isbn, tahun, kd_tingkat) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$penerbit', '$isbn', '$tahun', '$kd_tingkat')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function simpan_data_keu_guna_dana_ppm_buku($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $penerbit, $isbn, $tahun, $kd_tingkat){
		$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', penerbit='$penerbit', isbn = '$isbn', tahun='$tahun', kd_tingkat='$kd_tingkat' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_seminar($nip, $nm_ppm, $kd_karya_jenis, $nm_karya_d, $penyelenggara, $isbn, $tingkat, $tahun){
		if($tingkat == ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, nm_karya_d, penyelenggara, isbn, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$nm_karya_d', '$penyelenggara', '$isbn', '$tahun')";
		}else{
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, nm_karya_d, penyelenggara, isbn, kd_tingkat, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$nm_karya_d', '$penyelenggara', '$isbn', '$tingkat', '$tahun')";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function simpan_data_keu_guna_dana_ppm_seminar($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $nm_karya_d, $penyelenggara, $isbn, $tingkat, $tahun){
		if($tingkat == ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', nm_karya_d='$nm_karya_d', penyelenggara = '$penyelenggara', isbn = '$isbn', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else{
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', nm_karya_d='$nm_karya_d', penyelenggara = '$penyelenggara', isbn = '$isbn', kd_tingkat = '$tingkat', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_chapter($nip, $nm_ppm, $kd_karya_jenis, $judul_chapter, $penerbit, $isbn, $tahun){
		$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, judul_chapter, penerbit, isbn, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$judul_chapter', '$penerbit', '$isbn', '$tahun')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function simpan_data_keu_guna_dana_ppm_chapter($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $judul_chapter, $penerbit, $isbn, $tahun){
		$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', judul_chapter='$judul_chapter', penerbit = '$penerbit', isbn = '$isbn', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_produk($nip, $nm_ppm, $kd_karya_jenis, $tahun){
		$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$tahun')";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function simpan_data_keu_guna_dana_ppm_produk($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $tahun){
		$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function tambah_data_keu_guna_dana_ppm_haki($nip, $nm_ppm, $kd_karya_jenis, $kd_jenis_haki, $tahun){
		if($kd_jenis_haki == ''){
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$tahun')";
		}else{
			$query = "INSERT INTO tmp_keu_guna_dana_ppm (nip, nm_ppm, kd_karya_jenis, kd_jenis_haki, tahun) values('$nip', '$nm_ppm', '$kd_karya_jenis', '$kd_jenis_haki', '$tahun')";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function simpan_data_keu_guna_dana_ppm_haki($kd_guna_ppm, $nip, $nm_ppm, $kd_karya_jenis, $kd_jenis_haki, $tahun){
		$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm = '$nm_ppm', kd_karya_jenis = '$kd_karya_jenis', kd_jenis_haki = '$kd_jenis_haki', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function edit_keu_guna_dana_ppm($kd_guna_ppm){
		//$query = "SELECT * FROM tmp_keu_guna_dana_ppm WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a LEFT JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g LEFT JOIN tmp_keu_sumber_dana c on b.kd_sumber_dana = c.kd_sumber_dana LEFT JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis LEFT JOIN tmp_ppm_karya_penghargaan e ON a.kd_karya_penghargaan = e.kd_karya_penghargaan LEFT JOIN tmp_ppm_m_tingkat f ON a.kd_tingkat = f.kd_tingkat WHERE a.kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}public function update_data_keu_guna_dana_ppm($kd_guna_ppm, $nip, $nm_ppm, $tgl_guna_ppm, $jml_guna_ppm, $kd_jenis_g, $nm_karya_d, $tgl_karya_d, $kd_karya_jenis, $kd_karya_penghargaan, $tgl_karya_penghargaan, $tingkat, $log_pgw, $tahun){
		$time = date('Y-m-d H:i:s');
		$kolom_value = '';

		if (!empty($kd_jenis_g)) {
			$kolom_value .= 'kd_jenis_g = '.$kd_jenis_g.', ';
		}
		if (!empty($kd_karya_jenis)) {
			$kolom_value .= 'kd_karya_jenis = '.$kd_karya_jenis.', ';
		}
		if (!empty($kd_karya_penghargaan)) {
			$kolom_value .= 'kd_karya_penghargaan = '.$kd_karya_penghargaan.', ';
		}
		if (!empty($tgl_guna_ppm)) {
			$kolom_value .= 'tgl_guna_ppm = '.$tgl_guna_ppm.', ';
		}
		if (!empty($tgl_karya_d)) {
			$kolom .= 'tgl_karya_d = '.$tgl_karya_d.', ';
		}
		if (!empty($tgl_karya_penghargaan)) {
			$kolom .= 'tgl_karya_penghargaan = '.$tgl_karya_penghargaan.', ';
		}
		$kolom_value .= "nip = '$nip', nm_ppm = '$nm_ppm', jml_guna_ppm ='$jml_guna_ppm', nm_karya_d = '$nm_karya_d', log_pgw = '$log_pgw', log_input = '$time'";

		$query = "UPDATE tmp_keu_guna_dana_ppm SET ".$kolom_value." WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function update_data_keu_guna_dana_ppm_penelitian($kd_guna_ppm, $nip, $nm_ppm, $kd_jenis_g, $jml_guna_ppm, $kd_karya_jenis, $tahun){
		if($kd_jenis_g == ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm='$nm_ppm', jml_guna_ppm = '$jml_guna_ppm', kd_karya_jenis = '$kd_karya_jenis', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else{
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm='$nm_ppm', kd_jenis_g = '$kd_jenis_g', jml_guna_ppm = '$jml_guna_ppm', kd_karya_jenis = '$kd_karya_jenis', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function update_data_keu_guna_dana_ppm_lainnya($kd_guna_ppm, $nip, $nm_ppm, $kd_jenis_g, $jml_guna_ppm, $tahun){
		if($kd_jenis_g == ''){
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm='$nm_ppm', jml_guna_ppm = '$jml_guna_ppm', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}else{
			$query = "UPDATE tmp_keu_guna_dana_ppm SET nip = '$nip', nm_ppm='$nm_ppm', kd_jenis_g = '$kd_jenis_g', jml_guna_ppm = '$jml_guna_ppm', tahun='$tahun' WHERE kd_guna_ppm = '$kd_guna_ppm'";
		}
		
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_keu_guna_dana_ppm($kd_guna_ppm){
		$query = "DELETE FROM tmp_keu_guna_dana_ppm WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function getrecordCount(){
		$this->db->select('count(*) as allcount');
      	$this->db->from('tmp_keu_guna_dana_ppm');
      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];
	}public function getrecordCount_staf(){
		$this->db->select('count(*) as allcount');
      	$this->db->from('tmp_pgw_staf');
      	$query = $this->db->get();
      	$result = $query->result_array();
      
      	return $result[0]['allcount'];
	}
	public function getData($rowno, $rowperpage){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a LEFT JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g LEFT JOIN tmp_keu_sumber_dana c on b.kd_sumber_dana = c.kd_sumber_dana LEFT JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis LEFT JOIN tmp_ppm_karya_penghargaan e ON a.kd_karya_penghargaan = e.kd_karya_penghargaan LEFT JOIN tmp_ppm_m_tingkat f ON a.kd_tingkat = f.kd_tingkat LEFT JOIN tmp_pgw_staf g ON a.nip = g.nip ORDER BY a.kd_guna_ppm DESC LIMIT '$rowperpage' OFFSET '$rowno'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}public function getData_staf($rowno, $rowperpage){
		$query = "SELECT nip, nama, tahun_serdos, id_orchid, id_google_scholar, id_sinta, id_scopus FROM tmp_pgw_staf LIMIT '$rowperpage' OFFSET '$rowno'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function cari_data_keu_guna_dana_ppm($key){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a LEFT JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g LEFT JOIN tmp_keu_sumber_dana c on b.kd_sumber_dana = c.kd_sumber_dana LEFT JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis LEFT JOIN tmp_ppm_karya_penghargaan e ON a.kd_karya_penghargaan = e.kd_karya_penghargaan LEFT JOIN tmp_ppm_m_tingkat f ON a.kd_tingkat = f.kd_tingkat LEFT JOIN tmp_pgw_staf g ON a.nip = g.nip WHERE LOWER(g.nama) like '%$key%' OR LOWER(a.nm_ppm) like '%$key%' OR a.nip like '%$key%' ORDER BY a.kd_guna_ppm ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function cari_data_tmp_pgw_staf($key){
		$query = "SELECT nip, nama, tahun_serdos, id_orchid, id_google_scholar, id_sinta, id_scopus FROM tmp_pgw_staf WHERE LOWER(nip) like '%$key%' OR LOWER(nama) like '%$key%'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function edit_tmp_pgw_staf($nip){
		//$query = "SELECT * FROM tmp_keu_guna_dana_ppm WHERE kd_guna_ppm = '$kd_guna_ppm'";
		$query = "SELECT nip, nama, tahun_serdos, id_orchid, id_google_scholar, id_sinta, id_scopus, url_orchid, url_google_scholar, url_sinta, url_scopus FROM tmp_pgw_staf WHERE nip = '$nip'";
		$sql = $this->mutu->query($query);
		return $sql->row_array();
	}
	public function update_data_tmp_pgw_staf($nip, $nama, $tahun_serdos, $id_orchid, $id_google_scholar, $id_sinta, $id_scopus, $url_orchid, $url_google, $url_sinta, $url_scopus){
		$url_sinta = pg_escape_string($url_sinta);
		$url_orchid = pg_escape_string($url_orchid);
		$url_google = pg_escape_string($url_google);
		$url_scopus = pg_escape_string($url_scopus);
		$query = "UPDATE tmp_pgw_staf SET tahun_serdos = '$tahun_serdos', id_orchid='$id_orchid', id_google_scholar = '$id_google_scholar', id_sinta = '$id_sinta', id_scopus = '$id_scopus', url_orchid = '{$url_orchid}', url_google_scholar = '{$url_google}', url_sinta = '{$url_sinta}', url_scopus = '{$url_scopus}' WHERE nip = '$nip'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_data_penelitian_dosen_biaya($kd_jenis_g, $tahun){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g = '$kd_jenis_g' and a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_penelitian_dosen_biaya_rincian($kd_jenis_g, $tahun){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g = '$kd_jenis_g' and a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_penelitian_dosen_biaya_total_rincian($kd_jenis_g, $ts, $ts_1, $ts_2){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g = '$kd_jenis_g' and a.tahun IN('$ts', '$ts_1', '$ts_2') ORDER BY a.tahun DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_penelitian_dosen_biaya_total_rincian_semua($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $tahun){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g IN ('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5') and a.tahun ='$tahun' ORDER BY a.kd_jenis_g DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_penelitian_dosen_biaya_total_rincian_all($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $ts, $ts_1, $ts_2){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g IN ('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5') and a.tahun IN ('$ts', '$ts_1', '$ts_2') ORDER BY a.kd_jenis_g DESC, a.tahun DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_penelitian_dosen_biaya_total($kd_jenis_g, $ts, $ts_1, $ts_2){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g = '$kd_jenis_g' and a.tahun IN('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_jml_penelitian_dosen_ts2($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $tahun){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g IN ('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5') and a.tahun ='$tahun'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_jml_penelitian_dosen_total($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $ts, $ts_1, $ts_2){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip where a.kd_jenis_g IN ('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5') and a.tahun IN ('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_jurnal_terakreditasi($kd_karya_jenis, $kd_tingkat, $tahun){
		/*$kd_karya_jenis = '3';
		$kd_tingkat = '1';*/
		/*$tahun = '2018';*/
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis = '$kd_karya_jenis' and a.kd_tingkat='$kd_tingkat' and a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_jurnal_terakreditasi_total($kd_karya_jenis, $kd_tingkat, $ts, $ts_1, $ts_2){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis = '$kd_karya_jenis' and a.kd_tingkat = '$kd_tingkat' and a.tahun IN('$ts', '$ts_1', '$ts_2') ";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_jurnal_terakreditasi_rincian($kd_karya_jenis, $kd_tingkat, $tahun){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis = '$kd_karya_jenis' and a.kd_tingkat='$kd_tingkat' and a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jurnal_terakreditasi_total_rincian($kd_karya_jenis, $kd_tingkat, $ts, $ts_1, $ts_2){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis = '$kd_karya_jenis' and a.kd_tingkat = '$kd_tingkat' and a.tahun IN('$ts', '$ts_1', '$ts_2') ORDER BY a.tahun ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_karya_ts2($kd_tingkat_1, $kd_tingkat_2, $kd_tingkat_3, $kd_karya_jenis_1, $kd_karya_jenis_2, $kd_karya_jenis_3, $kd_karya_jenis_4, $tahun){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis IN ('$kd_karya_jenis_1', '$kd_karya_jenis_2', '$kd_karya_jenis_3', '$kd_karya_jenis_4') and a.kd_tingkat IN('$kd_tingkat_1', '$kd_tingkat_2', '$kd_tingkat_3') and a.tahun ='$tahun'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_jml_karya_dosen_total($kd_tingkat_1, $kd_tingkat_2, $kd_tingkat_3, $kd_karya_jenis_1, $kd_karya_jenis_2, $kd_karya_jenis_3, $kd_karya_jenis_4, $ts, $ts_1, $ts_2){
		$query = "SELECT count(*) as jumlah from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis IN ('$kd_karya_jenis_1', '$kd_karya_jenis_2', '$kd_karya_jenis_3', '$kd_karya_jenis_4') and a.kd_tingkat IN('$kd_tingkat_1', '$kd_tingkat_2', '$kd_tingkat_3') and a.tahun IN ('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_karya_rincian_semua_ts($kd_karya_jenis_1, $kd_karya_jenis_2, $kd_karya_jenis_3, $kd_karya_jenis_4, $kd_tingkat_1, $kd_tingkat_2, $kd_tingkat_3, $tahun){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis IN ('$kd_karya_jenis_1', '$kd_karya_jenis_2', '$kd_karya_jenis_3', '$kd_karya_jenis_4') and a.kd_tingkat IN('$kd_tingkat_1', '$kd_tingkat_2', '$kd_tingkat_3') and a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_karya_rincian_semua($kd_karya_jenis_1, $kd_karya_jenis_2, $kd_karya_jenis_3, $kd_karya_jenis_4, $kd_tingkat_1, $kd_tingkat_2, $kd_tingkat_3, $ts, $ts_1, $ts_2){
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip JOIN tmp_ppm_m_tingkat c ON a.kd_tingkat = c.kd_tingkat JOIN tmp_ppm_karya_jenis d ON a.kd_karya_jenis = d.kd_karya_jenis where a.kd_karya_jenis IN ('$kd_karya_jenis_1', '$kd_karya_jenis_2', '$kd_karya_jenis_3', '$kd_karya_jenis_4') and a.kd_tingkat IN('$kd_tingkat_1', '$kd_tingkat_2', '$kd_tingkat_3') and a.tahun IN('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_haki_paten_penghargaan(){
		$tahun = date('Y');
		$ts_2 = $tahun-3;
		$ts_1 = $tahun-2;
		$ts = $tahun-1;
		$query = "SELECT * from tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip=b.nip where (a.tahun in('$ts_2', '$ts_1', '$ts')) and ((a.kd_karya_jenis = 24 and a.kd_jenis_haki in(1,2)) or (a.kd_karya_jenis = 25 and a.kd_jenis_recog = 5)) order by a.kd_jenis_haki, a.tahun asc";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi($kd_jenis_g, $tahun){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g = '$kd_jenis_g' AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	/*public function get_data_pengabdian_dari_institusi_gabung($kd_jenis_g, $kd_jenis_gg, $kd_jenis_ggg, $kd_jenis_gggg, $tahun){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN('$kd_jenis_g', '$kd_jenis_gg', '$kd_jenis_ggg', '$kd_jenis_gggg') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}*/
	public function get_data_pengabdian_dari_institusi_gabung($kd_jenis_g, $kd_jenis_gg, $tahun){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_gabung_rincian($kd_jenis_g, $kd_jenis_gg, $tahun){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_rincian($kd_jenis_g, $tahun){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g = '$kd_jenis_g' AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_total($kd_jenis_g, $ts, $ts_1, $ts_2){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g = '$kd_jenis_g' AND a.tahun IN('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_gabung_total($kd_jenis_g, $kd_jenis_gg, $ts, $ts_1, $ts_2){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun IN('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_total_rincian($kd_jenis_g, $ts, $ts_1, $ts_2){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g = '$kd_jenis_g' AND a.tahun IN ('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_gabung_total_rincian($kd_jenis_g, $kd_jenis_gg, $ts, $ts_1, $ts_2){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun IN ('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_pengabdian_ts1($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $kd_jenis_g_8, $tahun){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5', '$kd_jenis_g_8') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_pengabdian_rincian($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $kd_jenis_g_8, $tahun){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5', '$kd_jenis_g_8') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_pengabdian_total($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4, $kd_jenis_g_5, $kd_jenis_g_8, $ts, $ts_1, $ts_2){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5', '$kd_jenis_g_8') AND a.tahun IN ('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_pengabdian_total_rincian($kd_jenis_g_1, $kd_jenis_g_2, $kd_jenis_g_3, $kd_jenis_g_4,$kd_jenis_g_5, $kd_jenis_g_8, $ts, $ts_1, $ts_2){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN('$kd_jenis_g_1', '$kd_jenis_g_2', '$kd_jenis_g_3', '$kd_jenis_g_4', '$kd_jenis_g_5', '$kd_jenis_g_8') AND a.tahun IN('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_terkait($kd_jenis_g, $kd_jenis_gg, $tahun){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_terkait_rincian($kd_jenis_g, $kd_jenis_gg, $tahun){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}

	public function get_data_pengabdian_dari_institusi_terkait_total($kd_jenis_g, $kd_jenis_gg, $ts, $ts_1, $ts_2){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun IN('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_pengabdian_dari_institusi_terkait_total_rincian($kd_jenis_g, $kd_jenis_gg, $ts, $ts_1, $ts_2){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$kd_jenis_g', '$kd_jenis_gg') AND a.tahun IN ('$ts', '$ts_1', '$ts_2')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_rincian_penghargaan($kd_guna_ppm){
		$query = "SELECT b.nama, a.kd_guna_ppm, a.nm_ppm, a.tahun, a.kd_karya_jenis, a.kd_jenis_haki FROM tmp_keu_guna_dana_ppm a JOIN tmp_pgw_staf b ON a.nip = b.nip WHERE a.kd_guna_ppm = '$kd_guna_ppm'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_sistem_pengolah_data(){
		$query = "SELECT * FROM tmp_ppm_sistem_pengolah_data ORDER BY id_sistem_pengolah_data DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_aksesbilitas_data(){
		$query = "SELECT * FROM tmp_ppm_aksesbilitas_data a JOIN tmp_ppm_sistem_pengolah_data b ON a.id_sistem_pengolah_data = b.id_sistem_pengolah_data ORDER BY a.id_aksesbilitas ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function tambah_aksesbilitas_data($jenis_data, $id_sistem_pengolah_data, $nm_media, $nm_sistem, $url, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_aksesbilitas_data (jenis_data, id_sistem_pengolah_data, nm_media, nm_sistem, url, log_pgw, log_input) VALUES ('$jenis_data', '$id_sistem_pengolah_data', '$nm_media', '$nm_sistem', '$url', '$log_pgw', '$time')";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function edit_aksesbilitas_data($id_aksesbilitas){
		$query = "SELECT * FROM tmp_ppm_aksesbilitas_data WHERE id_aksesbilitas = '$id_aksesbilitas'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function update_aksesbilitas_data($id_aksesbilitas, $jenis_data, $id_sistem_pengolah_data, $nm_media, $nm_sistem, $url, $log_pgw){
		$time = date('Y-m-d H:i:s');

		$query = "UPDATE tmp_ppm_aksesbilitas_data SET jenis_data = '$jenis_data', id_sistem_pengolah_data = '$id_sistem_pengolah_data', nm_media='$nm_media', nm_sistem = '$nm_sistem', url='$url', log_pgw='$log_pgw', log_input = '$time'  WHERE id_aksesbilitas = '$id_aksesbilitas'";
		$sql = $this->mutu->query($query);
		return $sql;
		
	}
	public function hapus_aksesbilitas_data($id_aksesbilitas){
		$query = "DELETE FROM tmp_ppm_aksesbilitas_data WHERE id_aksesbilitas = '$id_aksesbilitas'";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function get_rincian_aksesbilitas_data($id_aksesbilitas){
		$query = "SELECT * FROM tmp_ppm_aksesbilitas_data a JOIN tmp_ppm_sistem_pengolah_data b ON a.id_sistem_pengolah_data = b.id_sistem_pengolah_data WHERE a.id_aksesbilitas = '$id_aksesbilitas'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_lokasi_lahan(){
		$query = "SELECT * FROM tmp_ppm_lokasi_perguruan_tinggi a JOIN tmp_status_kepemilikan_lahan b ON a.id_status_kepemilikan_lahan = b.id_status_kepemilikan_lahan ORDER BY a.id_lokasi ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_lokasi_bangunan(){
		$query = "SELECT * FROM tmp_ppm_lokasi_lahan a JOIN tmp_status_kepemilikan_lahan b ON a.id_status_kepemilikan_lahan = b.id_status_kepemilikan_lahan ORDER BY a.id_lokasi_lahan ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_rincian_lokasi($id_lokasi){
		$query = "SELECT * FROM tmp_ppm_lokasi_perguruan_tinggi a JOIN tmp_status_kepemilikan_lahan b ON a.id_status_kepemilikan_lahan = b.id_status_kepemilikan_lahan WHERE a.id_lokasi = '$id_lokasi'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_rincian_lokasi_bangunan($id_lokasi){
		$query = "SELECT * FROM tmp_ppm_lokasi_lahan a JOIN tmp_status_kepemilikan_lahan b ON a.id_status_kepemilikan_lahan = b.id_status_kepemilikan_lahan WHERE a.id_lokasi_lahan = '$id_lokasi'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_status_kepemilikan_lahan(){
		$query = "SELECT * FROM tmp_status_kepemilikan_lahan ORDER BY id_status_kepemilikan_lahan DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function edit_lokasi_lahan($id_lokasi){
		$query = "SELECT * FROM tmp_ppm_lokasi_perguruan_tinggi WHERE id_lokasi = '$id_lokasi'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function edit_lokasi_bangunan($id_lokasi){
		$query = "SELECT * FROM tmp_ppm_lokasi_lahan WHERE id_lokasi_lahan = '$id_lokasi'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_koordinat_by_id_bangunan($id_bangunan){
		$query = "SELECT koordinat FROM tmp_koordinat_bangunan WHERE id_bangunan = '$id_bangunan'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function cek_max_id_lokasi_lahan(){
		$query = "SELECT MAX(id_bangunan) as maksimal_id FROM tmp_ppm_lokasi_lahan";
		$sql = $this->db->query($query);
		$data = $sql->row_array();
		$max_id_lokasi_lahan = $data['maksimal_id'];
		if($max_id_lokasi_lahan == ''){
			$max_id_lokasi_lahan = 1;
		}else{
			$max_id_lokasi_lahan = $max_id_lokasi_lahan+1;
		}
		return $max_id_lokasi_lahan;
	}
	public function tambah_lokasi_lahan($lokasi, $kota, $propinsi, $id_status_kepemilikan_lahan, $penggunaan_lahan, $luas_lahan, $koordinat_lahan, $embed_map, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_lokasi_perguruan_tinggi (lokasi, kota, propinsi, id_status_kepemilikan_lahan, penggunaan_lahan, luas_lahan, koordinat_lahan, embed_map, log_pgw, log_input) VALUES ('$lokasi', '$kota', '$propinsi', '$id_status_kepemilikan_lahan', '$penggunaan_lahan', '$luas_lahan', '$koordinat_lahan', '$embed_map', '$log_pgw', '$time')";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function tambah_lokasi_bangunan($id_bangunan, $lokasi, $kota, $propinsi, $id_status_kepemilikan_lahan, $penggunaan_lahan, $luas_lahan, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_lokasi_lahan(id_bangunan, lokasi, kota, propinsi, id_status_kepemilikan_lahan, penggunaan_lahan, luas_lahan, log_pgw, log_input) VALUES ('$id_bangunan', '$lokasi', '$kota', '$propinsi', '$id_status_kepemilikan_lahan', '$penggunaan_lahan', '$luas_lahan', '$log_pgw', '$time')";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function tambah_koordinat_bangunan($id_bangunan, $koordinat){
		$query = "INSERT INTO tmp_koordinat_bangunan (id_bangunan, koordinat) VALUES ('$id_bangunan', '$koordinat')";
		$sql = $this->db->query($query);
		return $sql;
	}

	public function update_lokasi_lahan($id_lokasi, $lokasi, $kota, $propinsi, $id_status_kepemilikan_lahan, $penggunaan_lahan, $luas_lahan, $koordinat_lahan, $embed_map, $log_pgw){
		$time = date('Y-m-d H:i:s');

		$query = "UPDATE tmp_ppm_lokasi_perguruan_tinggi SET lokasi = '$lokasi', kota = '$kota', propinsi='$propinsi', id_status_kepemilikan_lahan = '$id_status_kepemilikan_lahan', penggunaan_lahan='$penggunaan_lahan', luas_lahan = '$luas_lahan', koordinat_lahan = '$koordinat_lahan', embed_map = '$embed_map', log_pgw='$log_pgw', log_input = '$time'  WHERE id_lokasi = '$id_lokasi'";
		$sql = $this->mutu->query($query);
		return $sql;
		
	}
	public function update_lokasi_bangunan($id_lokasi_lahan, $lokasi, $kota, $propinsi, $id_status_kepemilikan_lahan, $penggunaan_lahan, $luas_lahan, $log_pgw){
		$time = date('Y-m-d H:i:s');

		$query = "UPDATE tmp_ppm_lokasi_lahan SET lokasi = '$lokasi', kota = '$kota', propinsi='$propinsi', id_status_kepemilikan_lahan = '$id_status_kepemilikan_lahan', penggunaan_lahan='$penggunaan_lahan', luas_lahan = '$luas_lahan', log_pgw='$log_pgw', log_input = '$time'  WHERE id_lokasi_lahan = '$id_lokasi_lahan'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function hapus_lokasi_lahan($id_lokasi){
		$query = "DELETE FROM tmp_ppm_lokasi_perguruan_tinggi WHERE id_lokasi = '$id_lokasi'";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function hapus_lokasi_bangunan($id_lokasi_lahan){
		$query1 = "SELECT id_bangunan FROM tmp_ppm_lokasi_lahan where id_lokasi_lahan = '$id_lokasi_lahan'";
		$sql1 = $this->db->query($query1);
		$data = $sql1->row_array();
		$id_bangunan = $data['id_bangunan'];
		if($id_bangunan!=''){
			$query = "DELETE FROM tmp_ppm_lokasi_lahan WHERE id_lokasi_lahan = '$id_lokasi_lahan'";
			$sql = $this->db->query($query);
			if($sql){
				$query2 = "DELETE FROM tmp_koordinat_bangunan WHERE id_bangunan='$id_bangunan'";
				$sql2 = $this->db->query($query2);
				return $sql2;
			}
		
		}else{
			$query = "DELETE FROM tmp_ppm_lokasi_lahan WHERE id_lokasi_lahan = '$id_lokasi_lahan'";
			$sql = $this->db->query($query);
			return $sql;
		}
		
	}
	public function hapus_koordinat_bangunan($id_bangunan){
		$query = "DELETE FROM tmp_koordinat_bangunan WHERE id_bangunan = '$id_bangunan'";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function get_sumber_dana_penerimaan(){
		$query = "SELECT * from tmp_keu_sumber_dana where jenis = 1 ORDER BY kd_sumber_dana ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_penerimaan_dana(){
		$query = "SELECT * from tmp_ppm_realisasi_penerimaan_dana a JOIN tmp_keu_sumber_dana b ON a.kd_sumber_dana = b.kd_sumber_dana JOIN tmp_m_jenis_dana c ON a.kd_jenis_dana = c.kd_jenis_dana ORDER BY a.id_realisasi_penerimaan DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function tambah_realisasi_penerimaan_dana($kd_sumber_dana, $jenis_dana, $jml_dana, $tahun, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_ppm_realisasi_penerimaan_dana (kd_sumber_dana, kd_jenis_dana, jml_dana, tahun, log_pgw, log_input) VALUES ('$kd_sumber_dana', '$jenis_dana', '$jml_dana' , '$tahun', '$log_pgw', '$time')";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function edit_realisasi_penerimaan_dana($id_realisasi_penerimaan){
		$query = "SELECT * FROM tmp_ppm_realisasi_penerimaan_dana WHERE id_realisasi_penerimaan = '$id_realisasi_penerimaan'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function hapus_realisasi_penerimaan_dana($id_realisasi_penerimaan){
		$query = "DELETE FROM tmp_ppm_realisasi_penerimaan_dana WHERE id_realisasi_penerimaan = '$id_realisasi_penerimaan'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function update_realisasi_penerimaan_dana($id_realisasi_penerimaan, $kd_sumber_dana, $jenis_dana, $jml_dana, $tahun, $log_pgw){
		$time = date('Y-m-d H:i:s');

		$query = "UPDATE tmp_ppm_realisasi_penerimaan_dana SET kd_sumber_dana = '$kd_sumber_dana', kd_jenis_dana = '$jenis_dana', jml_dana='$jml_dana', tahun = '$tahun', log_pgw='$log_pgw', log_input = '$time'  WHERE id_realisasi_penerimaan = '$id_realisasi_penerimaan'";
		$sql = $this->mutu->query($query);
		return $sql;
	}
	public function get_jenis_dana_penerimaan(){
		$query = "SELECT * from tmp_m_jenis_dana ORDER BY kd_jenis_dana DESC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function tambah_jenis_dana($jenis_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "INSERT INTO tmp_m_jenis_dana (jenis_dana, log_pgw, log_input) VALUES ('$jenis_dana', '$log_pgw', '$time')";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function edit_jenis_dana($kd_jenis_dana){
		$query = "SELECT * FROM tmp_m_jenis_dana WHERE kd_jenis_dana = '$kd_jenis_dana'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function update_jenis_dana($kd_jenis_dana, $jenis_dana, $log_pgw){
		$time = date('Y-m-d H:i:s');
		$query = "UPDATE tmp_m_jenis_dana SET jenis_dana = '$jenis_dana', log_pgw='$log_pgw', log_input='$time' where kd_jenis_dana='$kd_jenis_dana'";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function hapus_jenis_dana($kd_jenis_dana){
		$query = "DELETE FROM tmp_m_jenis_dana WHERE kd_jenis_dana = '$kd_jenis_dana'";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function get_sumber_dana_dari_mahasiswa(){
		$query = "SELECT distinct (a.kd_jenis_dana), b.jenis_dana from tmp_ppm_realisasi_penerimaan_dana a join tmp_m_jenis_dana b ON a.kd_jenis_dana = b.kd_jenis_dana where a.kd_sumber_dana = 2  ORDER BY a.kd_jenis_dana ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_jm_dana_penerimaan($kd_jenis_dana){
		$query = "SELECT kd_jenis_dana, tahun, jml_dana from tmp_ppm_realisasi_penerimaan_dana where kd_jenis_dana = '$kd_jenis_dana' order by kd_jenis_dana asc";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_sumber_penerimaan_dana(){
		$query = "SELECT distinct(a.kd_sumber_dana), b.nm_sumber_dana from tmp_ppm_realisasi_penerimaan_dana a join tmp_keu_sumber_dana b on a.kd_sumber_dana = b.kd_sumber_dana order by a.kd_sumber_dana ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_sumber_dana_by_kd_sumber_dana($kd_sumber_dana){
		$query = "SELECT distinct (a.kd_jenis_dana), b.jenis_dana from tmp_ppm_realisasi_penerimaan_dana a join tmp_m_jenis_dana b ON a.kd_jenis_dana = b.kd_jenis_dana where a.kd_sumber_dana = '$kd_sumber_dana'  ORDER BY a.kd_jenis_dana ASC";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_all_ts1($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $z, $aa, $bb, $cc, $dd, $ee, $ff, $gg, $hh, $ii, $jj, $kk, $ll, $mm, $nn, $oo, $pp, $qq, $rr, $ss, $tt, $uu, $vv, $ww, $xx, $yy, $zz, $aaa, $bbb, $ccc, $ddd, $tahun){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$o', '$p', '$q', '$r', '$s', '$t', '$u', '$v', '$w', '$x', '$y', '$z', '$aa', '$bb', '$cc', '$dd', '$ee', '$ff', '$gg', '$hh', '$ii', '$jj', '$kk', '$ll', '$mm', '$nn', '$oo', '$pp', '$qq', '$rr', '$ss', '$tt', '$uu', '$vv', '$ww', '$xx', '$yy', '$zz', '$aaa', '$bbb', '$ccc', '$ddd') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_all_total($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $z, $aa, $bb, $cc, $dd, $ee, $ff, $gg, $hh, $ii, $jj, $kk, $ll, $mm, $nn, $oo, $pp, $qq, $rr, $ss, $tt, $uu, $vv, $ww, $xx, $yy, $zz, $aaa, $bbb, $ccc, $ddd, $ts, $ts_1, $ts_2){
		$query = "SELECT a.jml_guna_ppm FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$o', '$p', '$q', '$r', '$s', '$t', '$u', '$v', '$w', '$x', '$y', '$z', '$aa', '$bb', '$cc', '$dd', '$ee', '$ff', '$gg', '$hh', '$ii', '$jj', '$kk', '$ll', '$mm', '$nn', '$oo', '$pp', '$qq', '$rr', '$ss', '$tt', '$uu', '$vv', '$ww', '$xx', '$yy', '$zz', '$aaa', '$bbb', '$ccc', '$ddd') AND a.tahun IN('$ts', '$ts_1', '$ts_2') ";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_all_rincian($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $z, $aa, $bb, $cc, $dd, $ee, $ff, $gg, $hh, $ii, $jj, $kk, $ll, $mm, $nn, $oo, $pp, $qq, $rr, $ss, $tt, $uu, $vv, $ww, $xx, $yy, $zz, $aaa, $bbb, $ccc, $ddd, $tahun){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$o', '$p', '$q', '$r', '$s', '$t', '$u', '$v', '$w', '$x', '$y', '$z', '$aa', '$bb', '$cc', '$dd', '$ee', '$ff', '$gg', '$hh', '$ii', '$jj', '$kk', '$ll', '$mm', '$nn', '$oo', '$pp', '$qq', '$rr', '$ss', '$tt', '$uu', '$vv', '$ww', '$xx', '$yy', '$zz', '$aaa', '$bbb', '$ccc', '$ddd') AND a.tahun = '$tahun'";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_jml_sumberdana_all_total_rincian($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $z, $aa, $bb, $cc, $dd, $ee, $ff, $gg, $hh, $ii, $jj, $kk, $ll, $mm, $nn, $oo, $pp, $qq, $rr, $ss, $tt, $uu, $vv, $ww, $xx, $yy, $zz, $aaa, $bbb, $ccc, $ddd, $ts_2, $ts_1, $ts){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm a JOIN tmp_keu_jenis_guna b ON a.kd_jenis_g = b.kd_jenis_g JOIN tmp_keu_sumber_dana c ON b.kd_sumber_dana = c.kd_sumber_dana JOIN tmp_pgw_staf d ON a.nip = d.nip WHERE a.kd_jenis_g IN ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$o', '$p', '$q', '$r', '$s', '$t', '$u', '$v', '$w', '$x', '$y', '$z', '$aa', '$bb', '$cc', '$dd', '$ee', '$ff', '$gg', '$hh', '$ii', '$jj', '$kk', '$ll', '$mm', '$nn', '$oo', '$pp', '$qq', '$rr', '$ss', '$tt', '$uu', '$vv', '$ww', '$xx', '$yy', '$zz', '$aaa', '$bbb', '$ccc', '$ddd') AND a.tahun IN ('$ts_2', '$ts_1', '$ts')";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_tes_sinkron(){
		$query = "SELECT * FROM tes_sinkron";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_ppm(){
		$query = "SELECT * FROM tmp_keu_guna_dana_ppm ORDER BY kd_guna_ppm ASC limit 500 offset 6000";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_staf(){
		$query ="SELECT * FROM tmp_pgw_staf order by nip asc limit 100 offset 0";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function cek_data_tmp_staf($nip){
		$query ="SELECT id_orchid, id_google_scholar, id_sinta, id_scopus, url_orchid, url_google_scholar, url_sinta, url_scopus FROM tmp_pgw_staf where nip = '$nip'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function get_data_id_url_dosen(){
		$query ="SELECT * FROM tmp_id_url_dosen order by nip asc";
		$sql = $this->db->query($query);
		return $sql->result_array();
	}
	public function get_data_staf_by_nip($nip){
		$query ="SELECT * FROM tmp_pgw_staf where nip = '$nip'";
		$sql = $this->db->query($query);
		return $sql->row_array();
	}
	public function update_data_staf_by_nip($nip, $id_orchid, $id_google_scholar, $id_sinta, $id_scopus, $url_orchid, $url_google_scholar, $url_sinta, $url_scopus){
		$query = "UPDATE tmp_pgw_staf SET id_orchid = '$id_orchid', id_google_scholar = '$id_google_scholar', id_sinta='$id_sinta', id_scopus = '$id_scopus', url_orchid = '$url_orchid', url_google_scholar='$url_google_scholar', url_sinta='$url_sinta', url_scopus = '$url_scopus' WHERE nip = '$nip'";
		$sql = $this->db->query($query);
		return $sql;
	}
	public function get_data_sitasi_artikel_ilmiah(){
		$this->db->select('a.id_sitasi_artikel, a.nip, a.judul_artikel, a.url, b.nama_fakultas, c.nama, c.gelar_da, c.gelar_dna, c.gelar_ba, c.gelar_bna');
		$this->db->from('tmp_artikel_ilmiah_sitasi as a');
		$this->db->join('tmp_master_fakultas as b', 'a.id_fakultas = b.id_fakultas');
		$this->db->join('tmp_pgw_staf as c', 'a.nip = c.nip');
		$this->db->order_by('a.id_sitasi_artikel', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>