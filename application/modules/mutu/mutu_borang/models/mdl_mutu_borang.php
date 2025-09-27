<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class Mdl_mutu_borang extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
	}
	
	function ksk_borang($par=''){
		$where = "";
		if(!empty($par['id_borang'])){
			$arr_sql[] = "id_borang='".$par['id_borang']."'";
		}
		if(!empty($arr_sql)){
			$s_sql	= implode(" AND ", $arr_sql);
			$where = " WHERE ".$s_sql;
		}
		$sql = "SELECT * FROM (SELECT DISTINCT ON(id_ksk) id_ksk, nm_ksk, no_butir, no_urut, id_borang FROM item_borang_v ".$where." ORDER BY id_ksk ASC, no_urut ASC) AS x ORDER BY no_urut ASC";
		return $this->mutu->query($sql)->result();
	}

	// Fauzi Query Start
	function create_komentar($data){
		$return = $this->mutu->insert('t_komentar', $data);
		return $return;
		// $return = $this->mutu->insert('t_komentar', $data);
		// if ($return) {
		// 	$hasil[0]['success'] = TRUE;
		// 	return $hasil;
		// }
		// else {
		// 	$hasil[0]['success'] = FALSE;
		// 	return $hasil;
		// }
	}
	function select_komentar_by_butir_and_kode($data){
		$this->mutu->where($data);
		$this->mutu->order_by('waktu_komentar', 'ASC');
		return $this->mutu->get('t_komentar')->result_array();
	}
	function delete_komentar($data){
		$return = $this->mutu->delete('t_komentar', $data);
		return $return;
		// if ($return) {
		// 	return array('success' => TRUE);
		// }
		// else {
		// 	return array('success' => FALSE);
		// }
	}

	// popup start
	function create_popup($data){
		$return = $this->mutu->insert('t_ket_popup', $data);
		return $return;
	}
	function create_atur_popup($data){
		$return = $this->mutu->insert('t_atur_popup', $data);
		return $return;
	}
	function read_popup_by_borang_ksk_isiborang_butir($data){
		$this->mutu->where($data);
		$return = $this->mutu->get('t_ket_popup')->row_array();
		return $return;
	}
	function read_count_atur_by_borang_kode($data){
		$this->mutu->where($data);
		$return = $this->mutu->get('t_atur_popup')->num_rows();
		return $return;
	}
	function read_popup_by_borang_v1($data){
		$this->mutu->where($data);
		$this->mutu->order_by('id_ksk', 'ASC');
		$this->mutu->order_by('id_item_borang', 'ASC');
		$return = $this->mutu->get('t_ket_popup')->result_array();
		return $return;
	}
	function read_popup_by_id_join_borang($data){
		$this->mutu->select('isi_borang.isi_borang');
		$this->mutu->join('isi_borang', 'isi_borang.id_isi_borang = t_ket_popup.id_isi_borang');
		$this->mutu->where($data);
		$return = $this->mutu->get('t_ket_popup')->row_array();
		return $return;
	}
	function read_id_atur_by_borang_kode($data){
		$this->mutu->select('id_atur_popup');
		$this->mutu->where($data);
		$return = $this->mutu->get('t_atur_popup')->row_array();
		return $return;
	}
	function read_atur_by_borang($data){
		$this->mutu->where($data);
		$return = $this->mutu->get('t_atur_popup')->result_array();
		return $return;
	}
	function read_popup_by_id($data){
		$this->mutu->where($data);
		$return = $this->mutu->get('t_ket_popup')->row_array();
		return $return;
	}
	function update_popup($data, $id_popup){
		$this->mutu->set($data);
		$this->mutu->where('id_ket_popup', $id_popup);
		$return = $this->mutu->update('t_ket_popup');
		return $return;
	}
	function update_atur_popup($data, $id_atur){
		$this->mutu->set($data);
		$this->mutu->where('id_atur_popup', $id_atur);
		$return = $this->mutu->update('t_atur_popup');
		return $return;
	}
	// popup end
	// Fauzi Query End
}
?>