<?php

function enl($a) {
	$a = preg_replace('/[\x00-\x1F\x7F]/u', '', $a);
	return ($a);
}

function cal($a) {
	$r = array("/", "*", "-", "+");
	$e = str_split($a);
	if (count($e) != 1)
		return (false);
	foreach ($r as $d) 
		if ($d == $e[0])
			return (true);
	return (true);
}





if ($argc == 4) {
	$a = enl($argv[1]);
	$b = enl($argv[2]);
	$c = enl($argv[3]);
	eval("\$a = $a $b $c; echo \$a;");

} else {

}

?>
