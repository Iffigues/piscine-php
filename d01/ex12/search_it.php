<?php

if ($argc > 2){
	$a = "";
	$r = $argv[1];
	foreach ($argv as $k => $d)
		if ($k > 1) {
			$b = array_values(array_filter(explode(':',$d)));
			if (count($b) == 2)
				if ($b[0] == $r)
					$a = $b[1];
		}
	if ($a != "")
		echo "$a\n";
} 
