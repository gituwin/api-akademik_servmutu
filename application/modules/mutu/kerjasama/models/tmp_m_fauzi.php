<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Tmp_m_fauzi extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->kerjasama = $this->load->database('kerjasama');
	}
	
	## TABLE MOU START
	## KOLOM id_mou, tgl_mou, tgl_berakhir, nama_file_mou, file_mou, size, type, nomor_mou, nama_mou, file_64
		### CREATE
	public function mou_insert_1($data){
		$return = $this->kerjasama->insert('t_mou', $data);
		return $return;
	}
		### CREATE

		### READ
	public function mou_select_1($data){
		$this->kerjasama->select('id_mou, tgl_mou, tgl_berakhir, nama_file_mou, size, type, nomor_mou, nama_mou');
		if (!empty($data['key'])) {
			$this->kerjasama->like('LOWER(nomor_mou)', $data['key']);
			$this->kerjasama->or_like('LOWER(nama_mou)', $data['key']);
		}
		$this->kerjasama->limit($data['limit'], $data['start']);
		$this->kerjasama->order_by('id_mou', 'DESC');
		$return = $this->kerjasama->get('t_mou');
		return $return;
	}

	public function mou_select_2($data){
		$this->kerjasama->select('id_mou, tgl_mou, tgl_berakhir, nama_file_mou, size, type, nomor_mou, nama_mou');
		$this->kerjasama->where('id_mou', $data['id_mou']);
		$return = $this->kerjasama->get('t_mou');
		return $return;
	}

	public function mou_select_3($data){
		$this->kerjasama->select("nama_file_mou, file_64, size, type");
		$this->kerjasama->where('id_mou', $data['id_mou']);
		$return = $this->kerjasama->get('t_mou');
		return $return;
	}

	public function mou_select_4($data){
		if (!empty($data['key'])) {
			$this->kerjasama->like('LOWER(nomor_mou)', $data['key']);
			$this->kerjasama->or_like('LOWER(nama_mou)', $data['key']);
		}
		$this->kerjasama->from('t_mou');
		$return = $this->kerjasama->count_all_results();
		return $return;
	}

	public function mou_select_5(){
		$this->kerjasama->select('id_mou, tgl_mou, tgl_berakhir, nama_file_mou, size, type, nomor_mou, nama_mou');
		$this->kerjasama->order_by('id_mou', 'DESC');
		$return = $this->kerjasama->get('t_mou');
		return $return;
	}

	public function mou_select_6($data){
		$this->kerjasama->select('id_mou');
		$this->kerjasama->where('tgl_mou', $data['tgl_mou']);
		$this->kerjasama->where('tgl_berakhir', $data['tgl_berakhir']);
		$this->kerjasama->where('nama_file_mou', $data['nama_file_mou']);
		$this->kerjasama->where('size', $data['size']);
		$this->kerjasama->where('type', $data['type']);
		$this->kerjasama->where('nomor_mou', $data['nomor_mou']);
		$this->kerjasama->where('nama_mou', $data['nama_mou']);
		$this->kerjasama->order_by('id_mou', 'DESC');
		$return = $this->kerjasama->get('t_mou');
		return $return;
	}
		### READ

		### UPDATE
	public function mou_update_1($data){
		$return = FALSE;
		if (!empty($data['id_mou'])) {
			$this->kerjasama->where('id_mou', $data['id_mou']);
			$return = $this->kerjasama->update('t_mou', $data);
		}
		return $return;
	}
		### UPDATE

		### DELETE
	public function mou_delete_1($data){
		$return = FALSE;
		if (!empty($data['id_mou'])) {
			$this->kerjasama->where('id_mou', $data['id_mou']);
			$return = $this->kerjasama->delete('t_mou');
		}
		return $return;
	}
		### DELETE
	## TABLE MOU END
	
// =============================================================================================

	## TABLE JENIS_INSTITUSI START
	## KOLOM kode_jenis_institusi, nama_jenis_institusi
		### READ
	public function jenis_institusi_select_1(){
		$return = $this->kerjasama->get('t_jenis_institusi');
		return $return;
	}
		### READ
	## TABLE JENIS_INSTITUSI END

// =============================================================================================
	
	## TABLE BIDANG_KERJASAMA START
	## KOLOM id_bidang_kerjasama, nama_bidang_kerjasama
		### READ
	public function bidang_kerjasama_select_1(){
		$return = $this->kerjasama->get('t_bidang_kerjasama');
		return $return;
	}
		### READ
	## TABLE BIDANG_KERJASAMA END

// =============================================================================================
	
	## TABLE LINGKUP_KERJASAMA START
	## KOLOM id_lingkup_kerjasama, nama_lingkup_kerjasama
		### READ
	public function lingkup_kerjasama_select_1(){
		$return = $this->kerjasama->get('t_lingkup_kerjasama');
		return $return;
	}
		### READ
	## TABLE LINGKUP_KERJASAMA END
	
// =============================================================================================
	
	## TABLE MITRA_KERJASAMA START
	## KOLOM id_mitra_kerjasama, nama_penanggung_jawab, jabatan_penanggung_jawab, kode_jenis_institusi, nama_instansi_mitra_kerjasama, alamat_instansi_mitra_kerjasama, telepon_instansi_mitra_kerjasama, email_instansi_mitra_kerjasama, id_lama_pengalaman_kerjasama, id_bidang_kerjasama, id_lingkup_kerjasama, pejabat_penandatanganan, tahun_pengalaman_kerjasama, bulan_pengalaman_kerjasama
		### CREATE
	public function mitra_kerjasama_insert_1($data){
		$return = $this->kerjasama->insert('t_mitra_kerjasama', $data);
		return $return;
	}
		### CREATE

		### READ
	public function mitra_kerjasama_select_1($data){
		$this->kerjasama->join('t_jenis_institusi', 't_jenis_institusi.kode_jenis_institusi = t_mitra_kerjasama.kode_jenis_institusi');
		$this->kerjasama->join('t_bidang_kerjasama', 't_bidang_kerjasama.id_bidang_kerjasama = t_mitra_kerjasama.id_bidang_kerjasama');
		$this->kerjasama->join('t_lingkup_kerjasama', 't_lingkup_kerjasama.id_lingkup_kerjasama = t_mitra_kerjasama.id_lingkup_kerjasama');
		if (!empty($data['key'])) {
			$this->kerjasama->like('nama_penanggung_jawab', $data['key']);
			$this->kerjasama->or_like('jabatan_penanggung_jawab', $data['key']);
			$this->kerjasama->or_like('nama_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('alamat_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('telepon_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('email_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('pejabat_penandatanganan', $data['key']);
			$this->kerjasama->or_like('nama_jenis_institusi', $data['key']);
			$this->kerjasama->or_like('nama_bidang_kerjasama', $data['key']);
			$this->kerjasama->or_like('nama_lingkup_kerjasama', $data['key']);
		}
		$this->kerjasama->limit($data['limit'], $data['start']);
		$this->kerjasama->order_by('id_mitra_kerjasama', 'DESC');
		$return = $this->kerjasama->get('t_mitra_kerjasama');
		return $return;
	}

	public function mitra_kerjasama_select_2($data){
		$this->kerjasama->join('t_jenis_institusi', 't_jenis_institusi.kode_jenis_institusi = t_mitra_kerjasama.kode_jenis_institusi');
		$this->kerjasama->join('t_bidang_kerjasama', 't_bidang_kerjasama.id_bidang_kerjasama = t_mitra_kerjasama.id_bidang_kerjasama');
		$this->kerjasama->join('t_lingkup_kerjasama', 't_lingkup_kerjasama.id_lingkup_kerjasama = t_mitra_kerjasama.id_lingkup_kerjasama');
		if (!empty($data['key'])) {
			$this->kerjasama->like('nama_penanggung_jawab', $data['key']);
			$this->kerjasama->or_like('jabatan_penanggung_jawab', $data['key']);
			$this->kerjasama->or_like('nama_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('alamat_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('telepon_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('email_instansi_mitra_kerjasama', $data['key']);
			$this->kerjasama->or_like('pejabat_penandatanganan', $data['key']);
			$this->kerjasama->or_like('nama_jenis_institusi', $data['key']);
			$this->kerjasama->or_like('nama_bidang_kerjasama', $data['key']);
			$this->kerjasama->or_like('nama_lingkup_kerjasama', $data['key']);
		}
		$this->kerjasama->from('t_mitra_kerjasama');
		$return = $this->kerjasama->count_all_results();
		return $return;
	}

	public function mitra_kerjasama_select_3($data){
		$this->kerjasama->where('id_mitra_kerjasama', $data['id_mitra_kerjasama']);
		$return = $this->kerjasama->get('t_mitra_kerjasama');
		return $return;
	}
		### READ

		### UPDATE
	public function mitra_kerjasama_update_1($data){
		$return = FALSE;
		if (!empty($data['id_mitra_kerjasama'])) {
			$this->kerjasama->where('id_mitra_kerjasama', $data['id_mitra_kerjasama']);
			$return = $this->kerjasama->update('t_mitra_kerjasama', $data);
		}
		return $return;
	}
		### UPDATE

		### DELETE
	public function mitra_kerjasama_delete_1($data){
		$return = FALSE;
		if (!empty($data['id_mitra_kerjasama'])) {
			$this->kerjasama->where('id_mitra_kerjasama', $data['id_mitra_kerjasama']);
			$return = $this->kerjasama->delete('t_mitra_kerjasama');
		}
		return $return;
	}
		### DELETE
	## TABLE MITRA_KERJASAMA END
	
// =============================================================================================
	
	## TABLE PKS START
	## KOLOM kode_pks, id_mou, no_pks, nama_pks, dana_pks, dokumen_pks, nama_dokumen_pks, type, size
		### CREATE
	public function pks_insert_1($data){
		if (!empty($data['dokumen_pks'])) {
			$data['dokumen_pks'] = implode("", $data['dokumen_pks']);
		}
		$return = $this->kerjasama->insert('t_pks', $data);
		return $return;
	}
		### CREATE

		### READ
	public function pks_select_1($data){
		$this->kerjasama->select('kode_pks');
		$this->kerjasama->where('id_mou', $data['id_mou']);
		$this->kerjasama->where('no_pks', $data['no_pks']);
		$this->kerjasama->where('nama_pks', $data['nama_pks']);
		$this->kerjasama->where('dana_pks', $data['dana_pks']);
		$this->kerjasama->where('nama_dokumen_pks', $data['nama_dokumen_pks']);
		$this->kerjasama->where('type', $data['type']);
		$this->kerjasama->where('size', $data['size']);
		$this->kerjasama->order_by('kode_pks', 'DESC');
		$return = $this->kerjasama->get('t_pks');
		return $return;
	}

	public function pks_select_2($data){
		$this->kerjasama->select('t_pks.kode_pks, t_pks.id_mou, t_pks.no_pks, t_pks.nama_pks, t_pks.dana_pks, t_pks.nama_dokumen_pks, t_pks.type, t_pks.size, t_mou.nama_mou');
		$this->kerjasama->join('t_mou', 't_mou.id_mou = t_pks.id_mou');
		if (!empty($data['key'])) {
			$this->kerjasama->like('nama_mou', $data['key']);
			$this->kerjasama->or_like('no_pks', $data['key']);
			$this->kerjasama->or_like('nama_pks', $data['key']);
		}
		$this->kerjasama->limit($data['limit'], $data['start']);
		$this->kerjasama->order_by('kode_pks', 'DESC');
		$return = $this->kerjasama->get('t_pks');
		return $return;
	}

	public function pks_select_3($data){
		$this->kerjasama->select('t_pks.kode_pks, t_pks.id_mou, t_pks.no_pks, t_pks.nama_pks, t_pks.dana_pks, t_pks.nama_dokumen_pks, t_pks.type, t_pks.size, t_mou.nama_mou');
		$this->kerjasama->join('t_mou', 't_mou.id_mou = t_pks.id_mou');
		if (!empty($data['key'])) {
			$this->kerjasama->like('nama_mou', $data['key']);
			$this->kerjasama->or_like('no_pks', $data['key']);
			$this->kerjasama->or_like('nama_pks', $data['key']);
		}
		$this->kerjasama->from('t_pks');
		$return = $this->kerjasama->count_all_results();
		return $return;
	}

	public function pks_select_4($data){
		$this->kerjasama->select('nama_dokumen_pks, dokumen_pks, size, type');
		$this->kerjasama->where('kode_pks', $data['kode_pks']);
		$return = $this->kerjasama->get('t_pks');
		return $return;
	}

	public function pks_select_5($data){
		$this->kerjasama->select('kode_pks, id_mou, no_pks, nama_pks, dana_pks, nama_dokumen_pks, type, size');
		$this->kerjasama->where('kode_pks', $data['kode_pks']);
		$return = $this->kerjasama->get('t_pks');
		return $return;
	}
		### READ

		### DELETE
	public function pks_delete_1($data){
		$return = FALSE;
		if (!empty($data['kode_pks'])) {
			$this->kerjasama->where('kode_pks', $data['kode_pks']);
			$return = $this->kerjasama->delete('t_pks');
		}
		return $return;
	}
		### DELETE
	## TABLE PKS END
	
// =============================================================================================
	
	## TABLE PKS_UNIT START
	## KOLOM id_pks_unit, kode_pks, kode_unit_pelaksana
		### CREATE
	public function pks_unit_insert_1($data){
		$return = $this->kerjasama->insert_batch('t_pks_unit', $data);
		return $return;
	}
		### CREATE

		### READ
	public function pks_unit_select_1($data){
		$this->kerjasama->where('kode_pks', $data['kode_pks']);
		$return = $this->kerjasama->get('t_pks_unit');
		return $return;
	}
		### READ
	## TABLE PKS_UNIT END
	
// =============================================================================================
	
	## TABLE DOKUMEN_DASAR_KERJASAMA START
	## KOLOM id_dokumen_dasar_kerjasama, nama_dokumen_dasar, dokumen_dasar, size, type, id_mou
		### CREATE
	public function dokumen_dasar_kerjasama_insert_1($data){
		$return = $this->kerjasama->insert('t_dokumen_dasar_kerjasama', $data);
		return $return;
	}
		### CREATE

		### READ
	public function dokumen_dasar_kerjasama_select_1($data){
		$this->kerjasama->select('id_dokumen_dasar_kerjasama, nama_dokumen_dasar, size, type, id_mou');
		$this->kerjasama->where('id_mou', $data['id_mou']);
		$return = $this->kerjasama->get('t_dokumen_dasar_kerjasama');
		return $return;
	}

	public function dokumen_dasar_kerjasama_select_2($data){
		$this->kerjasama->select('nama_dokumen_dasar, dokumen_dasar, size, type, id_mou');
		$this->kerjasama->where('id_dokumen_dasar_kerjasama', $data['id_dokumen_dasar_kerjasama']);
		$return = $this->kerjasama->get('t_dokumen_dasar_kerjasama');
		return $return;
	}
		### READ

		### DELETE
	public function dokumen_dasar_kerjasama_delete_1($data){
		$return = FALSE;
		if (!empty($data['id_mou'])) {
			$this->kerjasama->where('id_mou', $data['id_mou']);
			$return = $this->kerjasama->delete('t_dokumen_dasar_kerjasama');
		}
		return $return;
	}

	public function dokumen_dasar_kerjasama_delete_2($data){
		$return = FALSE;
		if (!empty($data['id_dokumen_dasar_kerjasama'])) {
			$this->kerjasama->where('id_dokumen_dasar_kerjasama', $data['id_dokumen_dasar_kerjasama']);
			$return = $this->kerjasama->delete('t_dokumen_dasar_kerjasama');
		}
		return $return;
	}
		### DELETE
	## TABLE DOKUMEN_DASAR_KERJASAMA END
}
?>