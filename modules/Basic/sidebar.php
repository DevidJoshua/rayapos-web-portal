<?php		
		function Standard2($kon)
		{
			echo "
					<div class='col-md-10 col-lg-4'>
					<div class='p-l-10 p-rl-0-sr991 p-b-20'>
						<!-- Tag -->
						
					</div>
				</div>
				";     
		}
		
		function Standard($kon)
		{
			echo "<div id='fb-root'></div>
			  <script async defer crossorigin='anonymous' src='https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v6.0&appId=729626997217231&autoLogAppEvents=1'></script>";

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
			ORDER BY berita.dibaca DESC LIMIT 5";
					$ad='P300x600';
					echo "
							<div class='col-md-10 col-lg-4'>
								<div class='p-l-10 p-rl-0-sr991 p-b-20'>
						";
					include 'Covid/data_covid.php';

					echo "
									<div>
										<div class='how2 how2-cl4 flex-s-c'>
											<h3 class='f1-m-2 cl3 tab01-title'>
												Paling banyak dibaca
											</h3>
										</div>
										<ul class='p-t-35'>
						";
					$sql=mysqli_query($kon,$sql_mp);
					$no=1;
					while ($mp=mysqli_fetch_array($sql)) {
						$date=$mp['datetime'];
						$dt=strtotime($date);
						$day=date("d",$dt);
						$month=date("m",$dt);
						$year=date("Y",$dt);
						$kategori=$mp['kategori'];
						$seo=$mp['seo'];
						$judul=$mp['judul'];
					
					echo "				
											<li class='flex-wr-sb-s p-b-22'>
												<div class='size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6'>
													#".$no."
												</div>
						"
				?>
				 	<a href="<?=detailPostUrl($year,$month,$day,$mp['seo_utama'],$kategori,$seo);?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
				<?php 
					echo						$judul."
												</a>
											</li>

							";
					 $no++;
					}
					echo "</ul>
								</div>";
					include 'ads.php';
					echo 	"
									<div class='p-t-50'>
										
					";
					echo    "
								<div class='fb-page' data-href='https://www.facebook.com/rayaposofficial/' data-tabs='timeline' data-width='' data-height='' data-small-header='false' data-adapt-container-width='true' data-hide-cover='false' data-show-facepile='true'><blockquote cite='https://www.facebook.com/rayaposofficial/' class='fb-xfbml-parse-ignore'><a href='https://www.facebook.com/rayaposofficial/'>Rayapos</a></blockquote></div>
									</div>
								</div>
							</div>
					";
		}
		function NewsDetail($kon,$utama,$id_kategori)
		{
			echo "<div class='col-md-10 col-lg-4 p-b-30'>
					<div class='p-l-10 p-rl-0-sr991 p-t-70'>						
						<!-- Category -->
						<div class='p-b-60'>
							<div class='how2 how2-cl4 flex-s-c'>
								<h3 class='f1-m-2 cl3 tab01-title'>
									Category
								</h3>
							</div>
							<ul class='p-t-35'>
				";
				$qry="
					SELECT 
					kategori_berita.kategori_seo as kategori_seo,
					kategori_berita.nama_kategori as nama_kategori,
					kategori_utama.seo_kategori_utama as seo_utama

					FROM kategori_berita 
					JOIN kategori_utama
					ON kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
					WHERE kategori_berita.id_kategori_berita='$id_kategori'
					";
				$skat=mysqli_query($kon,$qry);
				while ($d=mysqli_fetch_array($skat)) {
					
				}
				$sql=mysqli_query($kon,$qry);
						while ($kategori=mysqli_fetch_array($sql)) {
							echo "			
								<li class='how-bor3 p-rl-4'>
								";
	?>
									<a href="<?=subCategoryUrl($kategori['seo_utama'],$kategori['kategori_seo']);?>" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										<?=$kategori['nama_kategori']; ?>
									</a>									
	<?php								
						}
				echo "
								</li>
							</ul>
						</div>
					";

				echo "
						<!-- Popular Posts -->
						<div class='p-b-30'>
							<div class='how2 how2-cl4 flex-s-c'>
								<h3 class='f1-m-2 cl3 tab01-title'>
									Popular Post
								</h3>
							</div>

					 		<ul class='p-t-35'>
					 ";
				   $popular="SELECT
							NOW(),berita.judul_seo as judul_seo, 
							berita.id_berita as id, 
							CONCAT(berita.tanggal,' ',berita.jam) as Thetime, 
							berita.gambar as gambar, berita.judul as judul, 
							berita.judul_seo as judul_seo,
							kategori_berita.kategori_seo as kategori_seo,  
							kategori_berita.nama_kategori as nama_kategori 
							FROM berita 
							LEFT JOIN kategori_berita on berita.id_kategori_berita=kategori_berita.id_kategori_berita 
							LEFT JOIN kategori_utama
							on kategori_berita.id_kategori_utama=kategori_utama.id_kategori_utama
							WHERE 
							berita.aktif='Y'
							AND
							berita.id_kategori_berita='$id_kategori'
							order by Thetime DESC,berita.dibaca DESC LIMIT 4";
				
				$pop=mysqli_query($kon,$popular);
				while ($p=mysqli_fetch_array($pop)) {
					$date=$p['Thetime'];
					$dt=strtotime($date);
					$day=date("d",$dt);
					$month=date("m",$dt);
					$year=date("Y",$dt);
					$kategori=$p['kategori_seo'];
					$seo=$p['judul_seo'];
					echo "
									<li class='flex-wr-sb-s p-b-30'>
										<a href='#' class='size-w-10 wrap-pic-w hov1 trans-03'>
											<img src='".imagePost($p['gambar'])."' alt='IMG'>
										</a>

										<div class='size-w-11'>
											<h6 class='p-b-4'>";
?>

											<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo); ?>" class='f1-s-5 cl3 hov-cl10 trans-03'>
<?php								echo		$p['judul']."
												</a>
											</h6>

											<span class='cl8 txt-center p-b-24'>
												<a href='#' class='f1-s-6 cl8 hov-cl10 trans-03'>
													".$p['nama_kategori']."
												</a>

												<span class='f1-s-3 m-rl-3'>
													-
												</span>

												<span class='f1-s-3'>
													Feb 18
												</span>
											</span>
										</div>
									</li>
						";
				}
				echo "
							</ul>
						</div>

						<!-- Tag -->
						<div>
							<div class='how2 how2-cl4 flex-s-c m-b-30'>
								<h3 class='f1-m-2 cl3 tab01-title'>
									Tag
								</h3>
							</div>

							<div class='flex-wr-s-s m-rl--5'>
				";

	?>
						<?php
							$tags="SELECT tag FROM berita WHERE id_kategori_berita='$id_kategori' ORDER BY tanggal,dibaca DESC LIMIT 5;";
							$tag=mysqli_query($kon,$tags);
							$etags=array();
							while ($d=mysqli_fetch_array($tag)) {
								$tg=$d['tag'];
								array_push($etags,$tg);
							}
							
							$theTag=implode(",", $etags);
						 	$tTg=str_replace(","," ", $theTag);
							$t = array_unique(explode(" ",$tTg));
							$gabung=implode(",", $t);
							$tagss=explode(" ",$tTg);
							for ( $i = 0; $i <count($tagss); $i++ ) { ?>
							<?php $seo=strtolower(str_replace(',', '', $tagss[$i])); ?>
								<?php 								
 								if($tagss[$i] != null){ ?>
									<a href="<?=tagsUrl($seo); ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									<?=str_replace(',', '', $tagss[$i]); ?>
									</a>
								<?php } ?>
							<?php } ?>
	<?php
			echo"
							</div>	
						</div>
					</div>
				</div>";
		}
	 ?>

