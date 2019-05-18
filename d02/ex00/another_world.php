<?php 

if ($argc > 1) {
	$a = preg_replace('!\s+!', ' ', $argv[1]);
	echo "$a\n";
}
?>
