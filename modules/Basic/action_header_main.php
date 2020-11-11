<?php 

	function get_main_category($kon)
	{	
		$sql_get="SELECT 
				  kategori_utama.id_kategori_utama,
				  kategori_utama.nama_kategori_utama 
				  FROM kategori_utama
				  LEFT JOIN kategori_berita
				  ON kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
				  LEFT JOIN berita
				  ON kategori_berita.id_kategori_berita=berita.id_kategori_berita 
				  WHERE kategori_utama.aktif_kategori_utama='Y'
				  GROUP BY kategori_utama.id_kategori_utama
				  HAVING COUNT(berita.id_berita)>0";

		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    array_push($result,array(
		    	'id_kategori_berita'=>$c['id_kategori_berita'],
		        'nama_kategori'=>$c['nama_kategori'])
		     );
		}
		return $result;
	}

	function get_category($mainCategory,$kon)
	{
		$sql_get="SELECT 
			  kategori_berita.id_kategori_berita,
			  kategori_berita.nama_kategori 
			  FROM kategori_berita 
			  LEFT JOIN berita
			  ON berita.id_kategori_berita=kategori_berita.id_kategori_berita
			  WHERE kategori_berita.id_kategori_utama='$mainCategory'
			  GROUP BY kategori_berita.id_kategori_berita
			  HAVING count(berita.id_berita);
			  ";
		
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    array_push($result,array(
		    	'id_kategori_berita'=>$c['id_kategori_berita'],
		        'nama_kategori'=>$c['nama_kategori'])
		     );
		}
		return $result;
	}
	function get_news($category,$kon)
	{
		$sql_get="
				SELECT 
				id_berita,
				CONCAT(tanggal,' ',jam)  as datetime,
				gambar,judul 
				FROM berita 
				WHERE aktif='Y' 
				AND id_kategori_berita='$subkat' 
				ORDER BY datetime 
				desc LIMIT 4
			    ";
		
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    array_push($result,array(
		    	'id_kategori_berita'=>$c['id_kategori_berita'],
		        'nama_kategori'=>$c['nama_kategori'])
		     );
		}
		return $result;
	}
	function get_news_higlights($main_kat,$kon)
	{
		$sql_get="
				SELECT 
				berita.id_berita,
				CONCAT(berita.tanggal,' ',berita.jam) as datetime, 
				berita.gambar as gambar, 
				kategori_berita.nama_kategori as kategori, 
				berita.judul as judul 
				FROM berita 
				LEFT JOIN kategori_berita 
				ON berita.id_kategori_berita=kategori_berita.id_kategori_berita 
				WHERE berita.aktif='Y' 
				AND kategori_berita.id_kategori_utama='$main_kat' 
				AND kategori_berita.aktif='Y' 
				ORDER BY datetime,berita.dibaca DESC LIMIT 4
			    ";
		
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    array_push($result,array(
		    	'id_kategori_berita'=>$c['id_kategori_berita'],
		        'nama_kategori'=>$c['nama_kategori'])
		     );
		}
		return $result;
	}


 ?>