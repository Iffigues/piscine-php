#!/usr/bin/php
<?php 
if ($argc > 1) {
	$a =  trim(preg_replace('!\s+!', ' ', $argv[1]));
	echo "$a\n";
}
?>
