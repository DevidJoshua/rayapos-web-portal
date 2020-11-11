<?php 

function getAllHighlitedNewsCategory($kon,$start,$end)
	{
			$get="SELECT
				berita.judul_seo as judul_seo, 
				reporter.id_reporter as id_reporter,
				reporter.nama_reporter as reporter,
				berita.id_berita as id, 
				CONCAT(berita.tanggal,' ',berita.jam) as Thetime, 
				berita.gambar as gambar, berita.judul as judul,
				kategori_berita.kategori_seo as kategori_seo,  
				kategori_berita.nama_kategori as nama_kategori,
				kategori_utama.seo_kategori_utama as seo_utama 
				FROM berita 
				LEFT JOIN kategori_berita on berita.id_kategori_berita=kategori_berita.id_kategori_berita 
				LEFT JOIN reporter 
				on berita.id_reporter=reporter.id_reporter 
				LEFT JOIN kategori_utama
				on kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
				WHERE 
				berita.aktif='Y' 
				order by Thetime DESC LIMIT $start,$end";
			
		$sql_get=mysqli_query($kon,$get);
		$result=array();
		while ($c=mysqli_fetch_array($sql_get)) {

		    array_push($result,array(
		    	'kategori_seo'=>$c['kategori_seo'],
		    	'seo_utama'=>$c['seo_utama'],
		    	'judul_seo'=>$c['judul_seo'],
		    	'id_berita'=>$c['id'],
		        'time'=>$c['Thetime'],
		        'reporter'=>$c['reporter'],
		        'judul'=>$c['judul'],
		        'gambar'=>$c['gambar'],
		        'nama_kategori'=>$c['nama_kategori'])
		     );
		}
		return $result;
	}


 ?>