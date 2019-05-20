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

if ($argc == 2) {
	if (have($argv[1])) {
	$e = trim($argv[1]);
	$final =  num($e);
	$e = trim(substr($e, strlen($final)));
	$op = $e[0];
	$e = trim(substr($e,1));
	$ff = num($e);
	$e = trim(substr($e, strlen($ff)));
	if (is_numeric($final) && is_numeric($ff) && strlen($e) == 0 && strpos("/*-+",$op)) {
		if ($op == "/"){
			if (intval($ff) == "0")
				echo "Maybe is bad";
			else 
				echo intval($final) / intval($ff);
		}
		if ($op == "*") 
			echo intval($final) * intval($ff);
		if ($op == '-') 
			echo intval($final) - intval($ff);
		if ($op == "+") 
			echo intval($final) + intval($ff);	
		} else {
		 echo "Syntax Error";
	}
	}else
		echo "Syntax Error";
}else 
	echo "Incorrect Parameters";
echo "\n";
?>
