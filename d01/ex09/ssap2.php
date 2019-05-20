<?php
function ft_split($a) {
	$k = array_filter(explode(" ", $a));
	return (array_values($k));
};

function epure($a) {
	$output = preg_replace('!\s+!', ' ', $a);
	$r = trim($output, " ");
	return ($r);
}

function getPar($argv) {
	$a = [];
	foreach ($argv as $key => $ar)
		if ($key > 0) {
			$r = ft_split(epure($ar));
			foreach ($r as $va) {
				array_push($a, $va);
			}
		}
	$a = array_values($a);
	return ($a);
}


function getAlpha($a) {
	$b = [];
	foreach ($a as $d) {
		if (ctype_alpha($d))
			array_push($b,$d);
	}
	usort($b, "strcasecmp");
	return ($b);
}

function getOther($a) {
	$b = [];
	foreach ($a as $d) {
		if (!ctype_digit($d) && !ctype_alpha($d))
			array_push($b, $d);
	}
	usort($b, "strcasecmp");
	return ($b);
}

function getNum($a) {
	$b = [];
	foreach ($a as $d) {
		if (ctype_digit($d))
			array_push($b, $d);
	}
	usort($b, "strcasecmp");
	return ($b);
}

function aff(...$a) {
	foreach ($a as $d) {
		foreach ($d as $r) {
			echo "$r\n";
		}
	}
}

function getlar($a) {
	$b = getPar($a);
	$c = getAlpha($b);
	$d = getNum($b);
	$e = getOther($b);
	aff($c,$d,$e);
}

getlar($argv);
?>
