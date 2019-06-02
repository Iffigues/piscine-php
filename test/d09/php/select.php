<?php
header("Access-Control-Allow-Origin: *");
if (!file_exists("./todo.csv")) {
	file_put_contents("./todo.csv","");
	chmod("./todo.csv",0777);
}

function getCsv() {
	if (($handle = fopen("todo.csv", "r")) !== FALSE) {
		$bb = [];
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
			foreach($data as $v)
				array_push($bb, $v);
		fclose($handle);
		return ($bb);
	}
	return False;
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	header('Content-Type: application/json');
	$bb = getCsv();
	$tt = [];
	foreach($bb as $val) {
		$fdd = split(";",$val);
		array_push($tt,['id' => $fdd[0], 'value'=>urldecode($fdd[1])]);
	}
	echo (json_encode($tt));
}
?>
