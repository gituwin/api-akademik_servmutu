<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_aps extends CI_Model {
	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');

		
	}
    
    function ps()
	{

        // return"soueiutruyrtiyo;eroterio;";
		$query="
        SELECT nm_jenis,jenjang,nm_prodi,nilai_huruf,nomor_sk,tgl_akreditasi,tgl_kadaluarsa FROM public.tmp_akd_master_prodi  
        LEFT JOIN tmp_akd_master_jenis
        ON tmp_akd_master_prodi.kd_jenis = tmp_akd_master_jenis.kd_jenis
        LEFT JOIN akreditasi_master_unit
        ON tmp_akd_master_prodi.nm_prodi=akreditasi_master_unit.nm_unit 
        LEFT JOIN akreditasi_master_data
        ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit where tampilkan='YA'  AND nomor_sk IS NOT NULL ";
		$sql = $this->mutu->query($query);
		return $sql->result_array();
		
	}
}

/* End of file M_aps.php */

?>