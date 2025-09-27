<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';


class Mutu_akreditasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_akreditasi/akreditasi', 'akrd');
		$this->load->library('s00_lib_api');
		// $this->load->library('curl');


	}

	public function index_get($format = 'json')
	{
		// $data = $this->webserv->akreditasi_post('akreditasi/akreditasi_list',$postdata);

$url = "http://service.uin-suka.ac.id/servsiasuper/index.php/sia_public/sia_master/data_view";
$tets = $this->s00_lib_api->get_api_json($url,'POST',array('api_kode'=>19000,'
	api_subkode'=>3, 'api_search' => array()));
	 // $this->sia_api_lib_format->output($tets, $format);
print_r($tets);
		 // echo "

   //          <center>Hayo lo :)</center>


   //    ";
	}

	function index_post()
	{
		$kode = $this->input->post('api_kode');
		$subkode = $this->input->post('api_subkode');
		switch ($kode) {

			case 313:
				switch ($subkode) {
					case 3:
						$alfa=$this->akrd->akreditasi();
               $this->response($alfa, 200); 

						break;

					
				}
				break;

		}
		# code...
						// $this->sia_api_lib_format->output($alfa, $format);
						// $alfa=$this->akrd->akreditasi();
						// print_r($alfa);
	
	}

}

/* End of file mutu_akreditasi.php */
/* Location: ./application/controllers/mutu_akreditasi.php */