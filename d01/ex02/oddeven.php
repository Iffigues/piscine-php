<?php

function oddeven($a) {
	return  ($a & 1);
}

function aff() {
	echo "Entrer un nombre: ";
	$handle = fopen ("php://stdin","r");
	return (trim(fgets($handle)));
}

function readder() {
	while (1) {
		$handle = aff();
		if (ctype_digit($handle)) {
			echo "Le chiffre $handle est ";
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
