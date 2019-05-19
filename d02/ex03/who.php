<?php

if ($f = fopen("/var/run/utmpx", "r")) {
	$struct = 'a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad';
	$a = array();
	date_default_timezone_set('Europe/paris');
	while ($read = fread($f, 628)) {
		$ph = unpack($struct, $read);
		if ($ph['type'] == 7 && strcmp(trim($ph['user']), get_current_user()) == 0)
			$a[$ph["line"]] = $ph["user"]." ".$ph["line"]."  ".date("M j H:i", $ph["time1"])."\n";
	}
	if (ksort($a)) 
		foreach ($a as $d)
			echo $d;
}
