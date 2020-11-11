<?php include 'action_data_covid.php'; ?>

<?php 

	$arr=json_decode(rest_helper("https://api.kawalcorona.com/indonesia",null,null,'GET',null));
	$positif=$arr[0]->positif;
	$sembuh=$arr[0]->sembuh;
	$meninggal=$arr[0]->meninggal;
	$dirawat=$arr[0]->dirawat;
?>

<div class="p-t-50">
		<div class="how2 how2-cl4 flex-s-c">
			<h3 class="f1-m-2 cl3 tab01-title">
				Pantau corona Indonesia
			</h3>
		</div>

		<ul class="p-t-10 p-b-20">
			<li class="flex-wr-sb-c m-b-5" style="background-color: #007000;border-radius: 5px;"> 
				<div class="size-w-3 flex-wr-sb-c" style="margin-left: 5px;margin-right:5px;">
					<span class="f1-s-8 cl3 " style="margin-left: 10;color: white;">
						<?=$sembuh; ?>
					</span>

					<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03" style="color: white">
						Sembuh
					</a>
				</div>
			</li>

			<li class="flex-wr-sb-c m-b-5" style="background-color: #D2222D;border-radius: 5px"> 
				<div class="size-w-3 flex-wr-sb-c" style="margin-left: 5px;margin-right:5px;">
					<span class="f1-s-8 cl3 " style="margin-left: 10;color: white;">
						<?=$positif; ?>
					</span>

					<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03" style="color: white">
						Positif
					</a>
				</div>
			</li>

			<li class="flex-wr-sb-c m-b-5" style="background-color: #fcba03;border-radius: 5px;"> 
				<div class="size-w-3 flex-wr-sb-c" style="margin-left: 5px;margin-right:5px;">
					<span class="f1-s-8 cl3 " style="margin-left: 10;">
						<?=$dirawat; ?>
					</span>

					<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03" >
						Dirawat
					</a>
				</div>
			</li>
			
			<li class="flex-wr-sb-c m-b-5" style="background-color: black;border-radius: 5px"> 
				<div class="size-w-3 flex-wr-sb-c" style="margin-left: 5px;margin-right:5px;">
					<span class="f1-s-8 cl3 " style="margin-left: 10;color: white;">
						<?=$meninggal; ?>
					</span>

					<a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03" style="color: white">
						Meninggal
					</a>
				</div>
			</li>
			<i>Sumber API: https://kawalcorona.com/api/</i>
		</ul>

	</div>