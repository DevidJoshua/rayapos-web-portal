<?php include 'action_highlights.php'; ?>
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
	<?php foreach (getAllHighlitedNewsCategory($kon,0,1) as $key => $hg) {?>
		<?php 
			$date=$hg['time'];
			$dt=strtotime($date);
			$day=date("d",$dt);
			$month=date("m",$dt);
			$year=date("Y",$dt);
			$kategori=$hg['kategori_seo'];
			$seo=$hg['judul_seo'];
		?>
		<?php  $image=$hg['gambar']; ?>
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(<?=imagePost($image); ?>);">
						<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								<?=$hg['nama_kategori']; ?>
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
									<?=$hg['judul']; ?>
								</a>
							</h3>

							<span class="how1-child2">
								<?php if($hg['reporter']!=null){?>
									<span class="f1-s-4 cl11">
										<?=$hg['reporter']; ?>
									</span>

									<span class="f1-s-3 cl11 m-rl-3">
										-
									</span>
								<?php } ?>

								<span class="f1-s-3 cl11">
									<?php
									$dt=$hg['time'];
									echo shortDateIna($dt);
									 ?>
								</span>
							</span>
						</div>
					</div>
				</div>
	<?php } ?>
				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
					<?php foreach (getAllHighlitedNewsCategory($kon,1,1) as $key => $hg) {?>
					<?php 
						$date=$hg['time'];
						$dt=strtotime($date);
						$day=date("d",$dt);
						$month=date("m",$dt);
						$year=date("Y",$dt);
						$kategori=$hg['kategori_seo'];
						$seo=$hg['judul_seo'];
					?>
					<?php  $image=$hg['gambar']; ?>
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(<?=imagePost($image); ?>);">
								<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										<?=$hg['nama_kategori']; ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
											<?=$hg['judul'];?>
										</a>
									</h3>
								</div>
							</div>
						</div>
					<?php } ?>
					<?php foreach (getAllHighlitedNewsCategory($kon,2,2) as $key => $hg) {?>
					<?php  $image=$hg['gambar']; ?>
					<?php 
						$date=$hg['time'];
						$dt=strtotime($date);
						$day=date("d",$dt);
						$month=date("m",$dt);
						$year=date("Y",$dt);
						$kategori=$hg['kategori_seo'];
						$seo=$hg['judul_seo'];
					?>
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(<?=imagePost($image); ?>);">
								<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										<?=$hg['nama_kategori']; ?>
									</a>
									<h3 class="how1-child2 m-t-14">
										<a href="<?=detailPostUrl($year,$month,$day,$hg['seo_utama'],$kategori,$seo);?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?=$hg['judul']; ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>
				<?php include 'Breaking_News/breaking_news.php'; ?>
			</div>
		</div>
	</section>