<?php

function enl($a) {
	$a = preg_replace('/[\x00-\x1F\x7F]/u', '', $a);
	return ($a);
}

function cal($a) {
	$r = array("/", "*", "-", "+");
	$e = str_split($a);
	foreach ($r as $d) 
		foreach ($e as $t)
			if ($t != $d)
	return (true);
}

if ($argc == 4) {
	$a = enl($argv[1]);
	$b = enl($argv[2]);
	$c = enl($argv[3]);
	if (ctype_digit($a) && ctype_digit($c) && cal($b)){
		eval("\$a = $a $b $c; echo \$a;");
	}

} else {

}

?>
