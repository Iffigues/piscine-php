<?php

if ($argc == 2) {
	$output = preg_replace('!\s+!', ' ', $argv[1]);
	$r = trim($output, " ");
	echo "$r\n";
}
