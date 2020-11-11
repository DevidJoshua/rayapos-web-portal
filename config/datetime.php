<?php 
	date_default_timezone_set("Asia/Jakarta");

	function dateTumbnail($timestamp)
	{ $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );        // value 60 is seconds  
      $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
      $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
      $weeks        = round($seconds / 604800);     // 7*24*60*60;  
      $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
      $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60) {  
       return "Baru saja";  
      } else if($minutes <=60) {  
       if($minutes==1){  
         return "satu menit lalu";  
       }else {  
         return "$minutes menit lalu";  
       }  
      } else if($hours <=24) {  
       if($hours==1) {  
         return "Sejam lalu";  
       } else {  
         return "$hours jam lalu";  
       }  
      }else if($days <= 7) {  
       if($days==1) {  
         return "Kemarin";  
       }else {  
         return "$days hari lalu";  
       }  
      }else if($weeks <= 4.3) {  //4.3 == 52/12
       if($weeks==1){  
         return "Seminggu lalu";  
       }else {  
         return "$weeks minggu lalu";  
       }  
      } else if($months <=12){  
       if($months==1){  
         return "Sebulan lalu";  
       }
       else{  
         return "$months bulan lalu";  
       }  
      }else {  
       if($years==1){  
         return "Setahun lalu";  
       }else {  
         return "$years tahun lalu";  
       }  
      }  
		
	}
	function shortDateIna($date)
	{
		$dt=strtotime($date);
		$month=date('F',$dt);
		$day=date('d',$dt);
		$year=date('Y',$dt);
		return $day.' '.shortMonthIna($month).' '.$year; 
	}

	function dayIna($day)
	{
		switch ($day) {
			case 'Sun':
				return "Minggu";
			break;
	 
			case 'Mon':			
				return "Senin";
			break;
	 
			case 'Tue':
				return "Selasa";
			break;
	 
			case 'Wed':
				return "Rabu";
			break;
	 
			case 'Thu':
				return "Kamis";
			break;
	 
			case 'Fri':
				return "Jumat";
			break;
	 
			case 'Sat':
				return "Sabtu";
			break;
			
			default:
				return "Tidak di ketahui";		
			break;
		}
	}
	function monthIna($month)
	{
		switch ($month) {
			case 'January':
					return 'Januari';
				break;
			case 'February':
					return 'Febuari';
				break;
			case 'March':
					return 'Maret';
				break;
			case 'April':
					return 'April';
				break;
			case 'May':
					return 'Mei';
				break;
			case 'June':
					return 'Juni';
				break;
			case 'July':
					return 'Juli';
				break;
			case 'August':
					return 'Agustus';
				break;
			case 'September':
					return 'September';
				break;
			case 'October':
					return 'Oktober';
				break;
			case 'November':
					return 'November';
				break;
			case 'December':
					return 'Desember';
				break;
			default:
				# code...
				break;
		}
	}
	function shortMonthIna($month)
	{
		switch ($month) {
			case 'January':
					return 'Jan';
				break;
			case 'February':
					return 'Feb';
				break;
			case 'March':
					return 'Mar';
				break;
			case 'April':
					return 'Apr';
				break;
			case 'May':
					return 'Mei';
				break;
			case 'June':
					return 'Jun';
				break;
			case 'July':
					return 'Jul';
				break;
			case 'August':
					return 'Ags';
				break;
			case 'September':
					return 'Sept';
				break;
			case 'October':
					return 'Okt';
				break;
			case 'November':
					return 'Nov';
				break;
			case 'December':
					return 'Des';
				break;
			default:
				# code...
				break;
		}
	}
?>