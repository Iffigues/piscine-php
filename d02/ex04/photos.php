<?php

function remove_http($url) {
   $disallowed = array('https://', 'http://');
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}

function good($file) {
	$file_headers = @get_headers($file);
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    	return (false);
	}
	else {
    	return (true);
	}
}

if ($argc > 1) {
	if (good($argv[1])) {
	if ($content = file_get_contents($argv[1])) {
		$result = array();
		$dir = remove_http($argv[1]);
		$src = parse_url($argv[1]);
		if (!file_exists($dir))
			mkdir($dir);
		preg_match_all('/<img[^>]+>/i',$content, $result);	
		foreach ($result[0] as $img) {
				$ar = array();
				preg_match( '@src="([^"]+)"@' , $img, $ar);
				if ($ar[1]) {
					$e = parse_url($ar[1]);
					if (!isset($e["scheme"])) {
						$b = $src["scheme"]."://" . $src["host"];
						if (isset($src["path"]))
							$b = $b.$src["path"];
						$b = $b."/./";
						$ar[1] = $b.$e["path"];
					}
					echo "$ar[1]\n";
					echo $e["path"]."\n";
				}
			}
		}
	}
}

