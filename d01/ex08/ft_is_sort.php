<?php

function call($tab,  callable $fu) {
	$t = $tab;
	if ($fu($t) == false)
		return false;
	return ($t === $tab);
}

function ar($tab) {
	if (call($tab, 'arsort') == true)
		return (true);
	if (call($tab, 'asort') == true)
		return (true);
	if (call($tab, 'arsort') == true)
		return (true);
	if (call($tab, 'natcasesort') == true)
		return (true);
	if (call($tab, 'natsort') == true)
		return (true);
	if (call($tab, 'rsort') == true)
		return (true);
	if (call($tab, 'sort') == true)
		return (true);
	return (false);
};
?>
