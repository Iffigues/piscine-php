#!/usr/bin/php
<?php
if ($f = fopen("/var/run/utmpx", "r")) {
	$struct = 'a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad';
	$a = array();
	date_default_timezone_set('Europe/paris');
	while ($read = fread($f, 628)) {
		$ph = unpack($struct, $read);
		if ($ph['type'] == 7)
			$a[$ph["line"]] = str_replace("\0","",$ph["user"]." ".$ph["line"]."  ".date("M j H:i", $ph["time1"])." \n");
	}
	ksort($a);
	foreach ($a as $d)
		echo $d;
}
