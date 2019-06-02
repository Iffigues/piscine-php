#!/usr/bin/php
<?php
function remove_http($url) {
   $disallowed = array('https://', 'http://');
   foreach($disallowed as $d)
      if(strpos($url, $d) === 0)
         return str_replace($d, '', $url);
   return $url;
};
function good($file) {
	$file_headers = @get_headers($file);
	if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found')
    	return (false);
	else 
    	return (true);
};
function get_name($e) {
	$path_parts = pathinfo($e);
	$e = $path_parts['filename'];
	if (isset($path_parts['extension']))
		$e = $e . "." . $path_parts['extension'];
	return ($e);
};
if ($argc > 1) {
	if (good($argv[1]))
		if ($content = file_get_contents($argv[1])) {
			$result = array();
			$dir = remove_http($argv[1]);
			$src = parse_url($argv[1]);
			if (!file_exists($src['host']))
				mkdir($src[host]);
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
					$name = get_name($ar[1]);
					copy($ar[1], $src["host"]."/$name");
				}
			}
		}
}

