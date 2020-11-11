<?php 
	
	switch ($ad) {
		case 'P300x600':
				echo "
					<div class='flex-c-s p-t-8'>
						<a href='#'>
							<img class='max-w-full' src='".asset('images/banner-02.jpg')."' alt='IMG'>
						</a>
					</div>
				";
			break;
		case 'L728x90':
				echo "
					<div class='banner-header'>
					<a href='#'><img src='".asset('images/banner-01.jpg')."' alt='IMG'></a>
					</div>
				";
			break;
		case '':
			# code...
			break;
		default:
			# code...
			break;
	}

 ?>