<?php

function fj($e) {
	$r = array("lundi","mardi","mercredi","jeudi","vendredi", "samedi","dimanche");
	foreach ($r as $t) 
		if ($t == $e)
			return (true);
	return (false);
}

function jour($e, $y) {
	if (!ctype_alpha($e))
		return (false);
	$e = lcfirst($e);
	if (!ctype_lower($e))
		return (false);
	if ($y == 1)
		return (fj($e));
	return (fj($e));
}

if ($argc == 2) {
	$world = str_word_count($argv[1]);
	if ($world == 5) {
		$i = explode(" ",$argv[1]);
		if (count($i) == 5){
			$day = jour($i[0], 0);
		}
	}
}
