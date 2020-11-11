<?php 
	function rest_helper2($url, $optionalheaders, $verb = 'GET', $format = 'json')
	{
	  $cparams = array(
	    'http' => array(
	      'method' => $verb,
	      'ignore_errors' => true
	    )
	  );
	  // if ($params !== null) {
	  //   $params = http_build_query($params);
	  //   if ($verb == 'POST') {
	  //     $cparams['http']['content'] = $params;
	  //   } else {
	  //     $url .= '?' . $params;
	  //   }
	  // }
	  // if ($optional_headers !== null) {
	  //   $params['http']['header'] = $optional_headers;
	  // }

	  $context = stream_context_create($cparams);
	  $fp = fopen($url, 'rb', false, $context);
	  if (!$fp) {
	    $res = false;
	  } else {
	    // If you're trying to troubleshoot problems, try uncommenting the
	    // next two lines; it will show you the HTTP response headers across
	    // all the redirects:
	    // $meta = stream_get_meta_data($fp);
	    // var_dump($meta['wrapper_data']);
	    $res = stream_get_contents($fp);
	  }

	  if ($res === false) {
	    throw new Exception("$verb $url failed: $php_errormsg");
	  }

	  switch ($format) {
	    case 'json':
	      $r = json_decode($res);
	      if ($r === null) {
	        throw new Exception("failed to decode $res as json");
	      }
	      return $r;

	    case 'xml':
	      $r = simplexml_load_string($res);
	      if ($r === null) {
	        throw new Exception("failed to decode $res as xml");
	      }
	      return $r;
	  }
	  return $res;
	}
	$arr=json_decode(rest_helper2("http://newsapi.org/v2/top-headlines?country=id&category=business&apiKey=6f804b18c5894eec917a225097015ae9",null,null,'GET',null));
 ?>

<?php if(isset($arr->status) != 'ok') {?>
	<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8" style="background-color:black;width:'100%'">
		<marquee style="color:white;"> Mencegah penularan COVID-19:  &nbsp; &nbsp; &nbsp; 1. Cuci tangan sesering mungkin | 2. Jaga jarak | 3. Hindari menyentuh mata, hidung, dan mulut | 4. Lakukan kebersihan pernafasan | 5. Jika mengalami demam, batuk, dan kesulitan bernapas, cari perawatan medis sejak dini | 5. Gunakan masker untuk keluar | 6. Tetap update dan ikuti saran medis </marquee>
	</div>
<?php }else{
	echo "<div class='bg0 flex-wr-sb-c p-rl-20 p-tb-8' style='background-color:black;width:100%'>
			<div class='row'>
				<b>Top Headlines Indonesia</b>
				<marquee>";
			foreach ($arr->articles as $key => $bn) {
				if($key%2==0)
				{
					echo "<b style='color:#fcba03'>".preg_replace('/(([a-z]+)\.com)/i', "", $bn->title),"&nbsp;&nbsp;|&nbsp;&nbsp;"."</b>";
				}
				else
				{
					echo "<b style='color:white'>".preg_replace('/(([a-z]+)\.com)/i', "", $bn->title),"&nbsp;&nbsp;|&nbsp;&nbsp;"."</b>";
				}
			}
		
	echo "	</marquee>
			</div>
		</div>";
	}
 ?>
 	
