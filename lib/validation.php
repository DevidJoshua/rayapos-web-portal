<?php 

	function isMainCategory($kon,$nama_kategori_utama)
	{
		$src="SELECT id_kategori_utama FROM kategori_utama WHERE seo_kategori_utama = '$nama_kategori_utama'  LIMIT 1";
			$sql=MYSQLI_QUERY($kon,$src);
			$tot=MYSQLI_NUM_ROWS($sql);
			if(empty($nama_kategori_utama)||MYSQLI_NUM_ROWS($sql)<1){
				header('location:'.baseUrl().'index.php');
			}
	}
	function isSubCategory($kon,$seo_sub)
	{
		$src="SELECT id_kategori_berita FROM kategori_berita WHERE kategori_seo = '$seo_sub'  LIMIT 1";
			$sql=MYSQLI_QUERY($kon,$src);
			$tot=MYSQLI_NUM_ROWS($sql);
			if(empty($seo_sub)||MYSQLI_NUM_ROWS($sql)<1){
				header('location:'.baseUrl().'index.php');
			}
	}
	function isNews($kon,$news)
	{
		$src="SELECT id_berita FROM berita WHERE judul_seo = '$news'  LIMIT 1";
			$sql=MYSQLI_QUERY($kon,$src);
			$tot=MYSQLI_NUM_ROWS($sql);
			if(empty($news)||MYSQLI_NUM_ROWS($sql)<1){
				header('location:'.baseUrl().'index.php');
			}
	}


 ?>