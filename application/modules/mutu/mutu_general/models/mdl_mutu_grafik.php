<?php

if(!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mdl_mutu_grafik extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->mutu = $this->load->database('mutu');
    }

    public function get_grafik_audit($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik satu isian
        $sql = "SELECT
				id_borang,
				institusi,
				kd_fak,
				kd_prodi,
				id_klasifikasi,
				harkat,
				COUNT(id_isi_borang) AS jumlah
				FROM grafik_audit_v
				WHERE id_borang = ".$key['id_borang']." AND id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
				GROUP BY id_borang, institusi, kd_fak, kd_prodi, id_klasifikasi, harkat
				ORDER BY id_borang, institusi, kd_fak, kd_prodi, id_klasifikasi;";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function temuan_iku_atl($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        // $sql = "SELECT
        // 	prd.nm_prodi,
        // 	a.institusi,
        // 	a.kd_fak,
        // 	a.kd_prodi,
        // 	a.id_klasifikasi,
        // 	a.id_periode_pengisian,
        // 	a.harkat,

        // 	count(DISTINCT( id_isi_borang)) AS jumlah
        // 	FROM grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
        // 	LEFT JOIN tmp_akd_master_prodi prd ON a.kd_prodi::text = prd.kd_prodi::text

        // 	WHERE a.id_borang = ".$key['id_borang']." AND

        // 	b.ikuikt='iku'and
        // 	a.kd_prodi= '".$key['kd_prodi']."' and
        // 	a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
        // 	GROUP BY a.id_borang, a.institusi, a.kd_fak, prd.nm_prodi, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt,a.id_periode_pengisian
        // 	ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";

        $sql = "SELECT		
                    prd.nm_prodi,
                    a.fp,
                    a.kd_klasifikasi,
                    a.periode,
                    b.harkat,


                    count(DISTINCT( id_isi_borang)) AS jumlah
                    FROM audit_tindak_lanjut_jwbn AS a LEFT join matrix_v AS b ON a.kd_klasifikasi  = b.id_harkat
                    LEFT JOIN tmp_akd_master_prodi prd ON a.fp ::text = prd.kd_prodi::text
                    where a.id_borang  = ".$key['id_borang']." and b.ikuikt='iku'and
                    a.fp = '".$key['kd_prodi']."' and periode=".$key['id_periode']."
                    GROUP BY  prd.nm_prodi, a.id_borang, a.fp, a.kd_klasifikasi,a.periode ,b.harkat
                    ORDER BY a.id_borang, a.fp, a.kd_klasifikasi;
                    ";
        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function temuan_iku_ami($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			prd.nm_prodi,
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi,
			a.id_periode_pengisian,
			a.harkat,
			
			count(DISTINCT( id_isi_borang)) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			LEFT JOIN tmp_akd_master_prodi prd ON a.kd_prodi::text = prd.kd_prodi::text

			WHERE a.id_borang = ".$key['id_borang']." AND
	
			b.ikuikt='iku'and
			a.kd_prodi= '".$key['kd_prodi']."' and
			a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, prd.nm_prodi, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt,a.id_periode_pengisian
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function temuan_ikt_atl($key = array())
    {

        // $sql = "SELECT
        // prd.nm_prodi,
        // a.institusi,
        // a.kd_fak,
        // a.kd_prodi,
        // a.id_klasifikasi,
        // a.id_periode_pengisian,
        // a.harkat,

        // count(DISTINCT( id_isi_borang)) AS jumlah
        // FROM grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
        // LEFT JOIN tmp_akd_master_prodi prd ON a.kd_prodi::text = prd.kd_prodi::text

        // WHERE a.id_borang = ".$key['id_borang']." AND

        // b.ikuikt='ikt'and
        // a.kd_prodi= '".$key['kd_prodi']."' and
        // a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
        // GROUP BY a.id_borang, a.institusi, a.kd_fak, prd.nm_prodi, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt,a.id_periode_pengisian
        // ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";

        $sql = "SELECT		
        prd.nm_prodi,
        a.fp,
        a.kd_klasifikasi,
        a.periode,
        b.harkat,


        count(DISTINCT( id_isi_borang)) AS jumlah
        FROM audit_tindak_lanjut_jwbn AS a LEFT join matrix_v AS b ON a.kd_klasifikasi  = b.id_harkat
        LEFT JOIN tmp_akd_master_prodi prd ON a.fp ::text = prd.kd_prodi::text
        where a.id_borang  = ".$key['id_borang']." and b.ikuikt='ikt'and
        a.fp = '".$key['kd_prodi']."' and periode=".$key['id_periode']."
        GROUP BY  prd.nm_prodi, a.id_borang, a.fp, a.kd_klasifikasi,a.periode ,b.harkat
        ORDER BY a.id_borang, a.fp, a.kd_klasifikasi;
        ";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function temuan_ikt_ami($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			prd.nm_prodi,
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi,
			a.id_periode_pengisian,
			a.harkat,
			
			count(DISTINCT( id_isi_borang)) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			LEFT JOIN tmp_akd_master_prodi prd ON a.kd_prodi::text = prd.kd_prodi::text

			WHERE a.id_borang = ".$key['id_borang']." AND
	
			b.ikuikt='ikt'and
			a.kd_prodi= '".$key['kd_prodi']."' and
			a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, prd.nm_prodi, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt,a.id_periode_pengisian
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_audit_unit_nt_ssw($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi,
			
			a.harkat,
			
			count(DISTINCT( id_isi_borang)) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']." AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='iku'and
		
			a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_audit_unit_nt_ssw_ikt($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi_ikt,
			
			a.harkat_ikt,
			
			count(DISTINCT( id_isi_borang)) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']."  AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='ikt'and
			
			a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt, a.harkat_ikt,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_audit_unit_nt_ssw_iktt($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi_ikt,
			
			a.harkat_ikt,
			
			COUNT(id_isi_borang) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']."  AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='ikt'and
			a.harkat_ikt !='Sesuai' AND
			a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt, a.harkat_ikt,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_audit_unit_nt_ssww($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi,
			
			a.harkat,
			
			COUNT(id_isi_borang) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']." AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='iku'and
			a.harkat_ikt !='Sesuai' AND
			a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuik;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }




    public function get_grafik_audit_unit($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi,
			
			a.harkat,
			
			COUNT(id_isi_borang) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']." AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='iku'and
			
			a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_audit_unit_ikt($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi_ikt,
			
			a.harkat_ikt,
			
			COUNT(id_isi_borang) AS jumlah
			FROM grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']."  AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='ikt'and
			
			a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt, a.harkat_ikt,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt,b.ikuikt";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_unit_audit($key = array())
    {
        //mengambil data unit yang sudah pernah ngisi isian
        $sql = "SELECT
		id_borang,
		institusi,
		kd_fak,
		kd_prodi
		FROM grafik_audit_v
		WHERE id_borang = ".$key['id_borang']." AND id_periode_pengisian=".$key['id_periode_pengisian']." AND 
		id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
		GROUP BY id_borang, institusi, kd_fak, kd_prodi
		ORDER BY id_borang, institusi, kd_fak, kd_prodi;";
        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_unit_atl($key = array())
    {
        //mengambil data unit yang sudah pernah ngisi isian
        // TODO: pertama view dirubah ke atl
        // Gabungkan tabel standar, jawaban audit, dan jawaban atl
        // Selain peringkat yang sesuai direturn
        // Selanjutnya cek apakah jawabannya sudah ada untuk pertanyaan tersebut
        $sql = "SELECT
		id_borang,
		institusi,
		kd_fak,
		kd_prodi
		FROM grafik_atl_v
		WHERE id_borang = ".$key['id_borang']." AND id_periode_pengisian=".$key['id_periode_pengisian']." AND 
		id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang_ami'].")
    AND id_borang_ami = ".$key['id_borang_ami']." AND id_periode_ami = ".$key['id_periode_ami']."
		GROUP BY id_borang, institusi, kd_fak, kd_prodi
		ORDER BY id_borang, institusi, kd_fak, kd_prodi;";
        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function dt_grfk($key = array())
    {
        // 	$sql="

        // 	SELECT nm_item, keterangan, id_borang,id_ksk,id_item_borang
        // FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item IN(SELECT id_item
        // FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."' AND harkat!= 'Sesuai');

        // 	";

        // SELECT id_item, id_item_borang,id_harkat,peringkat,harkat,id_klasifikasi,id_klasifikasi_ikt FROM public.grafik_audit_v
        // WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."'  AND peringkat != 4 AND harkat NOTNULL

        $sql = "
	SELECT DISTINCT (id_item)
	, id_item_borang,a.id_harkat,a.peringkat,a.harkat,a.id_klasifikasi,a.id_klasifikasi_ikt, b.ikuikt FROM 
	grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
	WHERE a.id_periode_pengisian=".$key['id_periode_pengisian']."  AND a.id_borang=".$key['id_borang']." AND a.kd_prodi='".$key['kd_prodi']."'
	  and b.ikuikt='iku' and
	  a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")
	
	" ;

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function dt_grfk_ikt($key = array())
    {
        // 	$sql="

        // 	SELECT nm_item, keterangan, id_borang,id_ksk,id_item_borang
        // FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item IN(SELECT id_item
        // FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."' AND harkat!= 'Sesuai');

        // 	";

        // $sql="SELECT id_item, id_item_borang,id_harkat,peringkat,harkat,id_klasifikasi,id_klasifikasi_ikt FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."'
        //  AND peringkat != 4 AND harkat_ikt NOTNULL";
        $sql = " SELECT DISTINCT (id_item), id_item_borang,a.id_harkat,a.peringkat,a.harkat_ikt, a.harkat ,a.id_klasifikasi,a.id_klasifikasi_ikt, b.ikuikt FROM 
	grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi_ikt = b.id_harkat
		WHERE a.id_periode_pengisian=".$key['id_periode_pengisian']."  AND a.id_borang=".$key['id_borang']." AND a.kd_prodi='".$key['kd_prodi']."'
		  and b.ikuikt='ikt'  and
		  a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang'].")";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function dt_grfka($key = array())
    {
        // 	$sql="

        // 	SELECT nm_item, keterangan, id_borang,id_ksk,id_item_borang
        // FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item IN(SELECT id_item
        // FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."' AND harkat!= 'Sesuai');

        // 	";

        // SELECT id_item, id_item_borang,id_harkat,peringkat,harkat,id_klasifikasi,id_klasifikasi_ikt FROM public.grafik_audit_v
        // WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."'  AND peringkat != 4 AND harkat NOTNULL

        $sql = "
	SELECT id_item, id_item_borang,a.id_harkat,a.peringkat,a.harkat,a.id_klasifikasi,a.id_klasifikasi_ikt, b.ikuikt FROM 
	grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
	WHERE a.id_periode_pengisian=".$key['id_periode_pengisian']."  AND a.id_borang=".$key['id_borang']." AND a.kd_prodi='".$key['kd_prodi']."'
	AND a.harkat !='Sesuai'  and b.ikuikt='iku'
	
	" ;

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function dt_grfk_iktt($key = array())
    {
        // 	$sql="

        // 	SELECT nm_item, keterangan, id_borang,id_ksk,id_item_borang
        // FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item IN(SELECT id_item
        // FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."' AND harkat!= 'Sesuai');

        // 	";

        // $sql="SELECT id_item, id_item_borang,id_harkat,peringkat,harkat,id_klasifikasi,id_klasifikasi_ikt FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."'
        //  AND peringkat != 4 AND harkat_ikt NOTNULL";
        $sql = "SELECT id_item, id_item_borang,a.id_harkat,a.peringkat,a.harkat_ikt, a.harkat ,a.id_klasifikasi,a.id_klasifikasi_ikt, b.ikuikt FROM 
	grafik_audit_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
		WHERE a.id_periode_pengisian=".$key['id_periode_pengisian']."  AND a.id_borang=".$key['id_borang']." AND a.kd_prodi='".$key['kd_prodi']."'
		AND a.harkat_ikt !='Sesuai'  and b.ikuikt='ikt'";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function get_item_audit($key = array())
    {
        //mengambil data unit yang sudah pernah ngisi isian
        $sql = "SELECT
				*
				FROM item_borang
				WHERE id_borang = ".$key['id_borang']."
				ORDER BY id_ksk, no_butir";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function dt_item($key = array())
    {
        $sql = "SELECT *
		FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item=".$key['id_item']." ";
        $q = $this->mutu->query($sql)->result_array();
        return $q;

    }

    public function matrix($key = array())
    {
        $sql = "
	
	SELECT id_matrik, id_borang, id_butir, id_harkat, isi_harkat, harkat, peringkat
	FROM public.matrix_v WHERE id_borang=".$key['id_borang']." AND id_butir =".$key['id_butir']." AND id_harkat = ".$key['id_harkat'].";
	";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    // Add febri 3/11/2021 untuk cek ikuiktnya

    public function matrix_ikuikt($key = array())
    {
        $sql = "
	
	SELECT id_matrik, id_borang, id_butir, id_harkat, isi_harkat, harkat, peringkat
	FROM public.matrix_v WHERE id_borang=".$key['id_borang']." AND id_butir =".$key['id_butir']." AND id_harkat = ".$key['id_harkat']." AND ikuikt= '".$key['ikuikt']."';
	";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_atl_unit_nt_ssw($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        // TODO: apa perlu pakai kd_pgw sebagai cek jawaban karena format datanya dirubah sama lucky?
        $sql = "SELECT
      a.institusi,
      a.kd_fak,
      a.kd_prodi,
      a.id_klasifikasi,
      a.harkat,
      a.kd_aud,
      count(DISTINCT( id_isi_borang)) AS jumlah
      FROM grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
      WHERE a.id_borang = ".$key['id_borang']." AND
      kd_aud=1 AND
      audit_klasifikasi IS NOT NULL AND
      a.kd_prodi = '".$key['kd_prodi']."' AND
      a.id_periode_pengisian = ".$key['id_periode']." AND 
      b.ikuikt='ikt' and
      ((a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = '".$key['id_borang_ami']."')) OR (a.id_klasifikasi IS NULL) )
      GROUP BY a.id_borang_ami, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi, a.harkat,a.kd_aud,b.ikuikt
      ORDER BY a.id_borang_ami, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,a.kd_aud,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_atl_unit_nt_ssw_ikt($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        // TODO: apa perlu pakai kd_pgw sebagai cek jawaban karena format datanya dirubah sama lucky?
        $sql = "SELECT
      a.institusi,
      a.kd_fak,
      a.kd_prodi,
      a.id_klasifikasi_ikt,
      a.harkat_ikt,
      a.kd_aud,
      count(DISTINCT( id_isi_borang)) AS jumlah
      FROM grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi_ikt = b.id_harkat
      WHERE a.id_borang = ".$key['id_borang']." AND
      kd_aud=1 AND
      audit_klasifikasi_ikt IS NOT NULL AND
      a.kd_prodi = '".$key['kd_prodi']."' AND
      a.id_periode_pengisian = ".$key['id_periode']." AND 
      b.ikuikt='ikt' and
      (a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = '".$key['id_borang_ami']."') OR a.id_klasifikasi_ikt IS NULL)
      GROUP BY a.id_borang_ami, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt, a.harkat_ikt,a.kd_aud,b.ikuikt
      ORDER BY a.id_borang_ami, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt,a.kd_aud,b.ikuikt;";


        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function atl_grfk_iku($key = array())
    {
        // 	$sql="

        // 	SELECT nm_item, keterangan, id_borang,id_ksk,id_item_borang
        // FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item IN(SELECT id_item
        // FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."' AND harkat!= 'Sesuai');

        // 	";

        // SELECT id_item, id_item_borang,id_harkat,peringkat,harkat,id_klasifikasi,id_klasifikasi_ikt FROM public.grafik_audit_v
        // WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."'  AND peringkat != 4 AND harkat NOTNULL

        $sql = "SELECT DISTINCT (id_item), id_item_borang,a.id_harkat,a.peringkat,a.harkat,a.id_klasifikasi,a.id_klasifikasi_ikt, b.ikuikt FROM 
	grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
	WHERE a.id_periode_pengisian=".$key['id_periode_pengisian']."  AND a.id_borang=".$key['id_borang']." AND a.kd_prodi='".$key['kd_prodi']."'
	  and b.ikuikt='iku' and
	  a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang_ami'].")
	
	" ;

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
    public function atl_grfk_ikt($key = array())
    {
        // 	$sql="

        // 	SELECT nm_item, keterangan, id_borang,id_ksk,id_item_borang
        // FROM public.item_borang_v2 WHERE id_borang = ".$key['id_borang']." AND id_item IN(SELECT id_item
        // FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."' AND harkat!= 'Sesuai');

        // 	";

        // $sql="SELECT id_item, id_item_borang,id_harkat,peringkat,harkat,id_klasifikasi,id_klasifikasi_ikt FROM public.grafik_audit_v WHERE id_periode_pengisian=".$key['id_periode_pengisian']."  AND id_borang=".$key['id_borang']." AND kd_prodi='".$key['kd_prodi']."'
        //  AND peringkat != 4 AND harkat_ikt NOTNULL";
        $sql = "SELECT DISTINCT (id_item), id_item_borang,a.id_harkat,a.id_harkat_ikt,a.peringkat, a.peringkat_ikt,a.harkat_ikt, a.harkat ,a.id_klasifikasi,a.id_klasifikasi_ikt, b.ikuikt FROM 
	grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi_ikt = b.id_harkat
		WHERE a.id_periode_pengisian=".$key['id_periode_pengisian']."  AND a.id_borang=".$key['id_borang']." AND a.kd_prodi='".$key['kd_prodi']."'
		  and b.ikuikt='ikt'  and
		  a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang_ami'].")";

        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }

    public function get_grafik_atl_unit_univ_iku($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi,
			a.harkat,
			COUNT(id_isi_borang) AS jumlah
			FROM grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']." AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='iku' and
			a.id_klasifikasi IN (SELECT id_harkat FROM t_harkat WHERE id_borang = '".$key['id_borang_ami']."')
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi, a.harkat,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi,b.ikuikt;";
        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }


    public function get_grafik_atl_unit_univ_ikt($key = array())
    {
        //fungsi ini untuk mendapatkan hasil grafik isian tertentu pada unit tertentu
        $sql = "SELECT
			a.institusi,
			a.kd_fak,
			a.kd_prodi,
			a.id_klasifikasi_ikt,
			
			a.harkat_ikt,
			
			COUNT(id_isi_borang) AS jumlah
			FROM grafik_atl_v AS a LEFT join matrix_v AS b ON a.id_klasifikasi_ikt = b.id_harkat
			WHERE a.id_borang = ".$key['id_borang']."  AND
			a.institusi = '".$key['institusi']."' AND
			a.kd_fak = '".$key['kd_fak']."' AND
			a.kd_prodi = '".$key['kd_prodi']."' AND
			a.id_periode_pengisian='".$key['id_periode']."' AND 
			b.ikuikt='ikt' and
			
			a.id_klasifikasi_ikt IN (SELECT id_harkat FROM t_harkat WHERE id_borang = ".$key['id_borang_ami'].")
			GROUP BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt, a.harkat_ikt,b.ikuikt
			ORDER BY a.id_borang, a.institusi, a.kd_fak, a.kd_prodi, a.id_klasifikasi_ikt,b.ikuikt";
        $q = $this->mutu->query($sql)->result_array();
        return $q;
    }
}
