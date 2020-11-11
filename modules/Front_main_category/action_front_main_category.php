<?php 
	function getAllHighlitedNewsbyCategory($mainCategory=null,$kon,$start,$end)
	{
		if($mainCategory!=null)
		{
			$get="SELECT
				berita.judul_seo as judul_seo, 
				reporter.id_reporter as id_reporter,
				reporter.nama_reporter as reporter,
				berita.id_berita as id,
				CONCAT(berita.tanggal,' ',berita.jam) as Thetime, 
				berita.gambar as gambar, berita.judul as judul, 
				kategori_berita.nama_kategori as nama_kategori,
				kategori_berita.kategori_seo as kategori_seo 

				FROM berita 
				LEFT JOIN kategori_berita on berita.id_kategori_berita=kategori_berita.id_kategori_berita 
				LEFT JOIN reporter 
				on berita.id_reporter=reporter.id_reporter 
				WHERE 
				kategori_berita.id_kategori_utama='$mainCategory'
				AND berita.aktif='Y' 
				AND kategori_berita.aktif='Y' 
				order by Thetime DESC LIMIT $start,$end";
		}
		else{
			$get="SELECT
				reporter.id_reporter as id_reporter,
				berita.judul_seo as judul_seo, 
				reporter.nama_reporter as reporter,
				berita.id_berita as id,
				CONCAT(berita.tanggal,' ',berita.jam) as Thetime, 
				berita.gambar as gambar, berita.judul as judul, 
				kategori_berita.nama_kategori as nama_kategori,
				kategori_berita.kategori_seo as kategori_seo 

				FROM berita 
				LEFT JOIN kategori_berita 
				on berita.id_kategori_berita=kategori_berita.id_kategori_berita 
				LEFT JOIN reporter 
				on berita.id_reporter=reporter.id_reporter 
				WHERE 
				berita.aktif='Y' 
				AND kategori_berita.aktif='Y' 
				order by Thetime DESC LIMIT $start,$end";
		}
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
			
		    array_push($result,array(
		    	'id_reporter'=>$c['id_reporter'],
		    	'judul_seo'=>$c['judul_seo'],
		    	'id_berita'=>$c['id'],
		        'time'=>$c['Thetime'],
		        'reporter'=>$c['reporter'],
		        'judul'=>$c['judul'],
		        'gambar'=>$c['gambar'],
		        'kategori_seo'=>$c['kategori_seo'],
		        'nama_kategori'=>$c['nama_kategori'])

		     );
		}

		return $result;
	}
	function getAllNewsbyMainCategory($category,$kon)
	{
		$get="SELECT 
				berita.judul_seo as judul_seo,
				berita.id_berita as id, 
				CONCAT(berita.tanggal,' ',berita.jam) as Thetime, 
				berita.gambar as gambar, berita.judul as judul, 
				kategori_berita.nama_kategori as nama_kategori,
				kategori_berita.kategori_seo as kategori_seo 
				FROM berita 
				LEFT JOIN kategori_berita on berita.id_kategori_berita=kategori_berita.id_kategori_berita WHERE berita.aktif='Y' 
				AND kategori_berita.aktif='Y' 
				AND kategori_berita.id_kategori_berita='$category' 
				order by Thetime DESC LIMIT 0,1";
		
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    array_push($result,array(
		    	'kategori_seo'=>$c['kategori_seo'],
		    	'judul_seo'=>$c['judul_seo'],
		    	'id_berita'=>$c['id'],
		        'time'=>$c['Thetime'],
		        'judul'=>$c['judul'],
		        'gambar'=>$c['gambar'],
		        'nama_kategori'=>$c['nama_kategori'])
		     );
		}

		return $result;
	}
	function getMainCategory($kon)
	{
		$get="SELECT 
		kategori_utama.id_kategori_utama as id_kategori_utama,
		kategori_utama.nama_kategori_utama as nama_kategori_utama,
		kategori_utama.warna_kategori_utama as warna_kategori_utama,
		kategori_utama.warna_text_kategori_utama as warna_text_kategori_utama 
		FROM kategori_utama
		LEFT JOIN  kategori_berita
		ON kategori_utama.id_kategori_utama=kategori_berita.id_kategori_utama
		LEFT JOIN berita
		ON kategori_berita.id_kategori_berita=berita.id_kategori_berita
		GROUP BY kategori_utama.id_kategori_utama
		HAVING COUNT(berita.id_berita)>0;";
		
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {
		    array_push($result,array(
		    	'id_kategori'=>$c['id_kategori_utama'],
		        'nama_kategori_utama'=>$c['nama_kategori_utama'],
		    	'warna_kategori_utama'=>$c['warna_kategori_utama'],
		    	'warna_text_kategori_utama'=>$c['warna_text_kategori_utama'])
		     );
		}
		return $result;
	}
	function getNewsCategory($mainCategory,$kon)
	{
		$get="SELECT 
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
 ?> 