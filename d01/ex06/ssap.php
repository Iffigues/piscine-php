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
	foreach ($argv as $key => $ar) {
		if ($key != 0) {
			$r = ft_split(epure($ar));
			foreach ($r as $va) {
				array_push($a, $va);
			}
		}
	}
	asort($a);
	$a = array_values($a);
	foreach ($a as $m) {
		echo "$m\n";
	}
	
}
getPar($argv);
?>
