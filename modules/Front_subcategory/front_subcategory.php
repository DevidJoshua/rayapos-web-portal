
<?php 

		$get_categori="SELECT nama_kategori,id_kategori_berita from kategori_berita WHERE kategori_seo LIKE '%$_GET[seo_subkategori]%' LIMIT 1";
		$sql_get_category=mysqli_query($kon,$get_categori);
		$sub_category=mysqli_fetch_row($sql_get_category);
		$sub_cat=$sub_category[0];
		$id_sub_cat=$sub_category[1];
 ?>
<?php 
include './modules/Basic/breadcumb.php';
include 'action_front_subcategory.php'; 
?>


<div class="container" style="margin-top: 10px;margin-bottom: 5px;">
	<font size="40" style="font-style: bold;color: <?=$warna_kategori;?> ; padding: 20px; border-style: solid;border-color: <?=$warna_kategori; ?>">
		<?=$sub_cat; ?>
		</font>
</div>

<?php include 'higlights.php'; ?>

<section class="bg0 p-t-60 p-b-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<div class="row p-t-35">
						<?php 
						foreach (getSubcategoryNews($id_sub_cat,$kon) as $key => $a): ?>
							<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="<?php 
								$date=$a['time'];
								$dt=strtotime($date);
								$day=date("d",$dt);
								$month=date("m",$dt);
								$year=date("Y",$dt);
								$kategori=$_GET['seo_subkategori'];
								$seo=$a['judul_seo'];
								echo detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo); ?>" class="wrap-pic-w hov1 trans-03">
									<img src="<?php $img=$a['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG"></a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?=$a['judul']; ?>
										</a>
									</h5>
								<?php if($a['reporter'] != null){ ?>
									<span class="cl8">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											
												Oleh. <?php echo $a['reporter']; ?>
											
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>
								<?php } ?>
										<span class="f1-s-3">
											<?php 
											$dt=$a['time'];
											echo shortDateIna($dt);
											 ?> 
										</span>
									</span>
								</div>
							</div>
						</div>	
						<?php endforeach ?>
						<!-- <a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
							Load More
						</a> -->	
					</div>
				</div>

				<!-- ///////////SIDEBAR/////////// -->
				<?php 
						Standard($kon);
				 ?>
				<!-- ///////////SIDEBAR/////////// -->
			</div>
		</div>
</section>