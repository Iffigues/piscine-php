<?php
function ft_split($a) {
	$k = array_filter(explode(" ", $a));
	return (array_values($k));
};

function kk($a) {
	$t = ft_split($a);
	$e = count($t);
	if ($e > 0) {
		$tmp = $t[0];
		$t[0] = $t[$e - 1];
		$t[$e - 1] = $tmp;
		foreach ($t as $key => $val) {
			echo $val;
			if ($key < $e - 1) {
				echo " ";
			}
		}
		echo "\n";
	}

}

if ($argc > 1) {
	kk($argv[1]);
}

?>
