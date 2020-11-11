<?php 
	function getSubcategoryNews($subcat,$kon)
	{
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
			berita.id_kategori_berita='$subcat'
			AND
			berita.aktif='Y' 
			AND kategori_berita.aktif='Y' 
			order by Thetime ";
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
	
 ?> 