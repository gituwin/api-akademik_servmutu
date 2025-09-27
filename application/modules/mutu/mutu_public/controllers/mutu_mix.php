<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 *
 * @package		Revitalisasi SIMPEG
 * @subpackage  SIMPEG Staff
 * @category    master (UIN)
 * @created 	14-07-2014, Wihikan MAwi Wijna
*/
 
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
//require APPPATH.'/libraries/REST_Controller.php';
 
class Mutu_mix extends CI_Controller
{
	protected $builtInMethods;
 
	public function __construct() {
		parent::__construct();
		$this->load->model('mutu_ppm/mdl_ppm'								,'mdl_1001');
		$this->load->model('mutu_general/mdl_pgw_staf'						,'mdl_1002');
		$this->load->model('mutu_general/mdl_pgw_his_pendidikan'			,'mdl_1003');
		$this->load->model('mutu_general/mdl_pgw_his_tugas'					,'mdl_1004');
		$this->load->model('mutu_general/mdl_pgw_his_sertifikasi'			,'mdl_1005');
		
		
	}
	
	function index(){ echo '<h1>MUTU MIXED1</h1>'; }
	
	function data_test($format = 'json'){
		if(true){
		#if($this->sia_api_lib_format->api_auth()){
		#echo 'quiu'; die();
		#$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		#$subkode 	= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		#$query = null;
		$err_number = 404;
		$query = $_POST;
		#$query = array(1,2,3,4);
		
		$this->sia_api_lib_format->output($query, $format);
	
	}}
	
	//1. VIEW
	function data_view($format = 'json'){
		// if($this->sia_api_lib_format->api_auth()){
		$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode 	= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$query = null;
		$err_number = 404;
		
		switch($kode){
			
			case 1002: switch($subkode){ default: 
				case 1: $query = $this->mdl_1002->_table_select_01(); break; 
			} break;
			case 1003: switch($subkode){ default: 
				case 1: $query = $this->mdl_1003->_table_select_01(); break; 
			} break;
			case 1004: switch($subkode){ default: 
				case 1: $query = $this->mdl_1004->_table_select_01(); break; 
			} break;
			case 1005: switch($subkode){ default: 
				case 1: $query = $this->mdl_1005->_table_select_01(); break; 
			} break;
			
			default: $query = null; break;
		}
		
		$this->sia_api_lib_format->output($query, $format);
	// }
}
	
	//2. SEARCH
	function data_search($format = 'json'){
		// if($this->sia_api_lib_format->api_auth()){
		if(!isset($_POST['api_kode'])) { echo ''; die(); }
		$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode 	= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$aps = $this->input->post('api_search');
		$query = null;
		$err_number = 404;

		for($i = 0; $i < 10; $i++){ if(!isset($aps[$i])){ $aps[$i] = ''; }}
		switch($kode){
			
			case 1003: switch($subkode){ default: 
				case 1: $query = $this->mdl_1003->_table_search_01($aps[0]); break; 
				case 2: $query = $this->mdl_1003->_table_search_02($aps); break; 
				case 3: $query = $this->mdl_1003->_table_search_03($aps); break; 
				case 4: $query = $this->mdl_1003->_table_search_04($aps); break; 
				case 5: $query = $this->mdl_1003->_table_search_05($aps); break; 
				case 6: $query = $this->mdl_1003->_table_search_06($aps); break; 
			} break;
			case 1004: switch($subkode){ default: 
				case 1: $query = $this->mdl_1004->_table_search_01($aps[0]); break; 
				case 2: $query = $this->mdl_1004->_table_search_02($aps); break; 
				case 3: $query = $this->mdl_1004->_table_search_03($aps); break; 
				case 4: $query = $this->mdl_1004->_table_search_04($aps); break; 
			} break;
			case 1005: switch($subkode){ default: 
				case 1: $query = $this->mdl_1005->_table_search_01($aps[0]); break; 
				case 2: $query = $this->mdl_1005->_table_search_02($aps); break; 
			} break;

			default: $query = null; break;

		}

		$this->sia_api_lib_format->output($query, $format);
		// }
	}
	
	function data_count($format = 'json'){
		// if($this->sia_api_lib_format->api_auth()){
		$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode 	= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$aps = $this->input->post('api_search');
		$query = null;
		$err_number = 404;

		for($i = 0; $i < 10; $i++){ if(!isset($aps[$i])){ $aps[$i] = ''; }}
		
		switch($kode){
			case 1002: switch($subkode){ default: case 1: $query = $this->mdl_1002->_table_count_01(); break; } break;
			case 1003: switch($subkode){ default: 
				case 1: $query = $this->mdl_1003->_table_count_01(); break; 
				case 2: $query = $this->mdl_1003->_table_count_02($aps); break; 
				case 3: $query = $this->mdl_1003->_table_count_03($aps); break; 
				case 4: $query = $this->mdl_1003->_table_count_04($aps); break; 
				case 5: $query = $this->mdl_1003->_table_count_05($aps); break; 
				case 6: $query = $this->mdl_1003->_table_count_06($aps); break; 
			} break;
			case 1004: switch($subkode){ default: 
				case 1: $query = $this->mdl_1004->_table_count_01(); break; 
				case 2: $query = $this->mdl_1004->_table_count_02($aps); break; 
				case 3: $query = $this->mdl_1004->_table_count_03($aps); break;  
				case 4: $query = $this->mdl_1004->_table_count_04($aps); break;  
			} break;
			case 1005: switch($subkode){ default: 
				case 1: $query = $this->mdl_1005->_table_count_01(); break; 
				case 2: $query = $this->mdl_1005->_table_count_02($aps); break;  
			} break;
			
			default: $query = null; break;
		}
		
		$this->sia_api_lib_format->output($query, $format);
	// }
	}
	
	
	
	//5. PROCEDURE
	function data_procedure($format = 'json'){
		// if($this->sia_api_lib_format->api_auth()){
		$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
		$subkode 	= (int)preg_replace("/[^0-9]/", "", $_POST['api_subkode']);
		$datapost	= $this->input->post('api_datapost');
		$query = null;
		$err_number = 404;
		
		switch($kode){
			case 1001: switch($subkode){ 
				default: 
				case 1: $query = $this->mdl_1002->_procedure1001_01($datapost); break; 
			}  break;
			
						
			default: $query = null; break;
		}
		
		$this->sia_api_lib_format->output($query, $format);
		// }
	}
	
	

	
}
?>
