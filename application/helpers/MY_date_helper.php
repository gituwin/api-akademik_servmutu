<?php
	function prep_sql_lim1($arr1, $sql1){
		$tot = $arr1[0]+$arr1[1];
		if($tot > 1){ $tot = $tot - 1; } else { $tot = 1; }
		$hasil = "SELECT * FROM (SELECT UIN9.*, ROWNUM AS CACAH_LIM_ FROM (".$sql1.' ORDER BY '.$arr1[2].") UIN9 WHERE ROWNUM <= ".($tot).") WHERE CACAH_LIM_ >= ".$arr1[0];
		return $hasil;
	}
	function prep_sql_arr1($arr1){
		$hasil = '';
		if(is_array($arr1)){ if(!empty($arr1)){
			for($i = 0; $i < count($arr1); $i++){
				$arr1[$i] = "'".$arr1[$i]."'";
			}
			$hasil = implode(',',$arr1);
		}}
		return $hasil;
	}
	function preg_sql_date1($input){
		return preg_replace_callback('~\[SQ01].*?\[/SQ01]~', 'prep_sql_date1', $input);
	}
	function prep_sql_date1($input){
		if (is_array($input)) {
		$blk = str_replace('[SQ01]','',$input[0]);
		$blk = str_replace('[/SQ01]','',$blk);
		$exp = explode('.',$blk);
		if(count($exp) > 1){ $i = 1; } else { $i = 0; }
		$end1 = $exp[$i].'_F';
		return "TO_CHAR(".$blk.",'".DATE_FORMAT_FULL."') AS ".$end1;
		}
	}
	function preg_sql_date2($input){
		return preg_replace_callback('~\[SQ02].*?\[/SQ02]~', 'prep_sql_date2', $input);
	}
	function prep_sql_date2($input){
		if (is_array($input)) {
		$blk = str_replace('[SQ02]','',$input[0]);
		$blk = str_replace('[/SQ02]','',$blk);
		$exp = explode('.',$blk);
		if(count($exp) > 1){ $i = 1; } else { $i = 0; }
		$end1 = $exp[$i].'';
		return "TO_CHAR(".$blk.",'".DATE_FORMAT_FULL."') AS ".$end1;
		}
	}
	function preg_sql_count1($sql, $rep, $clean = false){
		if(!$clean){
		#return $rep;
		return preg_replace('/\[R1\]SELECT(.*)FROM\[R1\]/',$rep." ", $sql);
		} else {
		return str_replace('[R1]','', $sql);
		}
	}
function datejsformat(){

}

function date_trans_unix($fulldate = '01/01/1900 00:00:00'){
	return mktime(intval(substr($fulldate,11,2)), intval(substr($fulldate,14,2)), intval(substr($fulldate,17,2)), intval(ltrim(substr($fulldate,3,2),'0')), intval(ltrim(substr($fulldate,0,2),'0')), substr($fulldate,6,4));
}	


function fulltoday() {
	return strftime("%Y-%m-%d %H:%M:%S", mktime (date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"))); }

function markproc(){ return 'oleh '.$_POST['iduser'].', '.fulltoday(); }

function today_foracle() { return date('d-m-Y H:m:s'); }

function historilog($aksi, $datax = array()){
	$CI =& get_instance();
	if(!isset($_POST['iduser'])){ $v_nm = 'LUAR APPLIKASI'; } else { $v_nm = $_POST['iduser']; }
	if(!isset($_POST['idip'])){ $v_ip = 'LUAR APPLIKASI'; } else { $v_ip = $_POST['idip']; }
		
	$aksi = $aksi.' '.json_encode($datax);
	$datapost1 = array($v_nm,$aksi,$v_ip,'');
	$CI->db->call_procedure('P_ISI_HISTORI_LOG', $datapost1); 
}

function t1_encode($kd_kelas){ $hasil = ''; #return $kd_kelas;
		$str 	= 'sng3bAdac5UEmQzv2YBTH8CVh7jXpRo0etfOK4MINSlwFZ6iL9kPD1JWyuqGxr#-.:/';
		$arr_e = array();  $arr_e1 = array(); $arr_r = array(); $arr_r1 = array();
		for($j = 0; $j < strlen($str); $j++){
			$j_ = $j; if ($j_ < 10) { $j_ = '0'.$j_; }
			$arr_e1[$j] = substr($str,$j,1);
			$arr_e[$j_] = substr($str,$j,1);
			$arr_r1[substr($str,$j,1)] = $j;
			$arr_r[substr($str,$j,1)] = $j_;
		}
		
		$total = 0;
		for($i = 0; $i < strlen($kd_kelas); $i++){
			$total = (int)substr($kd_kelas,$i,1) + $total; 
		} $u = fmod($total,10);
		
		$kd_enc = $arr_e1[$u];
		for($i = 0; $i < strlen($kd_kelas); $i++){
			$k = ($arr_r1[substr($kd_kelas,$i,1)]+$u); if($k < 10) { $k = '0'.$k; }
			$kd_enc .= ''.$k.rand(0,9); 
		} return $kd_enc;
}

function t1_decode($kd_enc){ $hasil = '';  #return $kd_enc;
		$str 	= 'sng3bAdac5UEmQzv2YBTH8CVh7jXpRo0etfOK4MINSlwFZ6iL9kPD1JWyuqGxr#-.:/';
		$arr_e = array();  $arr_e1 = array(); $arr_r = array(); $arr_r1 = array();
		for($j = 0; $j < strlen($str); $j++){
			$j_ = $j; if ($j_ < 10) { $j_ = '0'.$j_; }
			$arr_e1[$j] = substr($str,$j,1);
			$arr_e[$j_] = substr($str,$j,1);
			$arr_r1[substr($str,$j,1)] = $j;
			$arr_r[substr($str,$j,1)] = $j_;
		}
		
		$uniq = substr($kd_enc,0,1);
		$hash = hash('sha256', $kd_enc.date('his')); for($j = 0; $j < 1000; $j++){ $hash = hash('sha256', $hash); }
		$kd_dec = $hash;
		
		if(!isset($arr_r1[$uniq])){ return $hash; }#$kd_dec; }
		else { 
		$ur = $arr_r1[$uniq]; #return $arr_r1['!'];
		
		#if(fmod(strlen($kd_enc),2) == 0){ 
		$kd_dec = '';
		for($i = 1; $i < strlen($kd_enc); $i++){
			$angka = substr($kd_enc,$i,2);
			if (substr($angka,0,1) == '0') { $angka = substr($angka,1,1); }
			$angka_ = (int)$angka - $ur;
			if(isset($arr_e1[$angka_])){
				$kd_dec .= $arr_e1[$angka_];
				$i= $i+2;
			} else { return $hash; break; }
		}#}
		return $kd_dec;}
}

function tg_encode($kd_kelas){ $hasil = ''; #return $kd_kelas;
		$str 	= 'sng3bAdac5UEmQzv2YBTH8CVh7jXpRo0etfOK4MINSlwFZ6iL9kPD1JWyuqGxr#-.:/';
		$arr_e = array();  $arr_e1 = array(); $arr_r = array(); $arr_r1 = array();
		for($j = 0; $j < strlen($str); $j++){
			$j_ = $j; if ($j_ < 10) { $j_ = '0'.$j_; }
			$arr_e1[$j] = substr($str,$j,1);
			$arr_e[$j_] = substr($str,$j,1);
			$arr_r1[substr($str,$j,1)] = $j;
			$arr_r[substr($str,$j,1)] = $j_;
		}
		
		$total = 0;
		for($i = 0; $i < strlen($kd_kelas); $i++){
			$total = (int)substr($kd_kelas,$i,1) + $total; 
		} $u = fmod($total,10);
		
		$kd_enc = $arr_e1[$u];
		for($i = 0; $i < strlen($kd_kelas); $i++){
			$k = ($arr_r1[substr($kd_kelas,$i,1)]+$u); if($k < 10) { $k = '0'.$k; }
			$kd_enc .= ''.$k.rand(0,9); 
		} return $kd_enc;
}

function tg_decode($kd_enc){ $hasil = '';  #return $kd_enc;
		$str 	= 'sng3bAdac5UEmQzv2YBTH8CVh7jXpRo0etfOK4MINSlwFZ6iL9kPD1JWyuqGxr#-.:/';
		$arr_e = array();  $arr_e1 = array(); $arr_r = array(); $arr_r1 = array();
		for($j = 0; $j < strlen($str); $j++){
			$j_ = $j; if ($j_ < 10) { $j_ = '0'.$j_; }
			$arr_e1[$j] = substr($str,$j,1);
			$arr_e[$j_] = substr($str,$j,1);
			$arr_r1[substr($str,$j,1)] = $j;
			$arr_r[substr($str,$j,1)] = $j_;
		}
		
		$uniq = substr($kd_enc,0,1);
		$hash = hash('sha256', $kd_enc.date('his')); for($j = 0; $j < 1000; $j++){ $hash = hash('sha256', $hash); }
		$kd_dec = $hash;
		
		if(!isset($arr_r1[$uniq])){ return $hash; }#$kd_dec; }
		else { 
		$ur = $arr_r1[$uniq]; #return $arr_r1['!'];
		
		#if(fmod(strlen($kd_enc),2) == 0){ 
		$kd_dec = '';
		for($i = 1; $i < strlen($kd_enc); $i++){
			$angka = substr($kd_enc,$i,2);
			if (substr($angka,0,1) == '0') { $angka = substr($angka,1,1); }
			$angka_ = (int)$angka - $ur;
			if(isset($arr_e1[$angka_])){
				$kd_dec .= $arr_e1[$angka_];
				$i= $i+2;
			} else { return $hash; break; }
		}#}
		return $kd_dec;}
}
	
?>