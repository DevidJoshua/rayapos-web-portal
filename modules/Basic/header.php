<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154014438-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-154014438-1');
	</script>

	<meta charset="utf-8" />
    <meta name="keywords" content="post,news,berita,rayapos," />
    <meta name="description" content="Cepat dan akurat" />
    <?php if($module=='news_detail'){?>

		<?php  
		include './modules/News_detail/action_news_detail.php';
		foreach (getNewsDetail($kon,$tahun,$bulan,$hari,$kategori,$seo_berita) as $key => $data){ ?>
		<?php 
			$lead=$data['lead'];
			if($lead == '' || $lead == null )
			{
				$lead='Lebih lanjut >>>';
			}
		?>	
				 <meta property="og:type" content="article" />
		         <meta property="og:title" content="<?=$data['judul']; ?>" />
		         <meta property="og:description" content="<?=$lead?>" />
		         <meta property="og:image" content="<?=imagePost($data['gambar']); ?>" />
		         <meta property="og:site_name" content="Rayapos"/>
		         <meta property="og:url" content="<?=detailPostUrl($tahun,$bulan,$hari,$data['seo_utama'],$kategori,$seo_berita);?>" />
		         <meta property="fb:app_id" content="2535634980036541"/>
		         <meta content='id_ID' property='og:locale:alternate'/>
		         <!-- Twitter -->
		        <meta name="twitter:card" content="summary_large_image">
		        <meta name="twitter:site" content="<?=detailPostUrl($tahun,$bulan,$hari,$data['seo_utama'],$kategori,$seo_berita);?>">
		        <meta name="twitter:title" content="<?=$data['judul']; ?>">
		        <meta name="twitter:description" content="<?=$lead?>">
		        <meta name="twitter:image" content="<?=imagePost($data['gambar']); ?>">
		 <?php } ?>

	<?php } ?>
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?=asset('images/icons/Favicon/apple-touch-icon.png')?>/">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=asset('images/icons/Favicon/favicon-32x32.png')?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=asset('images/icons/Favicon/favicon-16x16.png')?>">
	<link rel="manifest" href="<?=asset('images/icons/Favicon/site.webmanifest')?>">
	<link rel="mask-icon" href="<?=asset('images/icons/Favicon/safari-pinned-tab.svg')?>" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="<?=$warna_kategori ?>" />
	<!-- Favicon -->


	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=asset('images/icons/favicon.png')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset('vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset('fonts/fontawesome-5.0.8/css/fontawesome-all.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset('fonts/iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset('vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=asset('vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="<?=asset('vendor/animsition/css/animsition.min.css')?>"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=asset('css/util.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=asset('css/main.css')?>">
<!--===============================================================================================-->
	<script src="<?=asset('vendor/jquery/jquery-3.2.1.min.js')?>"></script>
	<style type="text/css">
		.videoEmbed {
		    position: relative;
		    padding-bottom: 56.25%; /* 16:9 */
		    padding-top: 25px;
		    height: 0;
		    
		    iframe {
		        position: absolute;
		        top: 0;
		        left: 0;
		        width: 100%;
		        height: 100%;
		    }
		}
	</style>
</head>
