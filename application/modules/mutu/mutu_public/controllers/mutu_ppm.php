<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mutu_ppm extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('mutu_ppm/mdl_ppm', 'mdl_ppm');
		//$this->mutu = $this->load->database('mutu');
	}
	
	public function testing(){
		/*return*/ echo "halo kak";
		
	}
	public function get_karya_jenis($format = 'json'){
		$query = $this->mdl_ppm->get_karya_jenis();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_karya_jenis($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_karya_jenis($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_karya_jenis($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_karya_jenis($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_karya_jenis($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_karya_jenis($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_karya_jenis($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_karya_jenis($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_karya_penghargaan($format = 'json'){
		$query = $this->mdl_ppm->get_karya_penghargaan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_karya_penghargaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_karya_penghargaan($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_karya_penghargaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_karya_penghargaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_karya_penghargaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_karya_penghargaan($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_karya_penghargaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_karya_penghargaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_sumber_dana($format = 'json'){
		$query = $this->mdl_ppm->get_keu_sumber_dana();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_sumber_dana_guna($format = 'json'){
		$query = $this->mdl_ppm->get_keu_sumber_dana_guna();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_sumber_dana_sumber($format = 'json'){
		$query = $this->mdl_ppm->get_keu_sumber_dana_sumber();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_sumber_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_sumber_dana($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_keu_sumber_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_keu_sumber_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_sumber_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_sumber_dana($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_keu_sumber_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_keu_sumber_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_jenis_dana($format = 'json'){
		$query = $this->mdl_ppm->get_keu_jenis_dana();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function keu_sumber_dana_mhs($format = 'json'){
		$query = $this->mdl_ppm->keu_sumber_dana_mhs();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_jenis_dana($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_keu_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_keu_jenis_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_jenis_dana($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_keu_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_keu_jenis_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_sumber_dana_mhs($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_sumber_dana_mhs($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_keu_sumber_dana_mhs($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_keu_sumber_dana_mhs($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_sumber_dana_mhs($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_sumber_dana_mhs($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_keu_sumber_dana_mhs($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_keu_sumber_dana_mhs($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_guna_dana_ppm($format = 'json'){
		$query = $this->mdl_ppm->get_keu_guna_dana_ppm();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_jenis_guna($format = 'json'){
		$query = $this->mdl_ppm->get_keu_jenis_guna();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_jenis_guna_by_kd_sumber_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_keu_jenis_guna_by_kd_sumber_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_jenis_guna($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_jenis_guna($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_keu_jenis_guna($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_keu_jenis_guna($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_jenis_guna($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_jenis_guna($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_keu_jenis_guna($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_keu_jenis_guna($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_keu_guna_dana($format = 'json'){
		$query = $this->mdl_ppm->get_keu_guna_dana();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_keu_guna_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_keu_guna_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_guna_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_guna_dana($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_keu_guna_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_keu_guna_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_tingkat($format = 'json'){
		$query = $this->mdl_ppm->get_data_tingkat();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jenis_recognisi($format = 'json'){
		$query = $this->mdl_ppm->get_data_jenis_recognisi();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jenis_haki($format = 'json'){
		$query = $this->mdl_ppm->get_data_jenis_haki();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_tingkat($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_tingkat($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_tingkat($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_tingkat($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_tingkat($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_tingkat($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_tingkat($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_tingkat($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9], $api_search[10], $api_search[11], $api_search[12]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_penelitian(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_penelitian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_lainnya(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_lainnya($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_recognisi(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_recognisi($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_jurnal(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_jurnal($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function simpan_data_keu_guna_dana_ppm_jurnal(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->simpan_data_keu_guna_dana_ppm_jurnal($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_buku(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_buku($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function simpan_data_keu_guna_dana_ppm_buku(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->simpan_data_keu_guna_dana_ppm_buku($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_seminar(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_seminar($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function simpan_data_keu_guna_dana_ppm_seminar(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->simpan_data_keu_guna_dana_ppm_seminar($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_chapter(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_chapter($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function simpan_data_keu_guna_dana_ppm_chapter(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->simpan_data_keu_guna_dana_ppm_chapter($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_produk(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_produk($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function simpan_data_keu_guna_dana_ppm_produk(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->simpan_data_keu_guna_dana_ppm_produk($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_keu_guna_dana_ppm_haki(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_data_keu_guna_dana_ppm_haki($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function simpan_data_keu_guna_dana_ppm_haki(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->simpan_data_keu_guna_dana_ppm_haki($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_guna_dana_ppm_recognisi(){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_guna_dana_ppm_recognisi($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9], $api_search[10]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_keu_guna_dana_ppm($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_keu_guna_dana_ppm($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_guna_dana_ppm($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_guna_dana_ppm($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9], $api_search[10], $api_search[11], $api_search[12], $api_search[13]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_guna_dana_ppm_penelitian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_guna_dana_ppm_penelitian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_keu_guna_dana_ppm_lainnya($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_keu_guna_dana_ppm_lainnya($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_keu_guna_dana_ppm($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_keu_guna_dana_ppm($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function getrecordCount($format = 'json'){
		$query = $this->mdl_ppm->getrecordCount();
		$this->sia_api_lib_format->output($query, $format);
	}public function getrecordCount_staf($format = 'json'){
		$query = $this->mdl_ppm->getrecordCount_staf();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function getData($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->getData($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}public function getData_staf($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->getData_staf($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function cari_data_keu_guna_dana_ppm($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->cari_data_keu_guna_dana_ppm($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}public function cari_data_tmp_pgw_staf($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->cari_data_tmp_pgw_staf($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_penelitian_dosen_biaya($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_penelitian_dosen_biaya($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_penelitian_dosen_biaya_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_penelitian_dosen_biaya_rincian($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_penelitian_dosen_biaya_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_penelitian_dosen_biaya_total_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_penelitian_dosen_biaya_total_rincian_semua($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_penelitian_dosen_biaya_total_rincian_semua($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_penelitian_dosen_biaya_total_rincian_all($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_penelitian_dosen_biaya_total_rincian_all($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_penelitian_dosen_biaya_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_penelitian_dosen_biaya_total($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_penelitian_dosen_ts2($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_penelitian_dosen_ts2($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_penelitian_dosen_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_penelitian_dosen_total($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jurnal_terakreditasi($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jurnal_terakreditasi($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jurnal_terakreditasi_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jurnal_terakreditasi_total($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jurnal_terakreditasi_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jurnal_terakreditasi_rincian($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jurnal_terakreditasi_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jurnal_terakreditasi_total_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_karya_ts2($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_karya_ts2($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_karya_dosen_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_karya_dosen_total($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_karya_rincian_semua_ts($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_karya_rincian_semua_ts($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_karya_rincian_semua($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_karya_rincian_semua($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_tmp_pgw_staf($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_tmp_pgw_staf($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_tmp_pgw_staf($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_tmp_pgw_staf($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9], $api_search[10]);
		$this->sia_api_lib_format->output($query, $format);
	}
	
	public function get_data_haki_paten_penghargaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_haki_paten_penghargaan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	
	public function get_data_pengabdian_dari_institusi_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_rincian($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	/*public function get_data_pengabdian_dari_institusi_gabung($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_gabung($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}*/
	public function get_data_pengabdian_dari_institusi_gabung($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_gabung($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_gabung_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_gabung_rincian($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_total($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_gabung_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_gabung_total($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_total_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_gabung_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_gabung_total_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_pengabdian_ts1($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_pengabdian_ts1($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_pengabdian_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_pengabdian_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_pengabdian_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_pengabdian_total($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_pengabdian_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_pengabdian_total_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_terkait($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_terkait($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_terkait_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_terkait_rincian($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_terkait_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_terkait_total($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_pengabdian_dari_institusi_terkait_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_pengabdian_dari_institusi_terkait_total_rincian($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_rincian_penghargaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_rincian_penghargaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_sistem_pengolah_data($format = 'json'){
		$query = $this->mdl_ppm->get_sistem_pengolah_data();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_aksesbilitas_data($format = 'json'){
		$query = $this->mdl_ppm->get_aksesbilitas_data();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_aksesbilitas_data($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_aksesbilitas_data($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_aksesbilitas_data($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_aksesbilitas_data($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_aksesbilitas_data($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_aksesbilitas_data($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_aksesbilitas_data($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_aksesbilitas_data($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_rincian_aksesbilitas_data($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_rincian_aksesbilitas_data($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_lokasi_lahan($format = 'json'){
		$query = $this->mdl_ppm->get_lokasi_lahan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_lokasi_bangunan($format = 'json'){
		$query = $this->mdl_ppm->get_lokasi_bangunan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_rincian_lokasi($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_rincian_lokasi($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_rincian_lokasi_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_rincian_lokasi_bangunan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_status_kepemilikan_lahan($format = 'json'){
		$query = $this->mdl_ppm->get_status_kepemilikan_lahan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_lokasi_lahan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_lokasi_lahan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_lokasi_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_lokasi_bangunan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_koordinat_by_id_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_koordinat_by_id_bangunan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function cek_max_id_lokasi_lahan($format = 'json'){
		$query = $this->mdl_ppm->cek_max_id_lokasi_lahan();
		$this->sia_api_lib_format->output($query, $format);
	} 
	public function tambah_lokasi_lahan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_lokasi_lahan($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_lokasi_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_lokasi_bangunan($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_koordinat_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_koordinat_bangunan($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function hapus_lokasi_lahan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_lokasi_lahan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_lokasi_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_lokasi_bangunan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_koordinat_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_koordinat_bangunan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}

	public function update_lokasi_lahan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_lokasi_lahan($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8], $api_search[9]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_lokasi_bangunan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_lokasi_bangunan($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_sumber_dana_penerimaan($format = 'json'){
		$query = $this->mdl_ppm->get_sumber_dana_penerimaan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_penerimaan_dana($format = 'json'){
		$query = $this->mdl_ppm->get_penerimaan_dana();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_realisasi_penerimaan_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_realisasi_penerimaan_dana($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_realisasi_penerimaan_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_realisasi_penerimaan_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_realisasi_penerimaan_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_realisasi_penerimaan_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	} 
	public function update_realisasi_penerimaan_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_realisasi_penerimaan_dana($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_jenis_dana_penerimaan($format = 'json'){
		$query = $this->mdl_ppm->get_jenis_dana_penerimaan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->tambah_jenis_dana($api_search[0], $api_search[1]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->edit_jenis_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_jenis_dana($api_search[0], $api_search[1], $api_search[2]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function hapus_jenis_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->hapus_jenis_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_sumber_dana_dari_mahasiswa($format = 'json'){
		$query = $this->mdl_ppm->get_sumber_dana_dari_mahasiswa();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_jm_dana_penerimaan($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_jm_dana_penerimaan($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_sumber_penerimaan_dana($format = 'json'){
		$query = $this->mdl_ppm->get_sumber_penerimaan_dana();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_sumber_dana_by_kd_sumber_dana($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_sumber_dana_by_kd_sumber_dana($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_all_ts1($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_all_ts1(
			$api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6],
			$api_search[7], $api_search[8], $api_search[9], $api_search[10], $api_search[11], $api_search[12], $api_search[13],
			$api_search[14], $api_search[15], $api_search[16], $api_search[17], $api_search[18], $api_search[19], $api_search[20],
			$api_search[21], $api_search[22], $api_search[23], $api_search[24], $api_search[25], $api_search[26], $api_search[27],
			$api_search[28], $api_search[29], $api_search[30], $api_search[31], $api_search[32], $api_search[33], $api_search[34],
			$api_search[35], $api_search[36], $api_search[37], $api_search[38], $api_search[39], $api_search[40], $api_search[41],
			$api_search[42], $api_search[43], $api_search[44], $api_search[45], $api_search[46], $api_search[47], $api_search[48],
			$api_search[49], $api_search[50], $api_search[51], $api_search[52], $api_search[53], $api_search[54], $api_search[55], $api_search[56]
		);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_all_total($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_all_total(
			$api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6],
			$api_search[7], $api_search[8], $api_search[9], $api_search[10], $api_search[11], $api_search[12], $api_search[13],
			$api_search[14], $api_search[15], $api_search[16], $api_search[17], $api_search[18], $api_search[19], $api_search[20],
			$api_search[21], $api_search[22], $api_search[23], $api_search[24], $api_search[25], $api_search[26], $api_search[27],
			$api_search[28], $api_search[29], $api_search[30], $api_search[31], $api_search[32], $api_search[33], $api_search[34],
			$api_search[35], $api_search[36], $api_search[37], $api_search[38], $api_search[39], $api_search[40], $api_search[41],
			$api_search[42], $api_search[43], $api_search[44], $api_search[45], $api_search[46], $api_search[47], $api_search[48],
			$api_search[49], $api_search[50], $api_search[51], $api_search[52], $api_search[53], $api_search[54], $api_search[55], $api_search[56], $api_search[57], $api_search[58]
		);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_all_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_all_rincian(
			$api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6],
			$api_search[7], $api_search[8], $api_search[9], $api_search[10], $api_search[11], $api_search[12], $api_search[13],
			$api_search[14], $api_search[15], $api_search[16], $api_search[17], $api_search[18], $api_search[19], $api_search[20],
			$api_search[21], $api_search[22], $api_search[23], $api_search[24], $api_search[25], $api_search[26], $api_search[27],
			$api_search[28], $api_search[29], $api_search[30], $api_search[31], $api_search[32], $api_search[33], $api_search[34],
			$api_search[35], $api_search[36], $api_search[37], $api_search[38], $api_search[39], $api_search[40], $api_search[41],
			$api_search[42], $api_search[43], $api_search[44], $api_search[45], $api_search[46], $api_search[47], $api_search[48],
			$api_search[49], $api_search[50], $api_search[51], $api_search[52], $api_search[53], $api_search[54], $api_search[55], $api_search[56]
		);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_jml_sumberdana_all_total_rincian($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_jml_sumberdana_all_total_rincian(
			$api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6],
			$api_search[7], $api_search[8], $api_search[9], $api_search[10], $api_search[11], $api_search[12], $api_search[13],
			$api_search[14], $api_search[15], $api_search[16], $api_search[17], $api_search[18], $api_search[19], $api_search[20],
			$api_search[21], $api_search[22], $api_search[23], $api_search[24], $api_search[25], $api_search[26], $api_search[27],
			$api_search[28], $api_search[29], $api_search[30], $api_search[31], $api_search[32], $api_search[33], $api_search[34],
			$api_search[35], $api_search[36], $api_search[37], $api_search[38], $api_search[39], $api_search[40], $api_search[41],
			$api_search[42], $api_search[43], $api_search[44], $api_search[45], $api_search[46], $api_search[47], $api_search[48],
			$api_search[49], $api_search[50], $api_search[51], $api_search[52], $api_search[53], $api_search[54], $api_search[55], $api_search[56], $api_search[57], $api_search[58]
		);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_tes_sinkron($format = 'json'){
		$query = $this->mdl_ppm->get_data_tes_sinkron();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_ppm($format = 'json'){
		$query = $this->mdl_ppm->get_data_ppm();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_staf($format = 'json'){
		$query = $this->mdl_ppm->get_data_staf();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function cek_data_tmp_staf($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->cek_data_tmp_staf($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_id_url_dosen($format = 'json'){
		$query = $this->mdl_ppm->get_data_id_url_dosen();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_staf_by_nip($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->get_data_staf_by_nip($api_search[0]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function update_data_staf_by_nip($format = 'json'){
		$api_search= $this->input->post('api_search');
		$query = $this->mdl_ppm->update_data_staf_by_nip($api_search[0], $api_search[1], $api_search[2], $api_search[3], $api_search[4], $api_search[5], $api_search[6], $api_search[7], $api_search[8]);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_sitasi_artikel_ilmiah($format = 'json'){
		$query = $this->mdl_ppm->get_data_sitasi_artikel_ilmiah();
		$this->sia_api_lib_format->output($query, $format);
	}
}
?>