<?php

function enl($a) {
	$a = preg_replace('/\s+/', '', $a);
	return ($a);
}

function cal($a) {
	$r = array("/", "*", "-", "+", "0","1", "2","3","4","5","6","7","8","9");
	$e = str_split($a);
	foreach ($e as $d) {
		$i = 0;
		foreach ($r as $t)
			if ($t == $d)
				$i = $i + 1;
		echo "$i\n";
		if ($i == 0)
			return (false);
	}
	return (true);
}

function cou($c) {
	$r = array("-","+","/","*");
	$a = str_split($c);
	$i = 0;
	foreach ($r as $d )
		foreach ($a as $t)
			if ($t == $d)
				$i = $i + 1;;
	return ($i == 1);
}

if ($argc == 2) {
	$a = enl($argv[1]);
	if (cal($a) && cou($a)){
		eval("\$a = $a; echo \$a;");
	} else {
		echo "RR";
	}

} else {
	echo "?";
}

?>
