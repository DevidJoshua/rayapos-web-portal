<?php
	include './config/allConfig.php'; 
	include './lib/allLib.php';
	
	
	////////////GET DATA/////////////
	$module='home';
	if(isset($_GET['module'])){
		$module=$_GET['module'];
	}

	$seo_kategori_utama='';
	if(isset($_GET['main_kategori'])){
		$seo_kategori_utama=$_GET['main_kategori'];
		isMainCategory($kon,$seo_kategori_utama);
	}
	$seo_subkategori='';
	if(isset($_GET['seo_subkategori'])){
		$seo_subkategori=$_GET['seo_subkategori'];
		isSubCategory($kon,$seo_subkategori);
	}

		///////////GET NEWS DETAIL VARIABLES/////////
		$seo_berita='';
		if(isset($_GET['seo'])){
			$seo_berita=$_GET['seo'];
			isNews($kon,$seo_berita);
		}	
		
		$kategori='';
		if(isset($_GET['kategori'])){
			$kategori=$_GET['kategori'];
		}

		$hari='';
		if(isset($_GET['hari'])){
			$hari=$_GET['hari'];
		}

		$bulan='';
		if(isset($_GET['bulan'])){
			$bulan=$_GET['bulan'];
		}

		$tahun='';
		if(isset($_GET['tahun'])){
			$tahun=$_GET['tahun'];
		}				
		///////////GET NEWS DETAIL VARIABLES/////////
	$search='';

	if(isset($_POST['search'])){
		$search=$_POST['search'];
	}
	
	////////GET DATA/////////////

	if(!isset($_GET['action']))
	{
		include "modules/content.php";
	}
	else
	{

	}
 ?>