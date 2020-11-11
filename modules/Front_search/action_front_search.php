<?php 
	function searchNews($kon,$query)
	{
		$qry=preg_replace('/\W/', '_',$query);
		$get="SELECT
			berita.judul_seo as judul_seo, 
			berita.id_berita as id,
			kategori_utama.seo_kategori_utama,
			CONCAT(berita.tanggal,' ',berita.jam)  as Thetime, 
			berita.gambar as gambar,
			reporter.nama_reporter as reporter,
			kategori_berita.kategori_seo as kategori,
			berita.judul as judul  
			FROM berita 
			LEFT JOIN kategori_berita 
			on berita.id_kategori_berita=kategori_berita.id_kategori_berita 
			LEFT JOIN kategori_utama
			on kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
			LEFT JOIN reporter
			on berita.id_reporter=reporter.id_reporter 
			WHERE berita.aktif='Y'
			AND kategori_berita.aktif='Y' AND berita.judul LIKE '%$qry%' ORDER BY Thetime DESC";
			$sql_get=mysqli_query($kon,$get);
			if(mysqli_num_rows($sql_get)>0){

				$result=array();
				while ($c=mysqli_fetch_array($sql_get)) {
				    array_push($result,array(
						
				    	'id'=>$c['id'],
				        'time'=>$c['Thetime'],
				        'judul'=>$c['judul'],
				        'gambar'=>$c['gambar'],
				        'judul_seo'=>$c['judul_seo'],
				        'kategori'=>$c['kategori'],
						'seo_utama'=>$c['seo_kategori_utama'],
				    	'reporter'=>$c['reporter'])
				     );
				}
				return $result;
			}
			else
			{
				return 0;
			}
		
	}
 ?>