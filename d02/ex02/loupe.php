#!/usr/bin/php
<?php

function lol($a) {
	$match = array();
	preg_match_all('/>(.*?)</', $a, $match);
	foreach($match[0] as $d) {
		if ($d != "><")
			$a = str_replace($d, strtoupper($d),$a);
	}
	return  ($a);
}

if ($argc == 2) {
	$fi = file_get_contents($argv[1], true);
	$ar = array();
	$file = str_replace("\n","^[[D^[[A^[[C^[[B^[[D",$fi);
	$r = preg_match_all("!<a(.*)>(.*)</a>!Ui",$file,$ar);
	if ($r)
		for ($i = 0; $i < $r; $i++) {
			$aa = $ar[0][$i];
			$b = array();
			$ar[0][$i] = str_replace($ar[0][$i], lol($ar[0][$i]), $ar[0][$i]);
			$ee = preg_match_all("!title=\"(.*)\"!Ui", $ar[0][$i], $b);
			for ($y = 0; $y < $ee; $y++) {
					$ty = $b[0][$y];
					$bb = str_replace($ty,'title="'.strtoupper($b[1][$y]).'"',$ty);
					$ar[0][$i] = str_replace($ty,$bb, $ar[0][$i]);
			}
			$file= str_replace($aa, $ar[0][$i],$file);
		}
	$file = str_replace("^[[D^[[A^[[C^[[B^[[D","\n",$file);
	echo "$file\n";
}
