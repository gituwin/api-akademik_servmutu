<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Sinkron extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->mutu = $this->load->database('mutu');
		
	}
		public function all_akr_A()
	{
		
		$query="SELECT COUNT(akreditasi_master_data.nilai_huruf) FROM akreditasi_master_data INNER JOIN akreditasi_master_unit 
ON akreditasi_master_unit.kd_unit=akreditasi_master_data.kd_unit INNER JOIN
tmp_akd_master_prodi ON tmp_akd_master_prodi.kd_pddikti=akreditasi_master_data.kd_unit INNER JOIN
 tmp_akd_master_jenis ON tmp_akd_master_jenis.kd_jenis=tmp_akd_master_prodi.kd_jenis 
  WHERE akreditasi_master_data.nilai_huruf= 'A' ";

		$sql = $this->mutu->query($query)->result_array();
			return $sql;
	}

}

/* End of file m_sinkron.php */
/* Location: ./application/models/m_sinkron.php */