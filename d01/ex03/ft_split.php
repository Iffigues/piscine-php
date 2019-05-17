<?php
function ft_split($a) {
	$k = array_filter(explode(" ", $a));
	asort($k);
	return (array_values($k));
};
?>
