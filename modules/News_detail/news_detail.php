
<style type="text/css">
	iframe{
		width: 100%;
	}
</style>

<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<?php foreach (getNewsDetail($kon,$tahun,$bulan,$hari,$kategori,$seo_berita) as $key => $news) {?>
						<title><?=$news['judul']; ?></title>
						<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<?php if($news['kategori_seo'] != NULL){?>
								<br>
								<br>
								<a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
								<font size="5pt" color="<?=$news['warna_teks_utama'];?>" style="padding: 5px;background-color:<?=$news['warna_utama']?>; ?>"><?=$news['nama_kategori'];?></font>
								</a>
							<?php } ?>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
								<?=$news['judul'];?>
							</h3>

							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										<?php 
												if($news['nama_reporter'] != null )
												{
													echo 'oleh. '.$news['nama_reporter'];
													echo "<span class='m-rl-3'>-</span>";
												}

										 ?>
									</a>

									<span>
										<?=$news['Thetime']; ?>
									</span>
								</span>

							

								<!-- <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									0 Comment
								</a> -->
							</div>

							<div class="wrap-pic-max-w p-b-30">
								<img src="<?=imagePost($news['gambar']) ?>" style="width: 100%;" alt="IMG">
								<div style="padding:5px;background-color: #1111;"><font style="margin:5px; font-size: 12px;" ><i><?=$news['keterangan_gambar']; ?></i></font></div>
							</div>
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>
								<?php 	 
										 $url=detailPostUrl($tahun,$bulan,$hari,$seo_kategori_utama,$kategori,$seo_berita);
										 $twitter= 'https://twitter.com/intent/tweet?text=hii&amp;url='.$url;
                                         $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&mini=true';
                                         $whatsapp = 'https://wa.me/?text='.$url;
                                         $linkedIn = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url;
								 ?>
								<div class="flex-wr-s-s size-w-0">
									<a href="<?=$facebook; ?>" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$facebook; ?>,'facebook','width=600,height=400')">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="<?=$twitter; ?>" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$twitter; ?>,'twitter','width=600,height=400')">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>
									<a href="<?=$whatsapp; ?>" class="dis-block f1-s-13 cl0 bg-whatsapp borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$whatsapp; ?>,'whatsapp','width=600,height=400')">
										<i class="fab fa-whatsapp m-r-7"></i>
										Whatsapp
									</a>
									<a href="<?=$linkedin; ?>"  class="dis-block f1-s-13 cl0 bg-linkedin borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$linkedIn; ?>,'linkedin','width=600,height=400')">
										<i class="fab fa-linkedin m-r-7"></i>
										Linkedin
									</a>
								</div>
							</div>
							<style type="text/css">
								p{
									margin-top: 1em;
								}
							</style>
							<?php echo htmlspecialchars_decode($news['isi_berita']);?>
							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tag:
								</span>

								<div class="flex-wr-s-s size-w-0">
									<?php  
										$tags = $news['tag'];
										$etag = explode(" ", $tags);
										for ( $i = 0; $i < count( $etag ); $i++ ) {
											echo "<a href='";
											echo tagsUrl($etag[$i]);
											echo "' class='f1-s-12 cl8 hov-link1 m-r-15'>";
											echo str_replace(',', '', $etag[$i]);
											echo "</a>";
										}
									?>
								</div>
							</div>

							<!-- Share -->
							<div class="flex-wr-s-s size-w-0">
									<a href="<?=$facebook; ?>" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$facebook; ?>,'facebook','width=600,height=400')">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="<?=$twitter; ?>" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$twitter; ?>,'twitter','width=600,height=400')">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>
									<a href="<?=$whatsapp; ?>" class="dis-block f1-s-13 cl0 bg-whatsapp borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$whatsapp; ?>,'whatsapp','width=600,height=400')">
										<i class="fab fa-whatsapp m-r-7"></i>
										Whatsapp
									</a>
									<a href="<?=$linkedIn; ?>"  class="dis-block f1-s-13 cl0 bg-linkedin borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03" target="popup" onclick="window.open(<?=$linkedIn; ?>,'linkedin','width=600,height=400')">
										<i class="fab fa-linkedin m-r-7"></i>
										Linkedin
									</a>
								</div>
						</div>

						<!-- Leave a comment -->
						<!-- <div>
							<h4 class="f1-l-4 cl3 p-b-12">
								Leave a Comment
							</h4>

							<p class="f1-s-13 cl8 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							<form>
								<textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

								<input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

								<button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
									Post Comment
								</button>
							</form>
						</div> -->
					</div>
				<?php } ?>
				</div>
				<?php 
					/////////SIDEBAR/////////
					$utama=$news['id_utama'];
					$tags = $news['tag'];
					$id_kat= $news['id_kategori'];
					NewsDetail($kon,$utama,$id_kat);
					/////////SIDEBAR////////
				 ?>
			</div>
		</div>
	</section>