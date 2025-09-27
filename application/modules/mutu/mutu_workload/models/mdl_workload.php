<?php
if(!defined('BASEPATH'))exit('No direct script access allowed');
class MDL_workload extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->workload = $this->load->database('workload');
    }

    function get_m_soal(){
        $query = "SELECT * FROM m_soal";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function get_Alljawaban(){
        $query = "SELECT * FROM m_jawaban";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function post_jawaban($jawaban,$id_soal,$tanggal,$kd_ta,$kd_smt,$kd_kelas,$kd_prodi, $nim){
        $query = "INSERT INTO m_jawaban (JAWABAN, ID_SOAL, TANGGAL, KD_TA, KD_SMT, KD_KELAS, KD_PRODI, NIM) VALUES ('$jawaban',$id_soal,'$tanggal',$kd_ta,$kd_smt,'$kd_kelas','$kd_prodi', '$nim')";
		$sql = $this->workload->query($query);
		return $sql;
    }

    function post_jawab($JAWABAN, $ID_SOAL, $TANGGAL, $KD_TA, $KD_SMT, $KD_KELAS, $KD_PRODI, $NIM){
        $query = "INSERT INTO m_jawaban(JAWABAN, ID_SOAL, TANGGAL, KD_TA, KD_SMT, KD_KELAS, KD_PRODI, NIM)VALUES('$JAWABAN', $ID_SOAL,'$TANGGAL','$KD_TA','$KD_SMT','$KD_KELAS','$KD_PRODI', '$NIM')";
        $sql = $this->workload->query($query);
        return $sql;
    }

    function postTbm_jawab($id_soal, $tanggal, $kd_ta, $kd_smt, $kd_kelas, $kd_prodi, $kd_kur, $kd_mk, $nim, $jawaban){
        $query = "INSERT INTO m_jawab(id_soal, tanggal, kd_ta, kd_smt, kd_kelas, kd_prodi, kd_kur, kd_mk, nim, jawaban) VALUES($id_soal, '$tanggal', '$kd_ta', '$kd_smt', '$kd_kelas', '$kd_prodi', '$kd_kur', '$kd_mk', '$nim', '$jawaban')";
        $sql = $this->workload->query($query);
        return $sql;
    }
    function insertDataNew($data){
        $hasil = $this->workload->insert('m_jawab',$data);
        $hasil = $this->workload->affected_rows();
        return $hasil;
    }

    function post_jawabNewTb($jawaban,$id_soal,$tanggal,$kd_ta,$kd_smt,$kd_kelas,$kd_prodi, $nim, $kd_kur, $kd_mk){
        $query = "INSERT INTO master_jawaban(JAWABAN, ID_SOAL, TANGGAL, KD_TA, KD_SMT, KD_KELAS, KD_PRODI, NIM, KD_KUR, KD_MK)VALUES('$jawaban',$id_soal,'$tanggal',$kd_ta,$kd_smt,'$kd_kelas','$kd_prodi', '$nim','$kd_kur','$kd_mk')";
        $sql = $this->workload->query($query);
        return $sql;
    }

    function get_jawaban($nim,$kd_kelas){
        $query = "SELECT * FROM m_jawaban WHERE nim = '$nim' AND kd_kelas = '$kd_kelas' ORDER BY id_jawaban";
		$sql = $this->workload->query($query);
		return $sql->result_array();
    }

    function getJawabByTaSmtProdi($kd_ta, $kd_smt, $kd_prodi, $kd_jenis){
        $query = "SELECT
        nim,
        kd_prodi,
        kd_kelas,
        MAX(CASE WHEN id_soal = 1 THEN jawaban ELSE NULL END) AS jawaban1,
        MAX(CASE WHEN id_soal = 2 THEN jawaban ELSE NULL END) AS jawaban2,
        MAX(CASE WHEN id_soal = 3 THEN jawaban ELSE NULL END) AS jawaban3,
        MAX(CASE WHEN id_soal = 4 THEN jawaban ELSE NULL END) AS jawaban4,
        MAX(CASE WHEN id_soal = 5 THEN jawaban ELSE NULL END) AS jawaban5,
        kd_ta,
        kd_smt
    FROM m_jawaban
    WHERE kd_ta=$kd_ta and kd_smt=$kd_smt and kd_prodi='$kd_prodi' and kode_jenis=$kd_jenis
    GROUP BY nim, kd_prodi, kd_kelas, kd_ta, kd_smt, kode_jenis";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function getKd_prodiM_jawaban($kd_ta, $kd_smt, $jenis_workload){
        $query = "SELECT DISTINCT kd_prodi
        FROM m_jawaban
        WHERE kd_ta=$kd_ta and kd_smt=$kd_smt and kode_jenis=$jenis_workload";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function updateJawabanWorkload($id_soal,$id_jawaban,$tanggal,$kd_ta,$kd_smt,$kd_kelas,$kd_prodi,$nim,$jawaban){	
        $query = "UPDATE m_jawaban SET id_soal = $id_soal, tanggal = '$tanggal', kd_ta = '$kd_ta', kd_smt = '$kd_smt', kd_kelas = '$kd_kelas', kd_prodi = '$kd_prodi', nim = '$nim', jawaban = '$jawaban' WHERE id_jawaban = $id_jawaban";
        $sql = $this->workload->query($query);
        return $sql;
    }

    function updateKD_KURandKD_MK($id_soal,$id_jawaban,$tanggal,$kd_ta,$kd_smt,$kd_kelas,$kd_prodi,$nim,$jawaban,$kd_kur,$kd_mk){
        $query = "UPDATE m_jawaban SET id_soal = $id_soal, tanggal = '$tanggal', kd_ta = '$kd_ta', kd_smt = '$kd_smt', 
                  kd_kelas = '$kd_kelas', kd_prodi = '$kd_prodi', nim = '$nim', jawaban = '$jawaban', kd_kur = '$kd_kur', kd_mk = '$kd_mk' WHERE id_jawaban = $id_jawaban";
        $sql = $this->workload->query($query);
        return $sql;
    }

    function getJawabanByprodi($kd_prodi){
        $query = "SELECT * FROM m_jawaban WHERE kd_prodi = '$kd_prodi'";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function getkd_prodiJwb(){
        $query = "SELECT DISTINCT kd_prodi FROM m_jawaban";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function getAllJawabanGroup($kd_prodi){
        $query = "SELECT
        nim,
        kd_prodi,
        kd_kelas,
        MAX(CASE WHEN id_soal = 1 THEN jawaban ELSE NULL END) AS jawaban1,
        MAX(CASE WHEN id_soal = 2 THEN jawaban ELSE NULL END) AS jawaban2,
        MAX(CASE WHEN id_soal = 3 THEN jawaban ELSE NULL END) AS jawaban3,
        MAX(CASE WHEN id_soal = 4 THEN jawaban ELSE NULL END) AS jawaban4,
        MAX(CASE WHEN id_soal = 5 THEN jawaban ELSE NULL END) AS jawaban5,
        kd_ta,
        kd_smt
    FROM m_jawaban
    WHERE kd_prodi = '$kd_prodi'
    GROUP BY nim, kd_prodi, kd_kelas, kd_ta, kd_smt";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

    function getAllJawabGroup(){
        $query = "SELECT
        nim,
        kd_prodi,
        kd_kelas,
        MAX(CASE WHEN id_soal = 1 THEN jawaban ELSE NULL END) AS jawaban1,
        MAX(CASE WHEN id_soal = 2 THEN jawaban ELSE NULL END) AS jawaban2,
        MAX(CASE WHEN id_soal = 3 THEN jawaban ELSE NULL END) AS jawaban3,
        MAX(CASE WHEN id_soal = 4 THEN jawaban ELSE NULL END) AS jawaban4,
        MAX(CASE WHEN id_soal = 5 THEN jawaban ELSE NULL END) AS jawaban5,
        kd_ta,
        kd_smt
    FROM m_jawaban
    GROUP BY nim, kd_prodi, kd_kelas, kd_ta, kd_smt";
        $sql = $this->workload->query($query);
        return $sql->result_array();
    }

}

?>