<?php include 'action_front_page.php'; ?>

<?php include 'highlights.php'; ?>
<section class="bg0 p-t-60 p-b-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<!-- <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							Latest Articles
						</h3>
					</div> -->

					<div class="row p-t-35">
						<?php 
						foreach (getAllHighlitedNewsbyCategory(null,$kon,4,12) as $key => $a): ?>
							<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="<?php 
								$date=$a['time'];
								$dt=strtotime($date);
								$day=date("d",$dt);
								$month=date("m",$dt);
								$year=date("Y",$dt);
								$kategori=$a['seo_kategori'];
								$seo=$a['judul_seo'];
								echo detailPostUrl($year,$month,$day,$a['seo_utama'],$kategori,$seo); ?>" class="wrap-pic-w hov1 trans-03">
									<img src="<?php $img=$a['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG"></a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="<?=detailPostUrl($year,$month,$day,$a['seo_utama'],$kategori,$seo);?>" class="f1-m-3 cl2 hov-cl10 trans-03">
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
						<a href="#" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03">
							Load More
						</a>	
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
<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<!-- Entertainment -->
					<!-- //////////////MAIN CATEGORY//////////////// -->
				<?php foreach (getMainCategory($kon) as $key => $a) {?>
					<style type="text/css">
						<?php echo " 
							.how2-cp".$a['id_kategori']."::before {
					  		background-color:  ".$a['warna_kategori_utama']."; 
							}";
						?>
						<?php echo "
							.cp".$a['id_kategori']." {
							color: ".$a['warna_kategori_utama'].";
							}
						"; 
						?>
					</style>
					
					<div class="tab01 p-b-20">
							<!-- /////////////////CATEGORY///////////////// -->
						<?php echo "<div class='tab01-head how2 how2-cp".$a['id_kategori']." bocl12 flex-s-c m-r-10 m-r-0-sr991'>"; ?>
								<!-- Brand tab -->
								<?php echo "<h3 class='f1-m-2 cp".$a['id_kategori']." tab01-title'>"; ?>
									<?=$a['nama_kategori_utama']; ?>
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab0-<?=$a['id_kategori']; ?>" role="tab">All</a>
									</li>
									<?php 
										$id=$a['id_kategori'];
										foreach (getNewsCategory($id,$kon) as $key => $b) {
											echo "
											<li class='nav-item'>
												<a class='nav-link' data-toggle='tab' href='#tab".$b['id_kategori_berita']."-".$a['id_kategori']."' role='tab'>".$b['nama_kategori']."</a>
											</li>";

										}
									?>


									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">

											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href="<?php
								$maincat=$a['seo_kategori_utama'];
								mainCategoryUrl($maincat); ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
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
											$ct=$a['id_kategori']; 
											foreach (getAllHighlitedNewsbyCategory($ct,$kon,0,1) as $key => $c) { 
											$date=$c['time'];
											$dt=strtotime($date);
											$day=date("d",$dt);
											$month=date("m",$dt);
											$year=date("Y",$dt);
											$kategori=$c['seo_kategori'];
											$seo=$c['judul_seo'];
												?>	
											<div class="m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo);?>" class="wrap-pic-w hov1 trans-03">
													<img src="
													<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?php 
								$ct=$c['seo_kategori'];
								echo subCategoryUrl($maincat,$ct); ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
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
											$cat=$a['id_kategori']; 
											foreach (getAllHighlitedNewsbyCategory($cat,$kon,1,3) as $key => $c) { ?>	
											<div class="flex-wr-sb-s m-b-30">
												<a href="<?php 
											$date=$c['time'];
											$dt=strtotime($date);
											$day=date("d",$dt);
											$month=date("m",$dt);
											$year=date("Y",$dt);
											$kategori=$c['seo_kategori'];
											$seo=$c['judul_seo'];
											echo detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo); ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo);?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="<?php 
								$ct=$c['seo_kategori'];
								echo subCategoryUrl($maincat,$ct); ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
							$id=$a['id_kategori'];
							foreach (getNewsCategory($id,$kon) as $key => $b) { ?>
								<?php echo "<div class='tab-pane fade' id='tab".$b['id_kategori_berita']."-".$id."' role='tabpanel'>"; ?>
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<?php
											$ct=$b['id_kategori_berita']; 
											foreach (getAllNewsbyMainCategory($ct,$kon,0,1) as $key => $c) { 
											$date=$c['time'];
											$dt=strtotime($date);
											$day=date("d",$dt);
											$month=date("m",$dt);
											$year=date("Y",$dt);
											$kategori=$c['seo_kategori'];
											$seo=$c['judul_seo'];

												?>	
											<div class="m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo);?>" class="wrap-pic-w hov1 trans-03">
													<img src="
													<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo);?>" class="f1-m-3 cl2 hov-cl10 trans-03">
															<?=$c['judul']; ?>
														</a>
													</h5>

													<span class="cl8">
														<?php 
															$cat=$c['seo_kategori'];
														 ?>
														<a href="<?=subCategoryUrl($maincat,$cat); ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
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
												$kategori=$c['seo_kategori'];
												$seo=$c['judul_seo'];

											 ?>
											<div class="flex-wr-sb-s m-b-30">
												<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo);?>" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="<?php 
														$img=$c['gambar'];
														echo imagePost($img);
													 ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="<?=detailPostUrl($year,$month,$day,$a['seo_kategori_utama'],$kategori,$seo);?>" class="f1-s-5 cl3 hov-cl10 trans-03">
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
						Standard2($kon);
					?>
				<!-- ///////////SIDEBAR/////////// -->
			</div>
		</div>
</section>

