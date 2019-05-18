<?php

function have($e) {
	$i =  "/*-+1234567890";
	$e = preg_replace('/\s+/', '', $e);
	$r = str_split($e);
	foreach ($r as $t) {
		if (!strpos($i,$t))
			return (false);
	}
	return (true);
}

function num($r) {
	$e = "";
	$i = 0;
	if ($i < strlen($r))
		if ($r[$i] == '-' || $r[$i] == '+'){
			$i++;
			$e = $e . $r[0];
		}
	while ($i < strlen($r) && ctype_digit($r[$i])) {
		$e = $e . $r[$i];
		$i++;
	}
	return ($e);
}

if ($argc == 2 && have($argv[1])) {
	$e = trim($argv[1]);
	$final =  num($e);
	$e = trim(substr($e, strlen($final)));
	$op = $e[0];
	$e = trim(substr($e,1));
	echo "$e\n";
	$ff = num($e);
	echo "$ff\n";
	$e = trim(substr($e, strlen($ff)));
	echo ctype_digit($ff);
	if (is_numeric($final) && is_numeric($ff) && strlen($e) == 0 && strpos("/*-+",$op)) {
		echo "hahaha;\n";		
	}
}
?>
