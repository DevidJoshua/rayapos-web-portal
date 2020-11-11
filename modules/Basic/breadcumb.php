<?php 
$sql_mp="SELECT 
		CONCAT(berita.tanggal,' ',berita.jam) as datetime,
		kategori_berita.kategori_seo as kategori,
		kategori_utama.seo_kategori_utama as seo_utama,
		berita.judul_seo as seo, 
		berita.judul as judul 
		FROM berita 
		LEFT JOIN kategori_berita 
		ON berita.id_kategori_berita=kategori_berita.id_kategori_berita 
		LEFT JOIN kategori_utama
		ON kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
		WHERE berita.aktif='Y' 
		AND kategori_utama.aktif_kategori_utama='Y' 
		AND kategori_berita.aktif='Y' 
		AND berita.tanggal >= ( CURDATE() - INTERVAL 3 DAY )
		ORDER BY berita.dibaca DESC LIMIT 5";

	switch ($breadcumb) {
		case 'home':
		$sql=mysqli_query($kon,$sql_mp);
				echo "<div class='container'>
					<div class='bg0 flex-wr-sb-c p-rl-20 p-tb-8'>
						<div class='f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c'>
							<span class='text-uppercase cl2 p-r-8'>
								Trending Now:
							</span>

							<span class='dis-inline-block cl6 slide100-txt pos-relative size-w-0' data-in='fadeInDown' data-out='fadeOutDown'>
								";
					while ($mp=mysqli_fetch_array($sql)) {
						$date=$mp['datetime'];
						$dt=strtotime($date);
						$day=date("d",$dt);
						$month=date("m",$dt);
						$year=date("Y",$dt);
						$kategori=$mp['kategori'];
						$seo=$mp['seo'];
						$judul=$mp['judul'];
							echo "<span class='dis-inline-block slide100-txt-item animated visible-false'>"
					?>
									<a href="<?=detailPostUrl($year,$month,$day,$mp['seo_utama'],$kategori,$seo);?>"  style="color: #000;"><?=$judul;?></a>
					<?php
							echo "</span>";
					}
				echo       "</span>
						</div>
						<form id='form-search' action=''> 
						<div class='pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6'>
								<input id='search-input' class='f1-s-1 cl6 plh9 s-full p-l-25 p-r-45' type='text' name='search'  placeholder='Search'>
								<button class='flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03'>
									<i class='zmdi zmdi-search'></i>
								</button>
						</div>
						</form> 
					</div>
				</div>";
			break;
		case 'main_category':
			echo "
				<div class='container'>
				<div class='bg0 flex-wr-sb-c p-rl-20 p-tb-8'>
					<div class='f2-s-1 p-r-30 m-tb-6'>";
			echo "<a href='".baseUrl()."' class='breadcrumb-item f1-s-3 cl9'>
					Home 
				</a>

				<div class='breadcrumb-item f1-s-3 cl9'>
				".$nama_utama."
				</div>";
			echo "</div>
					<form action='' method='POST'> 
						<div class='pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6'>
								<input class='f1-s-1 cl6 plh9 s-full p-l-25 p-r-45' type='text' name='search' placeholder='Search'>
								<button class='flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03'>
									<i class='zmdi zmdi-search'></i>
								</button>
							</div>
						</div>
					</form>
				</div>";
			break;
		case 'category':
			$get_main_categori="SELECT nama_kategori_utama from kategori_utama WHERE seo_kategori_utama LIKE '%$seo_kategori_utama' LIMIT 1";
			$sql_get_main_categori=mysqli_query($kon,$get_main_categori);
			$get_m_categori=mysqli_fetch_row($sql_get_main_categori);
			$m_categori=$get_m_categori[0];
			echo "
				<div class='container'>
				<div class='bg0 flex-wr-sb-c p-rl-20 p-tb-8'>
					<div class='f2-s-1 p-r-30 m-tb-6'>";
			echo "<a href='".baseUrl()."' class='breadcrumb-item f1-s-3 cl9'>
					Home 
				</a>";
			?>
				<a href="<?=mainCategoryUrl($seo_kategori_utama);?>" class="breadcrumb-item f1-s-3 cl9">
					<?=$m_categori; ?>
				</a>
			<?php		
			echo	"
				<span class='breadcrumb-item f1-s-3 cl9'>
					".$sub_cat."
				</span>";
			echo "</div>
					<form action='' method='POST'> 
					<div class='pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6'>
							<input class='f1-s-1 cl6 plh9 s-full p-l-25 p-r-45' type='text' name='search' placeholder='Search'>
							<button class='flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03'>
								<i class='zmdi zmdi-search'></i>
							</button>
						</div>
					</div>
					</form>
					</div>";
			break;
		case 'search': 
			echo "
				<div class='container'>
				<div class='bg0 flex-wr-sb-c p-rl-20 p-tb-8'>
					<div class='f2-s-1 p-r-30 m-tb-6'>";
			echo "<a href='/' class='breadcrumb-item f1-s-3 cl9'>
					Home 
				</a>
				<div class='breadcrumb-item f1-s-3 cl9'>
				Search
				</div>";
			echo "</div>
					<form id='form-search' action=''> 
						<div class='pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6'>
								<input id='search-input' class='f1-s-1 cl6 plh9 s-full p-l-25 p-r-45' type='text' name='search'  placeholder='Search'>
								<button class='flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03'>
									<i class='zmdi zmdi-search'></i>
								</button>
						</div>
					</form> 
				</div>";
			break;
		case 'home':
			
			echo "
					<div class='container'>
					<div class='bg0 flex-wr-sb-c p-rl-20 p-tb-8'>
						<div class='f2-s-1 p-r-30 m-tb-6'>";
			echo "<a href='index.html' class='breadcrumb-item f1-s-3 cl9'>
					Home 
				</a>

				<a href='category-01.html' class='breadcrumb-item f1-s-3 cl9'>
					Category
				</a>

				<span class='breadcrumb-item f1-s-3 cl9'>
					Entertaiment
				</span>";
			echo "</div>
					<form action='' method='POST' id='form-search'> 
						<div class='pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6'>
									<input class='f1-s-1 cl6 plh9 s-full p-l-25 p-r-45' type='text' name='search' placeholder='Search' id='input-search'>
									<button type='submit' class='flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03'>
										<i class='zmdi zmdi-search'></i>
									</button>
							</div>

						</div>
					</from. > 
				</div>";
			break;
		
		default:
			# code...
			break;
	}
 ?>
 <script type="text/javascript">
	$(function(){
	  $('#form-search').submit(function(e){
	  	e.preventDefault();
	     var search=$("#search-input").val();   
	     
	     window.location = "<?=searchUrl()?>"+search.replace(' ','+'); 
	  });
	});
</script>