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
	foreach ($r as $ee => $t) 
		if ($t == $e)
			return ($ee);
	return (0);
}

function jour($e, $y) {
	if (!ctype_alpha($e))
		return (false);
	$e = lcfirst($e);
	if (!ctype_lower($e))
		return (false);
	if ($y)
		return (fg($e));
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
	if (count($i) != 3)
		return (false);
	foreach ($i as $d)
		if (strlen($d) != 2 || !ctype_digit($d))
			return (false);
	return (true);
}

if ($argc == 2) {
	$world = str_word_count($argv[1],1, "0123456789:");
	if (count($world) == 5) {
		$i = explode(" ",$argv[1]);
		if (count($i) == 5){
			$day = jour($i[0], 0);
			$nb = day($i[1]);
			$month = jour($i[2], true);
			$year = years($i[3]);
			$heure = heures($i[4]);
			if ($day && $nb && $month && $year && $heure) {
				date_default_timezone_set('Europe/Paris');
				$bb = explode(":",$i[4]);
				echo mktime(intval($bb[0]), intval($bb[1]), intval($bb[2]), $month, intval($i[1]) , intval($i[3]));
				echo "\n";
				exit(0);
			}
		}
	}
}
echo "Wrong Format\n";
