
<?php 

	function getNewsDetail($kon,$tahun,$bulan,$hari,$kategori,$seo)
	{
		$dt=$tahun.'-'.$bulan.'-'.$hari;
		$get="SELECT
				kategori_berita.id_kategori_utama as id_utama,
				kategori_utama.warna_kategori_utama as warna_utama,
				kategori_utama.warna_text_kategori_utama as warna_teks_utama,
				reporter.id_reporter as id_reporter,
				reporter.nama_reporter as reporter,
				berita.isi_berita as isi_berita,
				berita.id_berita as id_berita,
				berita.dibaca as dibaca, 
				berita.id_kategori_berita as id_kategori,
				berita.keterangan_gambar as keterangan_gambar, 
				berita.tag as tag,
				CONCAT(berita.tanggal,' ',berita.jam) as Thetime, 
				berita.gambar as gambar, 
				berita.judul as judul,
				berita.lead_berita as lead, 
				kategori_berita.nama_kategori as nama_kategori,
				kategori_berita.kategori_seo as kategori_seo,
				kategori_utama.seo_kategori_utama as seo_utama 
				FROM berita 
				LEFT JOIN kategori_berita on berita.id_kategori_berita=kategori_berita.id_kategori_berita 
				LEFT JOIN reporter on berita.id_reporter=reporter.id_reporter 
				LEFT JOIN kategori_utama on kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama 
				WHERE 
				berita.judul_seo LIKE '%$seo%'
				AND berita.tanggal = '$dt' 
				AND berita.aktif='Y' 
				 LIMIT 1";
				 
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    $wkt=$c['Thetime'];
		    $timestamp=strtotime($wkt);
		  	// $time='';
		   	// if(date("Y") >= date("Y",$timestamp))
		    //{
		    	//$time=date("d M",$timestamp);
		    //}
		    //else{
		    //	$time=date("d F Y",$timestamp);	
		    //}
			//$time=date("l, d m Y H:i:s",$timestamp);
			$time=dayIna(date("D",$timestamp)).", ".date("d",$timestamp)." ".monthIna(date("F",$timestamp))." ".date("Y",$timestamp)."   ".date("H:i",$timestamp)." WIB";
		    $id= $c['id_berita'];
		    $update_reader_count="UPDATE berita SET dibaca=dibaca+1 WHERE id_berita='$id'";
		    mysqli_query($kon,$update_reader_count);

		    array_push($result,array(
		    	'keterangan_gambar'=>$c['keterangan_gambar'],
		    	'warna_utama'=>$c['warna_utama'],
		    	'warna_teks_utama'=>$c['warna_teks_utama'],
		    	'dibaca'=>$c['dibaca'],
		    	'nama_kategori'=>$c['nama_kategori'],
		    	'kategori_seo'=>$c['kategori_seo'],
		    	'seo_utama'=>$c['seo_utama'],
		        'Thetime'=>$time,
		        'judul'=>$c['judul'],
		        'lead'=>$c['lead'],
		        'gambar'=>$c['gambar'],
		        'isi_berita'=>$c['isi_berita'],
		        'tag'=>$c['tag'],
		        'id_reporter'=>$c['id_reporter'],
		        'id_utama'=>$c['id_utama'],
		        'id_kategori'=>$c['id_kategori'],
		        'nama_reporter'=>$c['reporter'])
		     );
		}
		return $result;
	}



 ?>