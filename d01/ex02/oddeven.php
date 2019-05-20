<?php

function oddeven($a) {
	return  ($a & 1);
}

function aff() {
	echo "Entrer un nombre: ";
	$handle = fopen ("php://stdin","r");
	$a = fgets($handle);
	if (empty($a))
		exit(0);
	fclose($handle);
	return (trim($a));
}

function readder() {
	while (1) {
		$handle = aff();
		if (ctype_digit($handle)) {
			echo "Le chiffre $handle est ";
			if ($handle == 0)
				exit(0);
			if (oddeven(intval($handle))) {
				echo "impair\n";
			}
			else
				echo "pair\n";
		}
		else
		 echo "'$handle' n'est pas un chiffre\n";
	}
}
readder();
?>
