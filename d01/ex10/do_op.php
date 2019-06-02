#!/usr/bin/php
<?php
function enl($a) {
	$a = preg_replace('/[\x00-\x1F\x7F]/u', '', $a);
	return ($a);
};
if ($argc == 4) {
	$a = enl($argv[1]);
	$b = enl($argv[2]);
	$c = enl($argv[3]);
	eval("\$a = $a $b $c; echo \$a;");
} else 
	echo "Incorrect Parameters";
echo "\n";
?>
