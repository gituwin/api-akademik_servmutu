<!-- © 2013 oleh Wihikan Mawi Wijna untuk UIN Sunan Kalijaga, Yogyakarta -->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="robots" content="noindex,nofollow" />
<meta HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
<meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<script type="text/javascript" src="<?php echo base_url('js/js_core.js'); ?>"></script>
<title>Sistem Informasi Akademik : WIZARD ,UIN Sunan Kalijaga</title>
	<style type="text/css">
		* { margin: 0; padding: 0; }
		body 	{ font-size: 0.825em; font-family: "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif; font-weight: normal; 
		text-decoration:none; line-height: 1.25em; color:#000; 
		background: #f2f2f2;
		}
		html, body	{ height: 100%; }

		/* BLOCK LEVEL */
		/*h1 { margin: 0 0 20px; color: #333; font: normal 3.2em/1.44 Georgia, "Times New Roman", serif; }*/
		h1 { margin: 0 0 20px; color: #333; font: normal 2.154em/1.24; font-weight: bold; text-align: center; padding-bottom: 20px; }
		h2 { margin: 0 0 20px; color: #363636; font: bold 1.2em/1.36; line-height:120%; }
		h3 { margin: 0 0 20px; font: 1.8em/1.36; color: #C00; }
		h4 { color: #363636; font: bold 1.0em/1.8; margin-bottom: 11px; text-transform: uppercase; }
		h5 { color: #A61D31; font: bold 1.0em/1.8; margin-bottom: 11px; text-transform: uppercase; }
		h6 { color: #8c8179; font: bold 1.0em/1.8; margin-bottom: 11px; text-transform: uppercase; }
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {text-decoration: none; color:inherit;}
		h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {text-decoration: underline;}

		a { color: #336799; text-decoration: none; } a:hover, a:focus { text-decoration: underline; }
		.clear { clear: both; }
		.clearfix:before, .clearfix:after { content: " "; display: table; }
		.clearfix:after { clear: both; }
		
		/* COLOR */

		.bcs01	{ background: #000; }
		.bcs02	{ background: #FFF; }
		.bcg01	{
		background-image: linear-gradient(bottom, rgb(204,204,204) 16%, rgb(229,229,229) 79%);
		background-image: -o-linear-gradient(bottom, rgb(204,204,204) 16%, rgb(229,229,229) 79%);
		background-image: -moz-linear-gradient(bottom, rgb(204,204,204) 16%, rgb(229,229,229) 79%);
		background-image: -webkit-linear-gradient(bottom, rgb(204,204,204) 16%, rgb(229,229,229) 79%);
		background-image: -ms-linear-gradient(bottom, rgb(204,204,204) 16%, rgb(229,229,229) 79%);

		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.16, rgb(204,204,204)),
			color-stop(0.79, rgb(229,229,229))
		);
		}

		.color01 { color: #000; } .color02 { color: #C00; }

		/*
		#the-navigation	{ margin: 0 auto; }
		#the-navigation ul { list-style: none; padding: 10px; box-shadow: 0px 0px 5px #000; }
		#the-navigation ul ul { display: none; }
		#the-navigation ul li:hover > ul { display: block; }

		#the-navigation ul li { float: left; padding: 0 15px 0 15px; font-size: 100%; border-right: 1px solid #CCC; }
		#the-navigation ul li:hover {}
		#the-navigation ul li:hover a {}
		#the-navigation ul li a {}

		#the-navigation ul ul li { float: none; position: relative; }
		*/

		input, select { padding: 5px; border: 1px solid #CCC; border-bottom: 1px solid #b0b0b0; border-right: 1px solid #b0b0b0; border-radius: .3em; }
		input[type=submit],button[type=submit] {
		border-radius: .5em; padding: 6px 10px; border: 1px solid #375276;
		background: #50698e;
		color: #FFF;
		text-decoration: none;
		cursor: pointer;
		text-align: center;
		line-height: 1;
		margin-top: 10px; box-shadow: 0px 1px 3px #999; 
		font-family: "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif;
		}
		button[type=submit] { margin-right: 10px; }
		input[type=submit]:hover,button[type=submit]:hover{ background: #1e3b5d; }
		label	{ font-size: 95%; }
		button[disabled=disabled] { background: #CCC; }
		button[disabled=disabled]:hover{ box-shadow: 0px 0px 0px #999; cursor: default; }
		input[disabled=disabled], select[disabled=disabled] { background: #F0E68C; }
		input[type="text"]:disabled { background:#F0E68C; color: #000; }
		textarea { padding: 5px; border: 1px solid #CCC; border-bottom: 1px solid #b0b0b0; border-right: 1px solid #b0b0b0;  
		font-family: "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif; font-size: 0.9em;
		}
		input[type="text"]:focus, textarea:focus, select:focus { background: #D9EBF5; }
		hr.hr-form { margin: 5px 0 5px 0; border: 0px solid #F2F2F2; border-top: 1px solid #CCC;}

		.panel-information { margin-top: 20px; background-color: #F0E68C; text-align: left; padding: 10px 10px 10px 10px; border-radius: .3em; border: 1px solid #b0b0b0; }

		ul.normal {  }
		ul.normal li { margin-bottom: 10px; margin-left: 20px; padding: 0px 5px 0px 5px; }
		ul.normal li:last-child { margin-bottom: 0px; }
		
		.frame-center	{ margin: 0 auto; margin-top: 100px; padding: 30px; background: #FFF; border-radius: .5em; border: 1px solid #d1d1d1; box-shadow: 0px 1px 2px #CCC; }
		
		.hasilx { font-size: 0.8em; margin-top:20px; padding: 10px; background: #F2f2f2; border: 1px solid #CCC; }
		button[type=submit].brxc { background: #cc698e; }
	</style>
</head>
<body>
	<div id="page-1">
	<div class="frame-center clearfix" style="width:600px;">
		<div id="p01">
		<h1>1. Selamat datang di SIA API WIZARD</h1>
		<p>Halaman ini akan membantu kamu untuk menyusun sintaks API (web service) yang bisa kamu gunakan untuk mengolah data-data yang ada di database SIA UIN Sunan Kalijaga.</p>
		<button name="x1" type="submit">ke Halaman 2</button>
		</div>
		
		<div id="p02">
		<h1>2. Pilih Modul Utama API</h1>
		<p>API terdiri dari berbagai modul sesuai dengan fungsi dan kegunaannya.</p>
		<br><br>
		<p>Modul: 
			<select name="sel1">
			<option value="sia_absensi">1. SIA Absensi</option>
			<option value="sia_bangunan">2. SIA Bangunan</option>
			<option value="sia_dosen">3. SIA Dosen</option>
			<option value="sia_krs">4. SIA KRS</option>
			<option value="sia_kurikulum">5. SIA Kurikulum</option>
			<option value="sia_laporan">6. SIA Laporan</option>
			<option value="sia_mahasiswa">7. SIA Mahasiswa</option>
			<option value="sia_master" SELECTED>8. SIA Master</option>
			<option value="sia_penawaran">9. SIA Jadwal</option>
			
			</select>
		</p>
		<br><br>
		<button name="x2" type="submit">ke Halaman 3</button>
		<button name="xr" type="submit" class="brxc">balik ke awal</button>
		</div>
		
		<div id="p03">
		<h1>3. Pilih Proses API</h1>
		<p>Pilih proses yang terjadi untuk mengolah data dalam API.</p>
		<br><br>
		<p style="float:left; width: 300px;">Proses : 
			<select name="sel2">
			<option value="data_view">1. Tampilkan Data</option>
			<option value="data_search">2. Cari Data</option>
			<option value="data_procedure">3. Eksekusi Procedure</option>
			</select>
		</p>
		<div style="float:left; width: 300px;">
				<span id="kt0">Data yang diolah dari sintaks SQL:<BR><BR><EM>SELECT ... FROM ... </EM></span>
				<span id="kt1">Data yang diolah dari sintaks SQL:<BR><BR><EM>SELECT ... FROM ... WHERE ...</EM></span>
				<span id="kt2">Data yang diolah dari sintaks SQL:<BR><BR><EM>PROCEDURE(value1, value2, ...)</EM></span>
		</div>
		<div class="clear"></div>	
		<br><br>
		<button name="x3" type="submit">ke Halaman 4</button>
		<button name="xr" type="submit" class="brxc">balik ke awal</button>
		</div>
		
		<div id="p04">
		<h1>4. API Kode dan Subkode</h1>
		<p>Tentukan API Kode dan API Subkode yang berkaitan dengan proses olah data.<br>Untuk informasi lebih lanjut, silakan merujuk ke panduan penggunaan API SIA.</p>
		<br><br>
		<table border="0" style="width: 400px">
			<tbody>
			<tr><td style="width: 100px">API Kode</td><td>: <input name="ikd1" style="width:100px;" value="1000"></td></tr>
			<tr><td style="width: 100px">API Subkode</td><td>: <input name="ikd2" style="width:100px;" value="1"></td></tr>
			
			</tbody>
		</table>
		<br><br>
		<button name="x4" type="submit">ke Halaman 5</button>
		<button name="xr" type="submit" class="brxc">balik ke awal</button>
		</div>
		
		<div id="p05">
		<h1>5. Input untuk API</h1>
		<p>Untuk proses <em>Cari Data</em> dan <em>Eksekusi Prosedur</em>, API membutuhkan variabel input.<br>Untuk informasi lebih lanjut, silakan merujuk ke panduan penggunaan API SIA.</p>
		<br><br>
		<table border="0" style="width: 400px" name="tbdata">
			<tbody>
			<tr><td style="width: 100px">Input 1</td><td>: <input name="ikv1" style="width:200px;"></td></tr>
			
			</tbody>
		</table>
		<button name="ikvb" type="submit">Tambah Input</button> <button name="ikvbr" type="submit">Reset Input</button>
		
		<br><br>
		<button name="x5" type="submit">EKSEKUSI!</button>
		<button name="xr" type="submit" class="brxc">balik ke awal</button>
		</div>
		
		<div id="p06">
		<h1>Hasil Eksekusi</h1>
		<p>Berikut adalah hasil eksekusi API.</p>
		<div id="apihasil" class="hasilx"></div>
			
		<br><br>
		<p>Berikut adalah URL API:</p>
		<div id="apihasilurl" class="hasilx"></div>
		
		<br><br>
		<p>Variabel berikut disertakan sebagai $_POST pada saat pemanggilan URL API:</p>
		<div id="apihasilkode" class="hasilx"></div>
		
		
		<br><br>
		<button name="xr" type="submit" class="brxc">balik ke awal</button>
		</div>
		
		<div id="infor" style="padding:10px; width:550px; background: #FFC; margin-top: 20px; border: 1px solid #C00;">rincian langkah:</div>
		
	</div>
	</div>
	
	<script>
$(document).ready(function() { //console.log(sesuatu);
	//alert('halow');
	var $ib = 1;
	var $url = 'http://service.uin-suka.ac.id/servsiasuper/index.php/sia_public/';
	
	function hilangp(){
		$('div[id^=p0]').hide(); $('#apihasil').html(''); $('#apihasilurl').html(''); $('#apihasilkode').html('');
	} hilangp(); $('div[id=p01]').show();
	
	function reset_inf(){
		$('#infor').empty().html('rincian langkah:');
	} reset_inf(); $('#infor').hide();
	
	function inf_add($data){
		$('#infor').append($data);
	} 
	
	function send_ajax(){
		var $m01 = $('select[name=sel1] option:selected').val();
		var $m02 = $('select[name=sel2] option:selected').val();
		
		var $a1 = $('input[name=ikd1]').val();
		var $a2 = $('input[name=ikd2]').val();
		
		var $arrr = new Array();
		for(i = 1; i < ($ib+1); i++){ 
			$arrr.push($.trim($('input[name="ikv'+i+'"]').val()));
		}; 
		
		if ($m01 == 'sia_laporan'){
			if ($m02 == 'data_view') { $m02 = 'laporan_data'; }
			if ($m02 == 'data_search') { $m02 = 'laporan_header'; }
		
		}
		
		
		$url_ = 'http://service.uin-suka.ac.id/servsiasuper/index.php/sia_public/'+$m01+'/'+$m02+'/json';
		$url = 'http://service.uin-suka.ac.id/servsiasuper/index.php/sia_public/'+$m01+'/'+$m02;
		
		$ajax01 = $.ajax({type: "POST", cache: false, dataType: "html", url: $url_, 
					data: { api_kode: $a1, api_subkode: $a2, api_datapost: $arrr, api_search: $arrr, 
					}})
		$ajax01.done(function(data){ console.log(data);
					$('#apihasil').html(data);
					$('#apihasilurl').html($url_);
					
					$kode = '$_POST[\'api_kode\'] = '+$a1+' (<em>string</em>)<br><br>';
					$kode += '$_POST[\'api_subkode\'] = '+$a2+' (<em>string</em>)<br><br>';
					
					if (($m02 == 'data_search') || ($m02 == 'data_procedure')){ 
					if (($m02 == 'data_search')){ $pref = 'api_search'; } else { $pref = 'api_datapost'; } 
					$hasil = ''; for(i = 1; i < ($ib+1); i++){ if(i > 1){ $hasil += ', ';}; $hasil += $('input[name="ikv'+i+'"]').val(); }
					$hasil = '{'+$hasil+'} (<em>array</em>)';
					$kode += '$_POST[\''+$pref+'\'] = '+$hasil+' <br><br>';
					}
					
					$('#apihasilkode').html($kode);
					//$('table#fxcontent_2600091 tbody').empty().append(data);
				});
		
		//console.log($url_);
	}
	
	$('button[name=x1]').click(function(){  
	hilangp(); $('div[id=p02]').show(); });
	$('button[name=x2]').click(function(){ $('#infor').show();
											inf_add('<br><br>Modul: <strong>'+$('select[name=sel1] option:selected').text()+'</strong>');	
	hilangp(); $('div[id=p03]').show(); });
	$('button[name=x3]').click(function(){ inf_add('<br><br>Proses: <strong>'+$('select[name=sel2] option:selected').text()+'</strong>');	
	hilangp(); $('div[id=p04]').show(); });
	$('button[name=x4]').click(function(){ inf_add('<br><br>API Kode: <strong>'+$('input[name=ikd1]').val()+'</strong>');
											inf_add('<br>API Subkode: <strong>'+$('input[name=ikd2]').val()+'</strong>');
	hilangp(); $('div[id=p05]').show(); });
	$('button[name=x5]').click(function(){ $hasil = ''; for(i = 1; i < ($ib+1); i++){ if(i > 1){ $hasil += ', ';}; $hasil += $('input[name="ikv'+i+'"]').val();  } 
											inf_add('<br><br>Input: <strong>'+$hasil+'</strong>');
											send_ajax();
	hilangp(); $('div[id=p06]').show(); });
	$('button[name=xr]').click(function(){ $('#infor').hide(); reset_inf();
	hilangp(); $('div[id=p01]').show(); });
	
	function hilangkt(){
		$('span[id^=kt]').hide();
	} hilangkt();
	$('span[id=kt0]').show();
	
	$('#page-1').on('change','select',function(e){ 
		hilangkt();
		aaa = $('select[name=sel2] option:selected').index();
		$('span[id=kt'+aaa+']').show();
	});
	
	$('#page-1').on('click','button[name=ikvb]',function(e){ 
		e.preventDefault();
		$ib++;
		$('table[name=tbdata] tbody').append('<tr><td style="width: 100px">Input '+$ib+'</td><td>: <input name="ikv'+$ib+'" style="width:200px;"></td></tr>');
		return false;
	});
	
	$('#page-1').on('click','button[name=ikvbr]',function(e){ 
		e.preventDefault();
		$ib++;
		$('table[name=tbdata] tbody').empty(); $ib = 0;
		$('button[name=ikvb]').click();
		return false;
	});
	
});
	</script>
</body>
</html>
