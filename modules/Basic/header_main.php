<header>
	<?php if($module=='front_main_category' || $module=='front_sub_category') {?>
	<style type="text/css">
		#barAtas{
	background-color:  <?=$warna_teks_kategori; ?>;
	}
	#barInti{
	background-color:  <?=$warna_kategori; ?>;
	}
	#menu_utama{
	background-color:  <?=$warna_kategori; ?>;
	}
	#nav_utama{
	border-style: solid;
	border-color: white;
	background-color:  <?=$warna_kategori; ?>;
	}
	.main-menu > li > a::after {
	color: <?=$warna_teks_kategori; ?>;
	}
	#home{
	color: <?=$warna_teks_kategori; ?>;
	}
	.sub-mega-menu .show>.nav-pills .nav-link {
	color: #fff;
	background-color: <?=$warna_kategori; ?>;
	}

	.sub-menu > li:hover > a {
	  background-color: <?=$warna_kategori; ?>;
	  color: <?=$warna_teks_kategori; ?>;
	  text-decoration: none;
	}

	.href-mobile{
	color: <?=$warna_teks_kategori ?>;
	}
	</style>
	<?php } else { ?>
	<style type="text/css">
		.sub-mega-menu .show>.nav-pills .nav-link {
		color: #fff;
		background-color: #e62d2d;
		}
	</style>
	<?php } ?>
	<!-- Header desktop -->
	<?php
				if($module=='front_main_category' || $module=='front_sub_category') {
					echo "<div id='barInti' class='container-menu-desktop'>";
					echo "<div id='barAtas' class='topbar'>";
				}
				else{
						echo "<div class='container-menu-desktop'>";
						echo "<div class='topbar'>";
				}
				?>
					<div class="content-topbar container h-100">
						<div class="left-topbar">
							<span class="left-topbar-item flex-wr-s-c">
								<span style="color: <?=$warna_kategori; ?>">
									Jakarta, NY
								</span>
								<img class="m-b-1 m-rl-8" src="<?=asset('images/icons/icon-night.png'); ?>" style="color: <?=$warna_kategori; ?>" alt="IMG">
								<span style="color: <?=$warna_kategori; ?>">
									HI 58° LO 56°
								</span>
							</span>
						</div>
						<div class="right-topbar">
							<a href="https://www.facebook.com/rayaposofficial/">
								<span class="fab fa-facebook-f" style="color: <?=$warna_kategori; ?>"></span>
							</a>
							<a href="https://twitter.com/Raya_pos">
								<span class="fab fa-twitter" style="color: <?=$warna_kategori; ?>"></span>
							</a>
							<a href="https://www.youtube.com/channel/UCCJLhsdA7_GIAkO0Cp6cjZA">
								<span class="fab fa-youtube" style="color: <?=$warna_kategori; ?>"></span>
							</a>
						</div>
					</div>
				</div>
				<!-- Header Mobile -->
				<div class="wrap-header-mobile" style="color: #292929;">
					<!-- Logo moblie -->
					<div class="logo-mobile">
						<a href="<?=baseUrl(); ?>"><img src="<?=asset('images/icons/'.$logo_header.'.png'); ?>" alt="IMG-LOGO"></a>
					</div>
					<!-- Button show menu -->
					<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</div>
				</div>
				<!-- Menu Mobile -->
				<div class="menu-mobile">
					<ul class="topbar-mobile">
						<li class="left-topbar">
							<span class="left-topbar-item flex-wr-s-c">
								<span>
									New York, NY
								</span>
								<img class="m-b-1 m-rl-8" src="<?=asset('images/icons/icon-night.png') ?>" alt="IMG">
								<span>
									HI 58° LO 56°
								</span>
							</span>
						</li>
						<li class="right-topbar">
							<a href="https://www.facebook.com/rayaposofficial/">
								<span class="fab fa-facebook-f" style="color: <?=$warna_kategori; ?>"></span>
							</a>
							<a href="https://twitter.com/Raya_pos">
								<span class="fab fa-twitter" style="color: <?=$warna_kategori; ?>"></span>
							</a>
							<a href="https://www.youtube.com/channel/UCCJLhsdA7_GIAkO0Cp6cjZA">
								<span class="fab fa-youtube" style="color: <?=$warna_kategori; ?>"></span>
							</a>
						</li>
					</ul>
					<?php
							if($module=='front_main_category'|| $module=='front_sub_category')
							{
							echo "<ul id='menu_utama' class='main-menu-m'>";
							}
							else
							{
								echo "<ul class='main-menu-m'>";
								}
							?>
							<li class="href-mobile">
								<a href="<?=baseUrl(); ?>" class="href-mobile">Home</a>
							</li>
							<?php
										///////////////MAIN KATEGORI////////////////
										$sql="SELECT
										kategori_utama.id_kategori_utama,
										kategori_utama.seo_kategori_utama,
										kategori_utama.nama_kategori_utama
										FROM kategori_utama
										LEFT JOIN kategori_berita
										ON kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
										LEFT JOIN berita
										ON kategori_berita.id_kategori_berita=berita.id_kategori_berita
										WHERE kategori_utama.aktif_kategori_utama='Y'
										GROUP BY kategori_utama.id_kategori_utama
										HAVING COUNT(berita.id_berita)>0
										";
										
										$fetch=mysqli_query($kon,$sql);
										
										while ($main=mysqli_fetch_array($fetch)) {
										$seo_utama=$main['seo_kategori_utama'];
										///////////////MAIN KATEGORI////////////////
							?>
							<li>
								<a href="<?=mainCategoryUrl($seo_utama); ?>" class="href-mobile"><?=$main['nama_kategori_utama']; ?></a>
								
								<span class="arrow-main-menu-m" style="color: <?=$warna_teks_kategori; ?>;">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</span>
							</li>
							<?php } ?>
						</ul>
					</div>
					
					<!--  -->
					<div class="wrap-logo container">
						<!-- Logo desktop -->
						<div class="logo">
							<a href="<?php echo baseUrl(); ?>"><img src="<?=asset('images/icons/'.$logo_header.'.png') ?>" alt="LOGO"></a>
						</div>
						<!-- Banner -->
						<?php
							$ad='L728x90';
							include 'ads.php';
						?>
					</div>
					<div class='wrap-main-nav'>
						<!--  -->
						<?php
							if($module=='front_main_category'|| $module=='front_sub_category')
							{
								echo "<div class='nav_utama'>";
								}
								else
								{
									echo "<div class='main-nav' style='position: sticky; top: 120px; z-index: 0;'>";
									}
								?>
								<!-- Menu desktop -->
								<nav class="menu-desktop">
									<a class="logo-stick" href="<?=baseUrl(); ?>">
										<img src="<?=asset('images/icons/logo-01.png') ?>" alt="LOGO">
									</a>
									<ul class="main-menu">
										<li id="home">
											<a href="<?php echo baseUrl(); ?>"
												<?php if($module=='front_main_category' || $module=='front_sub_category'){ ?>
												style="color:<?=$warna_teks_kategori; ?>"
												<?php } ?>
											>Home</a>
											
										</li>
										<?php
											///////////////MAIN KATEGORI////////////////
											$sql="SELECT
											kategori_utama.id_kategori_utama as id_kategori_utama,
											kategori_utama.seo_kategori_utama as seo,
											kategori_utama.nama_kategori_utama as nama_kategori_utama,
											kategori_utama.warna_text_kategori_utama as warna_teks,
											kategori_utama.warna_kategori_utama as warna_utama
											FROM kategori_utama
											LEFT JOIN kategori_berita
											ON kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
											LEFT JOIN berita
											ON kategori_berita.id_kategori_berita=berita.id_kategori_berita
											WHERE kategori_utama.aktif_kategori_utama='Y'
											GROUP BY kategori_utama.id_kategori_utama
											HAVING COUNT(berita.id_berita)>0
											";
											$fetch=mysqli_query($kon,$sql);
											
											while ($main=mysqli_fetch_array($fetch)) {
											///////////////MAIN KATEGORI////////////////
											$seo_utama=$main['seo'];
										?>
										<li style="background-color: <?=$warna_kategori; ?>">
											<a href="<?php mainCategoryUrl($seo_utama); ?>" style="color:<?php echo $warna_teks_kategori; ?>">
												<?php 
													echo $main['nama_kategori_utama'];
													$main_kat=$main['id_kategori_utama'];
												 ?>
											</a>
											<ul class="sub-menu">
												<?php 
											///////////////SUB KATEGORI////////////////
											$sql2="SELECT 
											kategori_berita.id_kategori_berita as id_kategori_berita,
											kategori_berita.nama_kategori as nama_kategori,
											kategori_berita.kategori_seo as seo
											FROM kategori_berita
											LEFT JOIN berita
											ON kategori_berita.id_kategori_berita=berita.id_kategori_berita
											WHERE kategori_berita.id_kategori_utama='$main_kat' 
											AND kategori_berita.aktif='Y'
											GROUP BY kategori_berita.id_kategori_berita
											HAVING count(berita.id_berita)>0
											"; 
											$fetch2=mysqli_query($kon,$sql2);
											///////////////SUB KATEGORI////////////////
										?>
												<?php while ($sub=mysqli_fetch_array($fetch2)) { ?>
													<li><a href="<?=subCategoryUrl($seo_utama,$sub['seo']); ?>"><?=$sub['nama_kategori'];?></a></li>
												<?php }?>
											</ul>
										</li>
										<?php } ?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</header>
				<?php if($module=='front_main_category'|| $module=='front_sub_category') {?>
				<br><br>
				<?php } ?>