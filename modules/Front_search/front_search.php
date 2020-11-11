<?php 
	
	include 'action_front_search.php';
	$breadcumb='search';
	include './modules/Basic/breadcumb.php';
?>

<div class="container p-t-4 p-b-40">
	<h2 class="f1-l-1 cl2">
		Result for "<?=$_GET['query']; ?>"
	</h2>
</div>
<br>
<br>
<section class="bg0 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="p-r-10 p-r-0-sr991">
						<div class="m-t--40 p-b-40">
							<!-- Item post -->
								<?php foreach (searchNews($kon,$_GET['query']) as $key => $b) { 

									$date=$b['time'];
									$dt=strtotime($date);
									$day=date("d",$dt);
									$month=date("m",$dt);
									$year=date("Y",$dt);
									$kategori=$b['kategori'];
									$seo=$b['judul_seo'];
									?>
									<div class="flex-wr-sb-s p-t-10 p-b-5 how-bor2">
										<div class="size-w-9 w-full-sr575 ">
											<h5 class="p-b-12">
												<a href="<?=detailPostUrl($year,$month,$day,$b['seo_utama'],$kategori,$seo);?>" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
													<?=$b['judul']; ?>
												</a>
											</h5>

											<div class="cl8 p-b-18">
												<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
													<?php if(empty($b['reporter']))
													{
														echo "No author";
													} 
													else
													{
														echo $b['reporter'];
													}
													?>
												</a>

												<span class="f1-s-3 m-rl-3">
													-
												</span>

												<span class="f1-s-3">
													<?=shortDateIna($date).' '.$year ?>
												</span>
											</div>
										</div>
									</div>
								<?php } ?>

						</div>
					</div>
				</div>
				<?php Standard($kon) ?>
			</div>
		</div>
	</section>
