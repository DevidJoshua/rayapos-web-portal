<?php
	$warna_teks_kategori='#111';
	$warna_kategori='#ffff';
	$logo_header='Normal';	
if($module=='front_main_category' || $module=='front_sub_category')
	{
		$src="SELECT nama_kategori_utama,id_kategori_utama,warna_kategori_utama,warna_text_kategori_utama,logo_header FROM kategori_utama WHERE seo_kategori_utama = '$seo_kategori_utama'  LIMIT 1";
		$sql=MYSQLI_QUERY($kon,$src);
		while($data=MYSQLI_FETCH_ARRAY($sql)){
			$id_utama=$data['id_kategori_utama'];
			$nama_utama=$data['nama_kategori_utama'];
			$warna_kategori=$data['warna_kategori_utama'];
			$warna_teks_kategori=$data['warna_text_kategori_utama'];
			$logo_header=$data['logo_header'];
		}
	}
	include 'Basic/header.php';
	include 'Basic/sidebar.php';
	include 'Basic/header_main.php';
	echo "<body class='animsition'>";
	$breadcumb=null;
	switch ($module) {
		case 'home':
				echo "<title>Rayapos - Berita Cepat dan Akurat</title>";
				$breadcumb='home';
				include 'Basic/breadcumb.php';
				$breadcumb='home';
				include 'Front_page/front_page.php';
			break;
		case 'front_sub_category':
				$breadcumb='category';
				echo "<title>Rayapos - Berita Cepat dan Akurat</title>";
				
				include 'Front_subcategory/front_subcategory.php';
			break;
		case 'front_main_category':
			echo "<title>".$nama_utama."</title>";
			echo "<title>Rayapos - Berita Cepat dan Akurat</title>";
			include 'Basic/breadcumb.php';
			include 'Front_main_category/front_main_category.php';
		break;

		case 'front_search':
				echo "<title>Search | Berita Cepat dan Akurat</title>";
				$breadcumb='search';
				include 'Front_search/front_search.php';
		break;
		case 'news_detail':
				echo "<title>Berita Cepat dan Akurat</title>";
				$breadcumb='news_detail';
				include 'News_detail/news_detail.php';
			break;
		default:
			echo "<title>Berita Cepat dan Akurat</title>";
			$breadcumb='home';
			include 'Front_page/front_page.php';
			break;
	}
	echo "</body>";
	include 'Basic/footer.php';
 ?>