<?php include 'action_front_main_category.php'; ?>

<div class="container" style="margin-top: 10px;margin-bottom: 5px;">
	<font size="40" style="font-style: bold;color: <?=$warna_kategori;?> ; padding: 20px; border-style: solid;border-color: <?=$warna_kategori; ?>"><?=$nama_utama; ?></font>
</div>


<?php include 'higlights.php'; ?>

<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">

						<!--  -->
						<!-- Entertainment -->
					<!-- //////////////MAIN CATEGORY//////////////// -->
				<?php foreach (getNewsCategory($id_utama,$kon) as $key => $a) {?>

					<div class="tab01 p-b-20">
							<!-- /////////////////CATEGORY///////////////// -->
						<div class="tab01-head how2 how2-cp bocl12 flex-s-c m-r-10 m-r-0-sr991" 
						<?php if($module=='front_main_category'){ ?>
						style="background-color: <?=$warna_kategori; ?>; color: <?=$warna_teks_kategori; ?>;"
						<?php } ?>> 
								<!-- Brand tab -->
								<h3>
								<?php echo "<h3 class='f1-m-2 cp tab01-title'>"; ?>
									<?=$a['nama_kategori']; ?>
								</h3>
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
									</li>
									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>
								<!--  -->
								<a href="#" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03" style="color:<?=$warna_teks_kategori; ?>;">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							<!-- /////////////////CATEGORY///////////////// -->
							</div>

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab0-0" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
										<?php
											$ct=$a['id_kategori_berita']; 
											foreach (getAllNewsbyMainCategory($ct,$kon,0,1) as $key => $c) { ?>	
												<?php 
												$date=$c['time'];
												$dt=strtotime($date);
												$day=date("d",$dt);
												$month=date("m",$dt);
												$year=date("Y",$dt);
												$kategori=$c['kategori_seo'];
												$seo=$c['judul_seo'];
											 ?>
											<div class="m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="wrap-pic-w hov1 trans-03">
													<img src="
													<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-m-3 cl2 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															<?=$c['nama_kategori'] ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php
															$dt=$c['time'];
															echo dateTumbnail($dt); ?>
														</span>
													</span>
												</div>
											</div>
										<?php } ?>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
										<?php
											$cat=$a['id_kategori_berita']; 
											foreach (getAllHighlitedNewsbyCategory($cat,$kon,1,3) as $key => $c) { ?>	
											<?php 
												$date=$c['time'];
												$dt=strtotime($date);
												$day=date("d",$dt);
												$month=date("m",$dt);
												$year=date("Y",$dt);
												$kategori=$c['kategori_seo'];
												$seo=$c['judul_seo'];

											 ?>
											<div class="flex-wr-sb-s m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															<?=$c['nama_kategori'] ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php
															$dt=$c['time'];
															echo dateTumbnail($dt); ?>
														</span>
													</span>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>

								<!-- - -->
							<?php 
							$id=$a['id_kategori_berita'];
							foreach (getNewsCategory($id,$kon) as $key => $b) { ?>
								<?php echo "<div class='tab-pane fade' id='tab".$b['id_kategori_berita']."-".$id."' role='tabpanel'>"; ?>
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<?php
											$ct=$b['id_kategori_berita']; 
											foreach (getAllNewsbyMainCategory($ct,$kon,0,1) as $key => $c) { ?>	
											<?php 
												$date=$c['time'];
												$dt=strtotime($date);
												$day=date("d",$dt);
												$month=date("m",$dt);
												$year=date("Y",$dt);
												$kategori=$c['kategori_seo'];
												$seo=$c['judul_seo'];

											 ?>
											<div class="m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="wrap-pic-w hov1 trans-03">
													<img src="
													<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-m-3 cl2 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															<?=$c['nama_kategori'] ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php
															$dt=$c['time'];
															echo dateTumbnail($dt); ?>
														</span>
													</span>
												</div>
											</div>

											<?php } ?>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
										<?php
											$ct=$b['id_kategori_berita']; 
											foreach (getAllNewsbyMainCategory($ct,$kon,1,3) as $key => $c) { ?>	
											<?php 
												$date=$c['time'];
												$dt=strtotime($date);
												$day=date("d",$dt);
												$month=date("m",$dt);
												$year=date("Y",$dt);
												$kategori=$c['kategori_seo'];
												$seo=$c['judul_seo'];

											 ?>
											<div class="flex-wr-sb-s m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															<?=$c['nama_kategori'] ?>
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															<?php
															$dt=$c['time'];
															echo dateTumbnail($dt); ?>
														</span>
													</span>
												</div>
											</div>
										<?php } ?>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						
						</div>
						<?php  }?>
					<!-- //////////////MAIN CATEGORY//////////////// -->
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



<section class="bg0 p-t-60 p-b-35">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							Latest Articles
						</h3>
					</div>

					<div class="row p-t-35">
						<?php 
						foreach (getAllHighlitedNewsbyCategory(null,$kon,0,6) as $key => $a): ?>
						<?php 
							$date=$a['time'];
							$dt=strtotime($date);
							$day=date("d",$dt);
							$month=date("m",$dt);
							$year=date("Y",$dt);
							$kategori=$a['kategori_seo'];
							$seo=$a['judul_seo'];

						 ?>
							<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="wrap-pic-w hov1 trans-03">
									<img src="<?php $img=$a['gambar'];
														echo imagePost($img);  
													 ?>" alt="IMG"></a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?=$a['judul']; ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="<?=detailPostUrl($year,$month,$day,$seo_kategori_utama,$kategori,$seo);?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											Oleh. <?php echo $a['reporter']; ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

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
						
					</div>
				</div>

				<!-- ///////////SIDEBAR/////////// -->
				<?php 
						Standard2($kon); 
				 ?>
				<!-- ///////////SIDEBAR/////////// -->
			</div>
		</div>
</section>