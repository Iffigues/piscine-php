<?php
if ($argc == 2){
	$file = file_get_contents($argv[1], true);
	$ar = array();
	$r = preg_match_all("!<a(.*)>(.*)</a>!Ui",$file,$ar);
	if ($r) {
		for ($i = 0; $i < $r; $i++) {
			$aa = $ar[0][$i];
			$b = array();
			$ar[0][$i] = str_replace(">".$ar[2][$i]."<",">".strtoupper($ar[2][$i])."<", $ar[0][$i]);
			$ee = preg_match("!title=\"(.*)\"!Ui", $ar[1][$i], $b);
			if ($ee) {
				$ty = $b[0];
				$b[0] = str_replace($b[1],strtoupper($b[1]),$b[0]);
				$ar[0][$i] = str_replace($ty,$b[0], $ar[0][$i]);
			}
			$file= str_replace($aa, $ar[0][$i],$file);
		}
	}
	echo "$file\n";
}
