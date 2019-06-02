#!/usr/bin/php
<?php
function ft_split($a) {
	$k = array_filter(explode(" ", $a));
	return (array_values($k));
};
function kk($a) {
	$t = ft_split($a);
	$e = count($t);
	$r = "";
	if ($e > 0) {
		foreach ($t as $key => $val) {
			if ($key == 0)
				$r = $val;
			else
				echo $val;
			if ($key > 0)
				echo " ";
		}
		echo "$r\n";
	}
};
if ($argc > 1)
	kk($argv[1]);
?>
