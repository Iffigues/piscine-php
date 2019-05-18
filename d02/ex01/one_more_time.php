<?php

function fj($e) {
	$r = array("lundi","mardi","mercredi","jeudi","vendredi", "samedi","dimanche");
	foreach ($r as $t) 
		if ($t == $e)
			return (true);
	return (false);
}

function fg($e) {
	$r = array("janvier","fevrier","mars","avril","mai","juin","jullet","aout","septembre", "octobre","novembre", "decembre");
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

function day($e) {
	if (strlen($e) > 2 || !ctype_digit($e)) 
		return (false);
	return (true);
}

function years($e) {
	if (strlen($e) != 4 || !ctype_digit($e))
		return (false);
	return (true);
}

function heures($e) {
	$i =explode(":",$e);
	if (count($i))
		return (false);
	foreach ($i as $d)
		if (count($d) != 2 || !ctype_digit($d))
			return (false);
	return (true);
}

if ($argc == 2) {
	$world = str_word_count($argv[1]);
	if ($world == 5) {
		$i = explode(" ",$argv[1]);
		if (count($i) == 5){
			$day = jour($i[0], 0);
			$nb = day($i[1]);
			$month = jour($i[2], 1);
			$year = years($i[3]);
			$heure = heures($i[4]);
		}
	}
}
