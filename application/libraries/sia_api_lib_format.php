<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Sia_api_lib_format {
	
	/* CRYPT */
	
	public function cr0_ZIN(){ $c = '0c141fc101'; $h = 0; for($i = 0; $i < (strlen($c)/2); $i++){ $h += hexdec(substr($c,2*$i,2)); } return $h;}
	public function cr0_PV(){ $c = '643b'; $h = 0; for($i = 0; $i < (strlen($c)/2); $i++){ $h += hexdec(substr($c,2*$i,2)); } return $h;}
	public function cr0_z00($a){
	if($a < 0){ return $this->cr0_z02(($this->cr0_ZIN()-1), abs($a)); } else { return fmod($a, $this->cr0_ZIN()); }}
	public function cr0_z01($a, $b) { return $this->cr0_z00($this->cr0_z00($a)+$this->cr0_z00($b)); }
	public function cr0_z02($a, $b) { return $this->cr0_z00($this->cr0_z00($a)*$this->cr0_z00($b)); }
	public function cr0_z03($a, $b) { return $this->cr0_z00($this->cr0_z00($a)-$this->cr0_z00($b)); }
	public function cr0_z04($a) { if($this->cr0_z00($a) == 0){ return 0; }
		else { $a = $this->cr0_z00($a); $b = $this->cr0_ZIN(); $x = 0; $y = 1; $lx = 1; $ly = 0; $q = 0; $t1 = $t2 = 0; $t3 = 0; $i = 1;
		while($b!=0) {
		$q = floor($a/$b); $t1 = fmod($a,$b);	
		$a = $b; $b = $t1;					
		$t2 = $x; $x = $lx-$q*$x; $lx = $t2;	
		$t3 = $y; $y = $ly-$q*$y; $ly = $t3;		
		$i++;
		}
		return $this->cr0_z00($lx);
		}}
	function cr0_z05($a, $b) { if($this->cr0_z00($b) == 0){ return 1; } else {	$h = 1;
			for($i = 0; $i < $this->cr0_z00($b); $i++){ $h = $this->cr0_z02($h, $a); } return $h; }}
	function cr0_h01($a){ if(strlen($a) < 2){ return '0'.$a; } else { return $a; }}
	function encrypt($msg1 = '', $key1 = 0){
		$pk2 = $this->cr0_z05($key1,$this->cr0_PV());
		$enc	= ''; $en1 = '';
		for($j = 0; $j < strlen($msg1); $j++){
			$t1 = $this->cr0_z00(ord(substr($msg1,$j,1))-1);
			$r1 = mt_rand(1,$this->cr0_ZIN()-2);
			$g1 = $this->cr0_z05($key1,$r1); #if($g1 > 255){ $g1 = 255; }
			$g2 = $this->cr0_z02($t1,$this->cr0_z05($pk2,$r1));
			$enc .= strrev($this->cr0_h01(dechex($g1-1)).$this->cr0_h01(dechex($g2-1)));	
			$en1 .= "($g1,$g2) ";
			#$arr1[] = $g1; $arr2[] = $g2; 
		} #return array('t1' => $enc, 't2' => $en1, 't1l' => strlen($enc)); 
		return $enc; #echo $enc;
	}
	function decrypt($msg1 = '', $key1 = 0){
		$msg1 = preg_replace("/[^0-9a-f]/", "", $msg1);
		if (fmod(strlen($msg1),4) != 0) {return md5($msg1.rand()); }
		else { $h = '';
		for($j = 0; $j < (strlen($msg1)/4); $j++){
			$t1 = $this->cr0_z05(hexdec(strrev(substr($msg1,(4*$j)+2,2)))+1,$this->cr0_PV());
			$t2 = $this->cr0_z02($this->cr0_z04($t1),hexdec(strrev(substr($msg1,(4*$j),2)))+1);
			$h .= chr($t2+1); 
		} return $h; }
	}
	
	
	
	
	
	
	
	
	
	
	
	
	/* public function _log($aksi, $datax = array()){
		if(!isset($_POST['iduser'])){ $v_nm = 'LUAR APPLIKASI'; } else { $v_nm = $_POST['iduser']; }
		if(!isset($_POST['idip'])){ $v_ip = 'LUAR APPLIKASI'; } else { $v_ip = $_POST['idip']; }
		
		$aksi = $aksi.' '.json_encode($datax);
		$datapost1 = array($v_nm,$aksi,$v_ip,'');
		$this->db->call_procedure('P_ISI_HISTORI_LOG', $datapost1); } */
	
	public function api_auth(){ 
		$CI =& get_instance();
		$hasil = false;
		if(isset($_SERVER['HTTP_HEADERNAME'])){
		$hasil = true;
		
		//k4li4d__mn
		//k4lip0__tl
		//udin4l__n1
		//asfaru__n6
		//dedy5u__4t
		
		
		/* $CI->config->set_item('encryption_key', pack('H*', "ccdffc7055d1ffc5bea9306b4c3474"));
		$enc = $CI->encrypt->decode($_SERVER['HTTP_HEADERNAME']);
		$hasil1 = substr($enc,0,20);
		if(substr($enc,0,20) == '/home/akademik/klien'){ $hasil = true; } */
				
		#$hasil = if(substr($hasil, 0, 20));
		
		/* $key1 = array(
			pack('H*', "ccdffc7055d1ffc5bea9306b4c3474"),	//portal
			pack('H*', "ccdffcc5bea9306b4c347055d1ff74"),	//admin.
			pack('H*', "ccdffc7055d1ffc5bea9306b4c34af"), //simar
			pack('H*', "ccdffc7055d1ffc5bea9308e4c34a1"), //alumni
			pack('H*', "ccdffc7055d1ffc5bea9308e4c3454"), //surat
		);
		
		
		foreach ($key1 as $ky){
			$CI->config->set_item('encryption_key', $ky);
			$enc = $CI->encrypt->decode($_SERVER['HTTP_HEADERNAME']);
			
			if(substr($enc,0,20) == '/home/akademik/klien'){ $hasil = true; }
			elseif(substr($enc,0,20) == '/home/akademik/admin'){ $hasil = true; }
		} */
		
		}
		return $hasil;
	}
	
	private function _formatjson($data = array()){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($data);
	}
	
	private function _formatXML($data = array()){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header ("Content-Type:text/xml"); 
		//$data_ = $this->array_to_xml($data);
		echo $this->array_to_xml($data);
		//echo $this->xml_encode($data_);
	}
	
	function array_to_xml($query, $i = 0){
		$hasil = '';
		foreach($query as $q => $v){
			for($j = 0; $j < ($i+1); $j++) { $hasil .= "\t"; }
			if (is_array($v)){ 
				$hasil .= "<element>\r\n".$this->array_to_xml($v, $i+1);
				for($j = 0; $j < ($i+1); $j++) { $hasil .= "\t"; }
				$hasil .= "</element>\r\n"; 
			} else { 
				$hasil .= "<$q>".$v."</$q>\r\n";
			}
		}
		if ($i == 0) { $hasil = "<root>\r\n".$hasil."</root>"; }
		return $hasil;
	}
	
	/* private function xml_encode($mixed,$domElement=null,$DOMDocument=null){
		if(is_null($DOMDocument)){
        $DOMDocument=new DOMDocument;
        $DOMDocument->formatOutput=true;
        $this->xml_encode($mixed,$DOMDocument,$DOMDocument);
        echo $DOMDocument->saveXML();
		}
		else{
			if(is_array($mixed)){
				foreach($mixed as $index=>$mixedElement){
					if(is_int($index)){
						if($index==0){
							$node=$domElement;
						}
						else{
							$node=$DOMDocument->createElement($domElement->tagName);
							$domElement->parentNode->appendChild($node);
						}
					}
					else{
						$plural=$DOMDocument->createElement($index);
						$domElement->appendChild($plural);
						$node=$plural;
						if(rtrim($index,'s')!==$index){
							$singular=$DOMDocument->createElement(rtrim($index,'s'));
							$plural->appendChild($singular);
							$node=$singular;
						}
					}
					$this->xml_encode($mixedElement,$node,$DOMDocument);
				}
			}
			else{
				$domElement->appendChild($DOMDocument->createTextNode($mixed));
			}
		}
	} */
	private function xml_encode($data){
		$xml = new SimpleXMLElement('<root/>');
		array_walk_recursive($data, array ($xml, 'addChild'));
		return $xml->asXML();
	}
	
	/* public function to_xml($data = null, $structure = null, $basenode = 'xml')
	{
		if ($data === null and ! func_num_args())
		{
			$data = $this->_data;
		}

		// turn off compatibility mode as simple xml throws a wobbly if you don't.
		if (ini_get('zend.ze1_compatibility_mode') == 1)
		{
			ini_set('zend.ze1_compatibility_mode', 0);
		}

		if ($structure === null)
		{
			$structure = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$basenode />");
		}

		// Force it to be something useful
		if ( ! is_array($data) AND ! is_object($data))
		{
			$data = (array) $data;
		}

		foreach ($data as $key => $value)
		{

			//change false/true to 0/1
			if(is_bool($value))
			{
				$value = (int) $value;
			}

			// no numeric keys in our xml please!
			if (is_numeric($key))
			{
				// make string key...
				$key = (singular($basenode) != $basenode) ? singular($basenode) : 'item';
			}

			// replace anything not alpha numeric
			$key = preg_replace('/[^a-z_\-0-9]/i', '', $key);

			// if there is another array found recursively call this function
			if (is_array($value) || is_object($value))
			{
				$node = $structure->addChild($key);

				// recursive call.
				$this->to_xml($value, $node, $key);
			}

			else
			{
				// add single node.
				$value = htmlspecialchars(html_entity_decode($value, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, "UTF-8");

				$structure->addChild($key, $value);
			}
		}

		return $structure->asXML();
	} */
	
	function output($data = array(), $format = 'json'){
		if ($format == 'json'){
			$this->_formatjson($data);
		} else {
			$this->_formatXML($data);
		}
	}
	
	function _auto_res01($rxlim, $sql1, $rep1, $ord1, $par1){
		$CI =& get_instance(); #return $rxlim[0]; #return array('xxxx');
		if($rxlim[0] == 'COUNT'){ #RETURN preg_sql_count1($sql1, $rep1);
			return $CI->db->query(preg_sql_count1($sql1, $rep1),$par1)->result_array();
		} elseif ($rxlim[0] == 'ALL'){ #RETURN preg_sql_count1($sql1,'',true);
			return $CI->db->query(preg_sql_count1($sql1,'',true),$par1)->result_array();
		} else {
			$rxlim1 = array($rxlim[0],$rxlim[1],$ord1);
			$sql1 = prep_sql_lim1($rxlim1, $sql1); #return preg_sql_count1($sql1,'',true);
			return $CI->db->query(preg_sql_count1($sql1,'',true),$par1)->result_array(); 
		} /* */
	}
}