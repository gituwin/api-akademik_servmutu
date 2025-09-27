<?php

?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="<?php echo base_url('js/js_core.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/js_fxgrid.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/js_init.js'); ?>"></script>
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
var index_page = '<?php echo index_page(); ?>';
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="robots" content="noindex,nofollow" />
<link rel="stylesheet" href="<?php echo base_url('style/css_default.css'); ?>" type="text/css" >
<link rel="stylesheet" href="<?php echo base_url('style/css_fxgrid.css'); ?>" type="text/css" >
<title>Sistem Informasi Akademik, UIN Sunan Kalijaga</title>
</head>
<body>
<div id="the-wrapper">
	<div id="the-navigation" class="bcg01">
	<?php $im_arrow = '<img src="'.base_url('img/arrow3.png').'" border="0" class="arrow">'; ?>
	<ul>
	<li><?php echo anchor('#','Sistem'); ?>
		<ul>
		<li><?php echo anchor('#','Login',array('url' => 's1_login')); ?></li>
		<li><?php echo anchor('#','Logout',array('url' => 's1_logout')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Keluar'); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Data Master'); ?>
		<ul>
		<li><?php echo anchor('#','Master Agama',array('url' => 's2_m_agama')); ?></li>
		<li><?php echo anchor('#','Master Pendidikan',array('url' => 's2_m_pendidikan')); ?></li>
		<li><?php echo anchor('#','Master Jenjang Pendidikan',array('url' => 's2_m_jpendidikan')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Propinsi',array('url' => 's2_m_propinsi')); ?></li>
		<li><?php echo anchor('#','Master Kabupaten',array('url' => 's2_m_kabupaten')); ?></li>
		<li><?php echo anchor('#','Master Kecamatan',array('url' => 's2_m_kecamatan')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Sekolah',array('url' => 's2_m_sekolah')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Badan Hukum',array('url' => 's2_m_badanhukum')); ?></li>
		<li><?php echo anchor('#','Master Perguruan Tinggi',array('url' => 's2_m_perguruantinggi')); ?></li>
		<li><?php echo anchor('#','Master Fakultas',array('url' => 's2_m_fakultas')); ?></li>
		<li><?php echo anchor('#','Master Jurusan',array('url' => 's2_m_jurusan')); ?></li>
		<li><?php echo anchor('#','Master Prodi',array('url' => 's2_m_prodi')); ?></li>
		<li><?php echo anchor('#','Master Akreditasi',array('url' => 's2_m_akreditasi')); ?></li>
		<li><?php echo anchor('#','Master Jalur Masuk',array('url' => 's2_m_jalurmasuk')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Kepegawaian',array('url' => 's2_m_pegawai')); ?></li>
		<li><?php echo anchor('#','Master Jenis Pegawai',array('url' => 's2_m_pegawaijenis')); ?></li>
		<li><?php echo anchor('#','Master Golongan Pegawai',array('url' => 's2_m_pegawaigolongan')); ?></li>
		<li><?php echo anchor('#','Master Aktif Pegawai',array('url' => 's2_m_pegawaiaktif')); ?></li>
		<li><?php echo anchor('#','Master Status Pegawai',array('url' => 's2_m_pegawaistatus')); ?></li>
		<li><?php echo anchor('#','Master Jabatan Pegawai',array('url' => 's2_m_pegawaijabatan')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Data Gedung',array('url' => 's2_m_gedung')); ?></li>
		<li><?php echo anchor('#','Master Data Guna Gedung',array('url' => 's2_m_gedungguna')); ?></li>
		<li><?php echo anchor('#','Master Distribusi Ruang Fakultas',array('url' => 's2_m_ruangfakultas')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Jenis Nilai',array('url' => 's2_m_jenisnilai')); ?></li>
		<li><?php echo anchor('#','Master Aturan Penilaian Prodi',array('url' => 's2_m_penilaianprodi')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Data Kurikulum'); ?>
		<ul>
		<li><?php echo anchor('#','Master Kelompok MK',array('url' => '3_m_kmk')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Kurikulum Prodi',array('url' => '3_m_kpro')); ?></li>
		<li><?php echo anchor('#','Master Matakuliah Kurikulum Prodi',array('url' => '3_m_mkpro')); ?></li>
		<li><?php echo anchor('#','Master Matakuliah Prasyarat',array('url' => '3_m_mkpr')); ?></li>
		<li><?php echo anchor('#','Master Matakuliah Kompetensi',array('url' => '3_m_mkkp')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Kurikulum Revisi',array('url' => '3_m_krv')); ?></li>
		<li><?php echo anchor('#','Master Matakuliah Setara',array('url' => '3_m_mks')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Dosen Pengampu Matakuliah',array('url' => '3_m_dmk')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Data Transfer'); ?>
		<ul>
		<li><?php echo anchor('#','Pendataan Master PT Transfer',array('url' => '4_m_pttr')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Master Data Aturan Transfer',array('url' => '4_m_ptat')); ?></li>
		<li><?php echo anchor('#','Master Data Matakuliah Transfer',array('url' => '4_m_ptmk')); ?></li>
		<li><hr></li>
		<li><?php echo anchor('#','Pendataan Nilai Transfer Mahasiswa',array('url' => '4_m_nltr')); ?></li>
		<li><?php echo anchor('#','Pengisian KRS Mahasiswa Transfer',array('url' => '4_m_krsmtr')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Kelulusan'); ?>
		<ul>
			<li><?php echo anchor('#','Pendataan Predikat Kelulusan',array('url' => '5_m_prkl')); ?></li>
			<li><?php echo anchor('#','Syarat Predikat Kelulusan',array('url' => '5_m_sykl')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Data Dosen'); ?>
		<ul>
			<li><?php echo anchor('#','Master Data Dosen',array('url' => '6_m_dos')); ?></li>
			<li><?php echo anchor('#','Pendataan Tempat Tugas Dosen',array('url' => '6_m_dostt')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Master Data Status Pembimbing',array('url' => '6_m_dosp')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pendataan Penelitian Dosen',array('url' => '6_m_dospl')); ?></li>
			<li><?php echo anchor('#','Pendataan Penugasan Belajar Dosen',array('url' => '6_m_dospb')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pendataan Wali Akademik',array('url' => '6_m_doswa')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Data Mahasiswa'); ?>
		<ul>
			<li><?php echo anchor('#','Master Data Mahasiswa',array('url' => '7_m_mhs')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pendataan Mahasiswa DO',array('url' => '7_m_mhsdo')); ?></li>
			<li><?php echo anchor('#','Pendataan Mahasiswa Lulus',array('url' => '7_m_mhsls')); ?></li>
			<li><?php echo anchor('#','Pendataan Mahasiswa Pindah',array('url' => '7_m_mhspd')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pendataan Mahasiswa Cuti',array('url' => '7_m_mhsct')); ?></li>
			<li><?php echo anchor('#','Pendataan Status Mahasiswa Cuti',array('url' => '7_m_mhscts')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Presensi Perkuliahan Mahasiswa',array('url' => '7_m_mhspk')); ?></li>
			<li><?php echo anchor('#','Presensi Ujian Mahasiswa',array('url' => '7_m_mhsu')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Data KHS'); ?>
		<ul>
			<li><?php echo anchor('#','Syarat Pengisian KRS (Batasan KRS)',array('url' => '8_m_krssy')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Penawaran Matakuliah',array('url' => '8_m_krsmk')); ?></li>
			<li><?php echo anchor('#','Pembuatan Jadwal Matakuliah',array('url' => '8_m_krsjmk')); ?></li>
			<li><?php echo anchor('#','Pembuatan Jadwal Ujian',array('url' => '8_m_krsuj')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pembuatan Split Jadwal Matakuliah',array('url' => '8_m_krssplit')); ?></li>
			<li><?php echo anchor('#','Penawaran Kelas Prodi',array('url' => '8_m_krspro')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Resetting Jumlah Kuota Kelas Matakuliah',array('url' => '8_m_krskuo')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Input KRS Mahasiswa',array('url' => '8_m_krsin')); ?></li>
			<li><?php echo anchor('#','Input Nilai KHS',array('url' => '8_m_krskhs')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pembuatan Paket KRS Semester 1',array('url' => '8_m_krss1')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Edit Data Transkrip Nilai Mahasiswa',array('url' => '8_m_krstrans')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pendataan Administrasi KRS Mahasiswa',array('url' => '8_m_krssy')); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Pembuatan Nomor Ujian KRS Mahasiswa',array('url' => '8_m_krssy')); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Laporan'); ?>
		<ul>
		<li><?php echo anchor('#','Laporan Data Dosen'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Biodata Dosen Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Biodata Dosen Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Daftar Dosen'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Matakuliah Diampu Dosen'); ?></li>
				<li><?php echo anchor('#','Laporan Matakuliah Diampu Dosen Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Dosen Wali Akademik Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Dosen Wali Akademik Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan IPS Mahasiswa Bimbingan Dosen'); ?></li>
				<li><?php echo anchor('#','Laporan IPK Mahasiswa Bimbingan Dosen'); ?></li>
			</ul>
		</li>
		<li><?php echo anchor('#','Laporan Data Mahasiswa'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Biodata Mahasiswa Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Biodata Mahasiswa per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Biodata Mahasiswa Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Data Seluruh Mahasiswa'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Aktif'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Aktif per Angkatan'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Cuti'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Lulus'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa DO'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Keluar/Pindah'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Cuti per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Lulus per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa DO per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Keluar/Pindah per Angkatan'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Rekapitulasi Mahasiswa Prodi per Jenis Kelamin'); ?></li>
				<li><?php echo anchor('#','Rekapitulasi Mahasiswa Aktif Prodi per Jenis Kelamin'); ?></li>
			</ul>
		</li>
		<li><?php echo anchor('#','Laporan Data Mahasiswa per Semester'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Aktif'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Aktif per Angkatan'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Cuti'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Lulus'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa DO'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Keluar/Pindah'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Cuti per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Lulus per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa DO per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Data Mahasiswa Keluar/Pindah per Angkatan'); ?></li>
			</ul>
		</li>
		<li><hr></li>
		<li><?php echo anchor('#','Laporan Data Kurikulum'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Kurikulum Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Matakuliah Kurikulum Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Matakuliah Kompetensi Prodi'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Matakuliah Prasyarat'); ?></li>
				<li><?php echo anchor('#','Laporan Matakuliah Setara (Daftar Konfersi)'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Distribusi Matakuliah Prodi'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Dosen Pengampu Matakuliah'); ?></li>
			</ul>
		</li>
		<li><hr></li>
		<li><?php echo anchor('#','Laporan Data Perkuliahan'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Penawaran Matakuliah Prodi'); ?></li>
				<li><?php echo anchor('#','Penawaran Kelas Prodi'); ?></li>
				<li><?php echo anchor('#','Jadwal Perkuliahan Prodi'); ?></li>
				<li><?php echo anchor('#','Jadwal Ujian Prodi'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Rekapitulasi Jadwal Kuliah Prodi'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Tugas Mengajar Dosen Prodi'); ?></li>
				<li><?php echo anchor('#','Tugas Mengajar Dosen Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Absensi Kelas Prodi (Before KPRS)'); ?></li>
				<li><?php echo anchor('#','Daftar Absensi Kelas Tertentu (Before KPRS)'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Absensi Kelas Prodi'); ?></li>
				<li><?php echo anchor('#','Daftar Absensi Kelas Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Absensi Ujian MID Kelas Prodi'); ?></li>
				<li><?php echo anchor('#','Daftar Absensi Ujian MID Kelas Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Absensi Ujian UAS Kelas Prodi'); ?></li>
				<li><?php echo anchor('#','Daftar Absensi Ujian UAS Kelas Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Nilai Matakuliah'.$im_arrow); ?>
					<ul>
						<li><?php echo anchor('#','Daftar Nilai Matakuliah Prodi'); ?></li>
						<li><?php echo anchor('#','Daftar Nilai Matakuliah Dosen'); ?></li>
						<li><?php echo anchor('#','Daftar Nilai Matakuliah Tertentu'); ?></li>
					</ul>
				</li>
				<li><?php echo anchor('#','Laporan Presensi Kelas'.$im_arrow); ?>
					<ul>
						<li><?php echo anchor('#','Daftar Presensi Kelas Prodi'); ?></li>
						<li><?php echo anchor('#','Daftar Presensi Kelas Tertentu'); ?></li>
					</ul>
				</li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Realisasi Perkuliahan Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Realisasi Perkuliahan Dosen Tertentu'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Presensi Kehadiran Kelas Dosen'.$im_arrow); ?>
					<ul>
						<li><?php echo anchor('#','Daftar Presensi Kehadiran Dosen per Prodi'); ?></li>
						<li><?php echo anchor('#','Daftar Presensi Kehadiran Dosen Kelas Tertentu'); ?></li>
					</ul>
				</li>
				<li><?php echo anchor('#','Laporan Jurnal Perkuliahan'.$im_arrow); ?>
					<ul>
						<li><?php echo anchor('#','Laporan Jurnal Perkuliahan Kelas Prodi'); ?></li>
						<li><?php echo anchor('#','Laporan Jurnal Perkuliahan Kelas Tertentu'); ?></li>
					</ul>
				</li>
				<li><hr></li>
				<li><?php echo anchor('#','Cek Kehadiran Mahasiswa'.$im_arrow); ?>
					<ul>
						<li><?php echo anchor('#','Cek Kehadiran Mhs di Bawah Limit (Seluruh Kelas)'); ?></li>
						<li><?php echo anchor('#','Cek Kehadiran Mhs di Atas Limit (Seluruh Kelas)'); ?></li>
						<li><?php echo anchor('#','Cek Kehadiran Mhs di Bawah Limit (Kelas Tertentu)'); ?></li>
						<li><?php echo anchor('#','Cek Kehadiran Mhs di Atas Limit (Kelas Tertentu)'); ?></li>
					</ul>
				</li>
				<li><?php echo anchor('#','Cek Ketidakhadiran Mahasiswa'.$im_arrow); ?>
					<ul>
						<li><?php echo anchor('#','Cek Ketidakhadiran Mhs di Bawah Limit (Seluruh Kelas)'); ?></li>
						<li><?php echo anchor('#','Cek Ketidakhadiran Mhs di Atas Limit (Seluruh Kelas)'); ?></li>
						<li><?php echo anchor('#','Cek Ketidakhadiran Mhs di Bawah Limit (Kelas Tertentu)'); ?></li>
						<li><?php echo anchor('#','Cek Ketidakhadiran Mhs di Atas Limit (Kelas Tertentu)'); ?></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><?php echo anchor('#','Laporan Data Ujian'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Presensi Ujian Kelas Prodi'); ?></li>
				<li><?php echo anchor('#','Laporan Presensi Ujian Kelas Tertentu'); ?></li>
			</ul>
		</li>
		<li><?php echo anchor('#','Laporan Data KHS'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Transkrip Hasil Studi (KHS) per Semester'); ?></li>
				<li><?php echo anchor('#','Transkrip Hasil Studi (KHS) per Angkatan'); ?></li>
				<li><?php echo anchor('#','Transkrip Hasil Studi (KHS) per Mahasiswa'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Transkrip Hasil Studi Kumulatif per Prodi'); ?></li>
				<li><?php echo anchor('#','Transkrip Hasil Studi Kumulatif per Angkatan'); ?></li>
				<li><?php echo anchor('#','Transkrip Hasil Studi Kumulatif per Mahasiswa'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Cetak Data Nilai Transfer per Prodi'); ?></li>
				<li><?php echo anchor('#','Cetak Data Nilai Transfer per Angkatan'); ?></li>
				<li><?php echo anchor('#','Cetak Data Nilai Transfer per Mahasiswa'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Rekapitulasi IP Kumulatif Mahasiswa'); ?></li>
				<li><?php echo anchor('#','Rekapitulasi IP Semester Mahasiswa'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Rekapitulasi Mahasiswa Terancam DO'); ?></li>
			</ul>
		</li>
		<li><?php echo anchor('#','Cetak Transkrip Akhir'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Cetak Transkrip Sementara'); ?></li>
				<li><?php echo anchor('#','Cetak Transkrip Akhir'); ?></li>
			</ul>
		</li>
		<li><hr></li>
		<li><?php echo anchor('#','Laporan Data KRS'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Jadwal KRS Prodi'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Cetak KRS Seluruh Mahasiswa Prodi'); ?></li>
				<li><?php echo anchor('#','Cetak KRS Mahasiswa per Angkatan'); ?></li>
				<li><?php echo anchor('#','Cetak KRS per Mahasiswa Prodi'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Laporan Mahasiswa Sudah KRS'); ?></li>
				<li><?php echo anchor('#','Laporan Mahasiswa Belum KRS'); ?></li>
				<li><?php echo anchor('#','Laporan Mahasiswa Sudah KRS per Angkatan'); ?></li>
				<li><?php echo anchor('#','Laporan Mahasiswa Belum KRS per Angkatan'); ?></li>
				<li><hr></li>
				<li><?php echo anchor('#','Daftar Pengambilan SKS Melebihi Jatah'); ?></li>
				<li><?php echo anchor('#','Daftar Pengambilan SKS Sama Dengan Jatah'); ?></li>
				<li><?php echo anchor('#','Daftar Pengambilan SKS Kurang Dari Jatah'); ?></li>
				<li><?php echo anchor('#','Daftar Pengambilan SKS KRS Mahasiswa'); ?></li>
			</ul>
		</li>
		<li><?php echo anchor('#','Laporan Administrasi KRS'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Daftar Pembayaran Mahasiswa'); ?></li>
				<li><?php echo anchor('#','Daftar Mahasiswa Belum Membayar'); ?></li>
			</ul>
		</li>
		<li><hr></li>
		<li><?php echo anchor('#','Laporan Data Alumni'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Data Seluruh Alumni'); ?></li>
				<li><?php echo anchor('#','Laporan Data Alumni per Senester'); ?></li>
			</ul>
		</li>
		<li><?php echo anchor('#','Data Master'.$im_arrow); ?>
			<ul>
				<li><?php echo anchor('#','Laporan Daftar Fakultas'); ?></li>
				<li><?php echo anchor('#','Laporan Daftar Jurusan'); ?></li>
				<li><?php echo anchor('#','Laporan Daftar Program Studi'); ?></li>
			</ul>
		</li>
		</ul>
	</li>
	<li><?php echo anchor('#','Utilities'); ?>
		<ul>
			<li><?php echo anchor('#','Setting TA Aktif'); ?></li>
			<li><?php echo anchor('#','Setting Aktivasi KRS Prodi'); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Konversi Data Kurikulum'.$im_arrow); ?>
				<ul>
					<li><?php echo anchor('#','Konversi Data Kurikulum Seluruh Mahasiswa'); ?></li>
					<li><?php echo anchor('#','Konversi Data Kurikulum Mahasiswa Tertentu'); ?></li>
				</ul>
			</li>
			<li><hr></li>
			<li><?php echo anchor('#','Menu Pengumuman'.$im_arrow); ?>
				<ul>
					<li><?php echo anchor('#','Pendataan Kategori Informasi'); ?></li>
					<li><?php echo anchor('#','Pendataan Publikasi Informasi'); ?></li>
				</ul>
			</li>
			<li><?php echo anchor('#','Setting Header (Kop) Laporan'); ?></li>
			<li><?php echo anchor('#','Setting Pejabat Fakultas'); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Hapus Data Presensi'.$im_arrow); ?>
				<ul>
					<li><?php echo anchor('#','Hapus Presensi Perkuliahan'); ?></li>
					<li><?php echo anchor('#','Hapus Presensi Ujian'); ?></li>
				</ul>
			</li>
			</li>
			<li><hr></li>
			<li><?php echo anchor('#','Ubah Tema Aplikasi'); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Menu User'); ?>
		<ul>
			<li><?php echo anchor('#','Admin User'); ?></li>
			<li><?php echo anchor('#','Ganti Password'); ?></li>
			<li><hr></li>
			<li><?php echo anchor('#','Sistem Portal'.$im_arrow); ?>
				<ul>
					<li><?php echo anchor('#','Admin User'); ?></li>
					<li><?php echo anchor('#','Reset Password'); ?></li>
				</ul>
			</li>
			<li><hr></li>
			<li><?php echo anchor('#','Buat User Mahasiswa Baru'); ?></li>
			<li><?php echo anchor('#','Laporan Daftar User'); ?></li>
		</ul>
	</li>
	<li><?php echo anchor('#','Help'); ?>
		<ul>
			<li><?php echo anchor('#','About'); ?></li>
		</ul>
	</li>
	</ul>
	</div>
	<div id="the-container"></div>
</div>
</body>
</html>