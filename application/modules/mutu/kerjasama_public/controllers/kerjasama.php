<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Kerjasama extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('kerjasama/kerjasama_mdl', 'kerjasama_mdl');
		//$this->load->model('kerjasama/kerjasama_mdl', 'mdl_kerjasama');
		//$this->mutu = $this->load->database('mutu');
	}
	//login
	function auth($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //CREATE
				switch ($subkode) {
					case 1: // INSERT MOU
						$query = $this->kerjasama_mdl->cek_auth($api_search);
					break;
				}
			break;
		}
		$this->sia_api_lib_format->output($query, $format);
	}
	//bidang kerjasama
	public function testing($format = 'json'){
		$query= array("halo controller kerjasama");
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function get_master_bidang_kerjasama($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_bidang_kerjasama();
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function tambah_master_bidang_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_bidang_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function edit_master_bidang_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_bidang_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_bidang_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_bidang_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_bidang_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_bidang_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//lingkup kerjasama
	public function tambah_master_lingkup_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_lingkup_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_master_lingkup_kerjasama($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_lingkup_kerjasama();
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function edit_master_lingkup_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_lingkup_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_lingkup_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_lingkup_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_lingkup_kerjasama($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_lingkup_kerjasama($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//jenis institusi
	public function tambah_master_jenis_institusi($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_jenis_institusi($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_master_jenis_institusi($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_jenis_institusi();
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function edit_master_jenis_institusi($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_jenis_institusi($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_jenis_institusi($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_jenis_institusi($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_jenis_institusi($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_jenis_institusi($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//master kuesioner
	public function get_master_kuesioner($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_master_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);
	} 
	public function edit_master_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//master jenis kuesioner
	public function get_master_jenis_kuesioner($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_jenis_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_master_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_master_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//m_pertanyaan
	public function get_master_pertanyaan($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_pertanyaan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_master_pertanyaan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_pertanyaan($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_master_pertanyaan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_pertanyaan($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_pertanyaan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_pertanyaan($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_pertanyaan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_pertanyaan($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//m_jawaban
	public function get_master_jawaban($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_master_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_master_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_master_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_master_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//input pilihan
	public function get_master_input_pilihan($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_input_pilihan();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_master_input_pilihan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_input_pilihan($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_master_input_pilihan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_input_pilihan($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_input_pilihan($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_input_pilihan($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	//master jenis jawaban
	
	public function get_master_jenis_jawaban($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_jenis_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_master_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_master_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_m_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_m_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//master detail jenis jawaban
	public function get_master_detail_jenis_jawaban($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_detail_jenis_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_jml_pilihan_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->get_jml_pilihan_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function tambah_master_detail_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_master_detail_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_rincian_nama_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->get_rincian_nama_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_master_detail_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_master_detail_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function get_nama_jawaban_from_detail_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->get_nama_jawaban_from_detail_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_master_detail_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_master_detail_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_m_detail_jenis_jawaban($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_m_detail_jenis_jawaban($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function get_data_pengaturan_jawaban_jenis_kuesioner($format = 'json'){
		$query = $this->kerjasama_mdl->get_data_pengaturan_jawaban_jenis_kuesioner();
		$this->sia_api_lib_format->output($query, $format);
	}
	
	public function get_master_jenis_kuesioner_only($format = 'json'){
		$query = $this->kerjasama_mdl->get_master_jenis_kuesioner_only();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_data_nama_jenis_jawaban_from_id_detail_jawaban($format = 'json'){
		$query = $this->kerjasama_mdl->get_data_nama_jenis_jawaban_from_id_detail_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_pengaturan_jawaban_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_pengaturan_jawaban_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_pengaturan_jawaban_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_pengaturan_jawaban_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_pengaturan_jawaban_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_pengaturan_jawaban_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_pengaturan_jawaban_jenis_kuesioner($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_pengaturan_jawaban_jenis_kuesioner($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function get_data_pengaturan_susunan_soal($format = 'json'){
		$query = $this->kerjasama_mdl->get_data_pengaturan_susunan_soal();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function get_jenis_kuesioner_dari_pengaturan_jawaban($format = 'json'){
		$query = $this->kerjasama_mdl->get_jenis_kuesioner_dari_pengaturan_jawaban();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_pengaturan_susunan_soal($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_pengaturan_susunan_soal($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_pengaturan_susunan_soal($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_pengaturan_susunan_soal($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_pengaturan_susunan_soal($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_pengaturan_susunan_soal($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_pengaturan_susunan_soal($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_pengaturan_susunan_soal($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//berita
	public function get_data_berita($format = 'json'){
		$query = $this->kerjasama_mdl->get_data_berita();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_berita($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_data_berita($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_data_berita($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_data_berita($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_data_berita($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_data_berita($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_data_berita($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_data_berita($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//agenda
	public function get_data_agenda($format = 'json'){
		$query = $this->kerjasama_mdl->get_data_agenda();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_agenda($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_data_agenda($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_data_agenda($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_data_agenda($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_data_agenda($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_data_agenda($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_data_agenda($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_data_agenda($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	//pengumuman	
	public function get_data_pengumuman($format = 'json'){
		$query = $this->kerjasama_mdl->get_data_pengumuman();
		$this->sia_api_lib_format->output($query, $format);
	}
	public function tambah_data_pengumuman($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->tambah_data_pengumuman($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function edit_data_pengumuman($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->edit_data_pengumuman($data);
		$this->sia_api_lib_format->output($query, $format);	
	}
	public function update_data_pengumuman($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->update_data_pengumuman($data);
		$this->sia_api_lib_format->output($query, $format);
	}
	public function delete_data_pengumuman($format = 'json'){
		$data= $this->input->post('api_search');
		$query = $this->kerjasama_mdl->delete_data_pengumuman($data);
		$this->sia_api_lib_format->output($query, $format);	
	}

	function kegiatan($format = 'json'){
		$kode = (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode = (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$api_search = $this->input->post('api_search');
		switch ($kode) {
			case 1: //CREATE
				switch ($subkode) {
					case 1: // INSERT MOU
						$query = $this->kerjasama_mdl->mou_insert_1($api_search);
					break;
				}
			break;
			case 2: //READ
				switch ($subkode) {
					case 1: // SELECT LIMIT MOU EXCEPT file_mou BY nomor_mou, nama_file_mou
						$query = $this->kerjasama_mdl->kegiatan_select_1($api_search)->result_array();
					break;
					case 2: // SELECT MOU EXCEPT file_mou BY id_mou
						$query = $this->kerjasama_mdl->mou_select_2($api_search)->result_array();
					break;
					case 3: // SELECT ABOUT file_mou BY id_mou
						$query = $this->kerjasama_mdl->mou_select_3($api_search)->result_array();
					break;
					case 4: // SELECT COUNT MOU BY nomor_mou, nama_file_mou
						$query = $this->kerjasama_mdl->kegiatan_select_4($api_search);
					break;
					case 5: // SELECT ALL MOU
						$query = $this->kerjasama_mdl->mou_select_5()->result_array();
					break;
					case 6:
						$query = $this->kerjasama_mdl->kegiatan_select_pks()->result_array();
					break;
				}
			break;
			/*case 3: //UPDATE
				switch ($subkode) {
					case 1: // UPDATE MOU BY id_mou
						$query = $this->kerjasama_mdl->mou_update_1($api_search);
					break;
				}
			break;
			case 4: //DELETE
				switch ($subkode) {
					case 1: // DELETE MOU BY id_mou
						$query = $this->kerjasama_mdl->mou_delete_1($api_search);
					break;
				}
			break;*/
		}
		$this->sia_api_lib_format->output($query, $format);
	}
}
?>